
@extends('layouts.admin')

@section('title', 'Booking Requests | Hallora')

@section('content')
<div class="mb-8">
    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Reservation Management</p>
    <h1 class="mt-2 text-3xl font-bold text-slate-900">Booking Requests</h1>
    <p class="mt-2 text-slate-500">Review and manage customer event reservations.</p>
</div>

<form action="{{ route('allBookings') }}" method="GET"
      class="mb-8 grid gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 xl:grid-cols-4">

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Search Customer or Hall</label>
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Enter a name"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

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
        <a href="{{ route('allBookings') }}" class="rounded-lg border border-slate-200 px-5 py-3 font-semibold text-slate-600">Clear</a>
    </div>
</form>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[1100px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-5 py-4">ID</th>
                    <th class="px-5 py-4">Customer</th>
                    <th class="px-5 py-4">Hall</th>
                    <th class="px-5 py-4">Event Date</th>
                    <th class="px-5 py-4">Booking</th>
                    <th class="px-5 py-4">Time</th>
                    <th class="px-5 py-4">Event Type</th>
                    <th class="px-5 py-4">Guests</th>
                    <th class="px-5 py-4">Status</th>
                    <th class="px-5 py-4">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-4 font-medium">{{ $booking->id }}</td>
                        <td class="px-5 py-4 font-semibold">{{ $booking->user->name }}</td>
                        <td class="px-5 py-4">{{ $booking->hall->name }}</td>
                        <td class="px-5 py-4">{{ $booking->event_date }}</td>
                        <td class="px-5 py-4">{{ str_replace('_', ' ', $booking->booking_type) }}</td>
                        <td class="px-5 py-4">{{ $booking->start_time ?? 'N/A' }} – {{ $booking->end_time ?? 'N/A' }}</td>
                        <td class="px-5 py-4">{{ $booking->event_type }}</td>
                        <td class="px-5 py-4">{{ $booking->guests }}</td>
                        <td class="px-5 py-4">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold uppercase text-slate-700">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            @if($booking->status == 'pending')
                                <div class="flex gap-2">
                                    <a href="{{ route('approveBooking', $booking->id) }}" onclick="return confirm('Approve this booking?')" class="rounded-lg bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-100">Approve</a>
                                    <a href="{{ route('rejectBooking', $booking->id) }}" onclick="return confirm('Reject this booking?')" class="rounded-lg bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100">Reject</a>
                                </div>
                            @else
                                <span class="text-xs text-slate-400">No action</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-5 py-12 text-center text-slate-500">No booking requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
