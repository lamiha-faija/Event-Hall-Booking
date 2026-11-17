
@extends('layouts.app')

@section('title', 'My Bookings | Hallora')

@section('content')
<section class="min-h-screen bg-slate-50 px-5 pb-16 pt-32">
    <div class="mx-auto max-w-7xl">

        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Your Reservations</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">My Bookings</h1>
            <p class="mt-2 text-slate-500">Track your booking requests and share feedback after your event.</p>
        </div>

        <form action="{{ route('myBookings') }}" method="GET"
              class="mb-8 grid gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-3">

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Booking Status</label>
                <select name="status" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3">
                    <option value="">All Bookings</option>
                    <option value="pending" {{ ($status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ ($status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ ($status ?? '') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="cancelled" {{ ($status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Event Date</label>
                <input type="date" name="event_date" value="{{ $event_date ?? '' }}"
                       class="w-full rounded-lg border border-slate-200 px-3 py-3">
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="rounded-lg bg-indigo-700 px-5 py-3 font-semibold text-white hover:bg-indigo-800">Filter</button>
                <a href="{{ route('myBookings') }}" class="rounded-lg border border-slate-200 px-5 py-3 font-semibold text-slate-600 hover:bg-slate-50">Clear</a>
            </div>
        </form>

        <div class="space-y-6">
            @forelse($bookings as $booking)
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex flex-col justify-between gap-4 border-b border-slate-100 pb-5 sm:flex-row sm:items-start">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Booking #{{ $booking->id }}</p>
                            <h2 class="mt-2 text-xl font-bold text-slate-900">{{ $booking->hall->name }}</h2>
                            <p class="mt-1 text-sm text-slate-500">📍 {{ $booking->hall->location }}</p>
                        </div>

                        @php
                            $statusColor = [
                                'pending' => 'bg-amber-50 text-amber-700',
                                'approved' => 'bg-emerald-50 text-emerald-700',
                                'rejected' => 'bg-rose-50 text-rose-700',
                                'cancelled' => 'bg-slate-100 text-slate-600',
                            ][$booking->status] ?? 'bg-slate-100 text-slate-600';
                        @endphp

                        <span class="w-fit rounded-full px-4 py-2 text-xs font-bold uppercase {{ $statusColor }}">
                            {{ $booking->status }}
                        </span>
                    </div>

                    <div class="grid gap-5 py-5 sm:grid-cols-2 lg:grid-cols-4">
                        <div><p class="text-xs text-slate-400">Event Date</p><p class="mt-1 font-semibold">{{ $booking->event_date }}</p></div>
                        <div><p class="text-xs text-slate-400">Event Type</p><p class="mt-1 font-semibold">{{ $booking->event_type }}</p></div>
                        <div><p class="text-xs text-slate-400">Booking Type</p><p class="mt-1 font-semibold">{{ str_replace('_', ' ', $booking->booking_type) }}</p></div>
                        <div><p class="text-xs text-slate-400">Guests</p><p class="mt-1 font-semibold">{{ $booking->guests }}</p></div>
                    </div>

                    @if($booking->booking_type == 'time_slot')
                        <p class="mb-5 text-sm text-slate-500">
                            Time: {{ $booking->start_time ?? 'N/A' }} – {{ $booking->end_time ?? 'N/A' }}
                        </p>
                    @endif

                    <div class="flex flex-col gap-5 border-t border-slate-100 pt-5">

                        @if($booking->status == 'pending')
                            <form action="{{ route('cancelBooking', $booking->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                @csrf
                                <button type="submit" class="rounded-lg border border-rose-200 px-5 py-2.5 text-sm font-semibold text-rose-600 hover:bg-rose-50">
                                    Cancel Booking
                                </button>
                            </form>
                        @endif

                        @if($booking->review)
                            <div class="rounded-xl bg-emerald-50 p-4">
                                <p class="font-semibold text-emerald-800">Your Review · {{ $booking->review->rating ?? 'No rating' }}/5</p>
                                <p class="mt-1 text-sm text-emerald-700">{{ $booking->review->review ?? 'No written review.' }}</p>
                            </div>
                        @elseif($booking->status == 'approved' && $booking->event_date < today())
                            <form action="{{ route('submitReview') }}" method="POST"
                                  class="grid gap-4 rounded-xl bg-slate-50 p-5 md:grid-cols-2">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Your Rating</label>
                                    <select name="rating" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-3">
                                        <option value="">Select Rating</option>
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">Your Review</label>
                                    <textarea name="review" rows="2" class="w-full rounded-lg border border-slate-200 px-3 py-3" placeholder="Share your experience"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <button type="submit" class="rounded-lg bg-indigo-700 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-800">
                                        Submit Review
                                    </button>
                                </div>
                            </form>
                        @else
                            <p class="text-sm text-slate-400">Review will be available after an approved event has passed.</p>
                        @endif

                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white py-16 text-center">
                    <div class="text-4xl">📅</div>
                    <h2 class="mt-4 text-xl font-bold text-slate-900">No Bookings Found</h2>
                    <p class="mt-2 text-slate-500">Your booking requests will appear here.</p>
                    <a href="{{ route('browseHalls') }}" class="mt-6 inline-block rounded-lg bg-indigo-700 px-6 py-3 font-semibold text-white">Explore Halls</a>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
