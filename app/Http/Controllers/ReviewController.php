<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(Request $value)
    {
        $booking = Booking::where([
            "id" => $value->booking_id,
            "user_id" => Auth::user()->id,
            "status" => "approved"
        ])
        ->whereDate("event_date", "<", today())
        ->first();

        if (!$booking || $booking->review) {
            return redirect()->back();
        }

        if ($value->rating == "" && $value->review == "") { //empty string
            return redirect()->back();
        }

        if ($value->rating != "" && ($value->rating < 1 || $value->rating > 5)) { //not empty
            return redirect()->back();
        }

        $data["booking_id"] = $booking->id;
        $data["rating"] = $value->rating ?: null;
        $data["review"] = $value->review ?: null;

        Review::create($data);

        return redirect()->back();
    }
}
