<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

public function makeBooking(Request $value)
{
    $conflict = Booking::where("hall_id", $value->hall_id)
        ->where("event_date", $value->event_date)
        ->whereIn("status", ["pending", "approved"])
        ->where(function ($query) use ($value) {

            if ($value->booking_type == "full_day") //that means booked for full day
            {

                $query->whereIn("booking_type", ["full_day", "time_slot"]);

            } else {

                $query->where("booking_type", "full_day") //that means booked for time slot
                    ->orWhere(function ($query) use ($value) {

                        $query->where("booking_type", "time_slot")
                            ->where("start_time", "<", $value->end_time)
                            ->where("end_time", ">", $value->start_time);

                    });
            }

        })->exists();

    if ($conflict) {
        return redirect()->back()->with("error", "This hall is already booked for the selected date and time.");
    }

    $data["hall_id"] = $value->hall_id;
    $data["event_date"] = $value->event_date;
    $data["booking_type"] = $value->booking_type;
    $data["start_time"] = $value->start_time;
    $data["end_time"] = $value->end_time;
    $data["event_type"] = $value->event_type;
    $data["guests"] = $value->guests;
    $data["user_id"] = Auth::user()->id;
    $data["status"] = "pending";

    Booking::create($data);

    return redirect()->route("myBookings");
    }


public function allBookings(Request $request)
{
    $query = Booking::with(["hall", "user"]);
// search
    if ($request->search) {

        $query->where(function ($query) use ($request) {

            $query->whereHas("user", function ($query) use ($request) {
                $query->where("name", "like", "%" . $request->search . "%");
            })

            ->orWhereHas("hall", function ($query) use ($request) {
                $query->where("name", "like", "%" . $request->search . "%");
            });

        });
    }
// filter
    if ($request->status) {
        $query->where("status", $request->status);
    }

    if ($request->event_date) {
        $query->where("event_date", $request->event_date);
    }

    $bookings = $query->get();

    return view("pages.admin-panel.booking.list", [
        "bookings" => $bookings,
        "search" => $request->search,
        "status" => $request->status,
        "event_date" => $request->event_date
    ]);
}

    public function viewBookingForm($id)
   {
    $hall = Hall::findOrFail($id);

    return view("pages.booking.create", ["hall" => $hall]);
}

    public function approveBooking($id)
    {
        $data["status"] = "approved";

        Booking::where(["id" => $id])->update($data);

        return redirect()->back();
    }

    public function rejectBooking($id)
    {
        $data["status"] = "rejected";

        Booking::where(["id" => $id])->update($data);

        return redirect()->back();
    }

    public function myBookings(Request $request)
    {
    if (Auth::check() && Auth::user()->isAdmin == 1) {
        return redirect()->route('allBookings');
    }
    $query = Booking::with("hall")
        ->where("user_id", Auth::user()->id);

    // filter
    if ($request->status) {
        $query->where("status", $request->status);
    }

    if ($request->event_date) {
        $query->where("event_date", $request->event_date);
    }

    $bookings = $query->get();

    return view("pages.booking.my-bookings", [
        "bookings" => $bookings,
        "status" => $request->status,
        "event_date" => $request->event_date
    ]);
    }

    public function cancelBooking($id)
   {
    $data["status"] = "cancelled";

    Booking::where([
        "id" => $id,
        "user_id" => Auth::user()->id,
        "status" => "pending"
    ])->update($data);

    return redirect()->back();
    }
}
