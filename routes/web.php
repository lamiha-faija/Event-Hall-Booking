<?php

use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $halls = \App\Models\Hall::latest()->take(3)->get();

    return view('welcome', compact('halls'));
});

Route::get('/register', [AuthController::class, "viewSignupForm"])->name("viewSignupForm");
Route::post('/signup', [AuthController::class, "signup"])->name("signup");
Route::get('/login', [AuthController::class, "viewLoginForm"])->name("viewLoginForm");
Route::post('/login', [AuthController::class, "login"])->name("login");
Route::get('/logout', [AuthController::class, "logout"])->name("logout");

Route::get('/dashboard', function () {
    return view("pages.dashboard");
})->middleware('auth')->name("dashboard");

Route::get('/admin-panel', function () {
    return view("pages.admin-panel.dashboard");
})->middleware('admin')->name("admin-panel");

Route::get('/profile', [AuthController::class, "viewProfile"])->middleware('auth')->name("viewProfile");
Route::post('/update-profile', [AuthController::class, "updateProfile"])->middleware('auth')->name("updateProfile");

Route::get('/admin-panel/customers', [AuthController::class, "allCustomers"])->middleware('admin')->name("allCustomers");

Route::get('/admin/add-hall', [HallController::class, "viewHallForm"])->middleware('admin')->name("viewHallForm");
Route::post('/admin/add-hall', [HallController::class, "createHall"])->middleware('admin')->name("addHall");
Route::get('/admin/hall-list', [HallController::class, "viewHallList"])->middleware('admin')->name("viewHallList");
Route::get('/halls', [HallController::class, "browseHalls"])->name("browseHalls");
Route::get('/admin/hall-delete/{id}', [HallController::class, "deleteHall"])->middleware('admin')->name("deleteHall");
Route::get('/admin/edit-hall/{id}', [HallController::class, "viewHallEditForm"])->middleware('admin')->name("viewHallEditForm");
Route::post('/admin/edit-hall', [HallController::class, "editHall"])->middleware('admin')->name("editHall");

Route::post('/make-booking', [BookingController::class, "makeBooking"])->middleware('auth')->name("makeBooking");
Route::get('/admin-panel/bookings', [BookingController::class, "allBookings"])->middleware('admin')->name("allBookings");
Route::get('/admin-panel/bookings/approve/{id}', [BookingController::class, "approveBooking"])->middleware('admin')->name("approveBooking");
Route::get('/admin-panel/bookings/reject/{id}', [BookingController::class, "rejectBooking"])->middleware('admin')->name("rejectBooking");
Route::get('/mybookings', [BookingController::class, "myBookings"])->middleware('auth')->name("myBookings");
Route::get('/book-hall/{id}', [BookingController::class, "viewBookingForm"])->middleware('auth')->name("viewBookingForm");
Route::post('/cancel-booking/{id}', [BookingController::class, "cancelBooking"])->middleware('auth')->name("cancelBooking");


Route::post('/submit-review', [ReviewController::class, "submitReview"])->middleware('auth')->name("submitReview");

Route::get('/admin-panel/reviews', [AdminReviewController::class, "reviewList"])->middleware('admin')->name("reviewList");
Route::post('/admin-panel/reviews/delete/{id}', [AdminReviewController::class, "deleteReview"])->middleware('admin')->name("deleteReview");