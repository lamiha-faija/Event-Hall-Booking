<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HallController extends Controller
{
   
    public function viewHallForm()
    {
        return view("pages.admin-panel.hall.create");
    }

    
    public function createHall(Request $request)
    {
        $data["name"] = $request->name;
        $data["location"] = $request->location;
        $data["capacity"] = $request->capacity;
        $data["price"] = $request->price;
        $data["description"] = $request->description;

    if($request->file("image")){
    $file = $request->file("image");
    $name = time()."_".$file->getClientOriginalName();
    $folder = public_path("images/halls");

    File::ensureDirectoryExists($folder);

    $file->move($folder, $name);

    $data["image"] = $name;
    }
        Hall::create($data);

        return redirect()->route("viewHallList");
    }

    // Show all halls(admin)
    public function viewHallList(Request $request)
   {
    $query = Hall::query();

    if ($request->search) {
        $query->where(function ($query) use ($request) {
            $query->where("name", "like", "%" . $request->search . "%")
                ->orWhere("location", "like", "%" . $request->search . "%");
        });
    }

    if ($request->min_price) {
        $query->where("price", ">=", $request->min_price);
    }

    if ($request->max_price) {
        $query->where("price", "<=", $request->max_price);
    }

    if ($request->min_capacity) {
        $query->where("capacity", ">=", $request->min_capacity);
    }

    if ($request->max_capacity) {
        $query->where("capacity", "<=", $request->max_capacity);
    }

    $halls = $query->get();

    return view("pages.admin-panel.hall.list", [
        "halls" => $halls,
        "search" => $request->search,
        "min_price" => $request->min_price,
        "max_price" => $request->max_price,
        "min_capacity" => $request->min_capacity,
        "max_capacity" => $request->max_capacity
    ]);
    }

    // Show all halls(customer)
    public function browseHalls(Request $request)
    { 
    $query = Hall::with([
    "bookings" => function ($query) {
        $query->where("status", "approved")
              ->whereDate("event_date", "<", today())
              ->whereHas("review")
              ->with(["review", "user"]);
    }
]);

    if ($request->search) {
        $query->where(function ($query) use ($request) {
            $query->where("name", "like", "%" . $request->search . "%")
                ->orWhere("location", "like", "%" . $request->search . "%");
        });
    }

    if ($request->min_price) {
        $query->where("price", ">=", $request->min_price);
    }

    if ($request->max_price) {
        $query->where("price", "<=", $request->max_price);
    }

    if ($request->min_capacity) {
        $query->where("capacity", ">=", $request->min_capacity);
    }

    if ($request->max_capacity) {
        $query->where("capacity", "<=", $request->max_capacity);
    }

    $halls = $query->get();

    return view("pages.hall-list", [
        "halls" => $halls,
        "search" => $request->search,
        "min_price" => $request->min_price,
        "max_price" => $request->max_price,
        "min_capacity" => $request->min_capacity,
        "max_capacity" => $request->max_capacity
    ]);
    }

    // Delete a hall
    public function deleteHall($id)
    {
        Hall::where(["id" => $id])->delete();

        return redirect()->back();
    }

    // Show hall edit form
    public function viewHallEditForm($id)
    {
        $hall = Hall::where(["id" => $id])->first();

        return view("pages.admin-panel.hall.edit", ["hall" => $hall]);
    }

    // Update hall information
    public function editHall(Request $request)
    {
        $data["name"] = $request->name;
        $data["location"] = $request->location;
        $data["capacity"] = $request->capacity;
        $data["price"] = $request->price;
        $data["description"] = $request->description;

    if($request->file("image")){
        
    $file = $request->file("image");
    $name = time()."_".$file->getClientOriginalName();
    $folder = public_path("images/halls");

    File::ensureDirectoryExists($folder);

    $file->move($folder, $name);

    $data["image"] = $name;
    }

        Hall::where(["id" => $request->id])->update($data);

        return redirect()->route("viewHallList");
    }
}
