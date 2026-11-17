<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function reviewList()
    {
        $reviews = Review::with(["booking.user", "booking.hall"])->get();

        return view("pages.admin-panel.review.list", [
            "reviews" => $reviews
        ]);
    }

    public function deleteReview($id)
    {
        Review::where("id", $id)->delete();

        return redirect()->back();
    }
}