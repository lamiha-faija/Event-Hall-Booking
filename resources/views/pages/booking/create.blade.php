
@extends('layouts.app')

@section('title', 'Book a Hall | Hallora')

@section('content')
<section class="min-h-screen bg-slate-50 px-5 pb-16 pt-32">
    <div class="mx-auto max-w-6xl">

        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Reserve Your Venue</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">Book Your Event Hall</h1>
            <p class="mt-2 text-slate-500">Complete the form to send your booking request.</p>
        </div>

        @if(session('error'))
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-rose-700">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="grid gap-8 lg:grid-cols-5">

            <div class="overflow-hidden rounded-2xl bg-slate-950 text-white lg:col-span-2">
                @if($hall->image)
                    <img src="{{ asset('images/halls/' . $hall->image) }}" alt="{{ $hall->name }}"
                         class="h-64 w-full object-cover">
                @else
                    <img src="{{ asset('images/halls/home-hall.webp') }}" alt="Event hall"
                         class="h-64 w-full object-cover">
                @endif

                <div class="p-7">
                    <p class="text-xs font-semibold uppercase tracking-widest text-amber-400">Selected Venue</p>
                    <h2 class="mt-3 text-2xl font-bold">{{ $hall->name }}</h2>
                    <p class="mt-3 text-sm text-slate-300">📍 {{ $hall->location }}</p>
                    <p class="mt-2 text-sm text-slate-300">Capacity: {{ $hall->capacity }} guests</p>
                    <div class="mt-6 border-t border-white/10 pt-5">
                        <p class="text-sm text-slate-400">Hall Price</p>
                        <p class="mt-1 text-2xl font-bold text-amber-400">৳{{ number_format($hall->price, 2) }}</p>
                    </div>
                    @if($hall->description)
                        <p class="mt-5 text-sm leading-6 text-slate-300">{{ $hall->description }}</p>
                    @endif
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm lg:col-span-3 md:p-9">
                <h2 class="text-xl font-bold text-slate-900">Event Details</h2>
                <p class="mt-2 text-sm text-slate-500">Please provide the information about your event.</p>

                <form action="{{ route('makeBooking') }}" method="POST" class="mt-7 space-y-5">
                    @csrf
                    <input type="hidden" name="hall_id" value="{{ $hall->id }}">

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Event Date</label>
                        <input type="date" name="event_date" value="{{ old('event_date') }}" required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Booking Type</label>
                        <select name="booking_type" required
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-indigo-500">
                            <option value="full_day" {{ old('booking_type') == 'full_day' ? 'selected' : '' }}>Full Day</option>
                            <option value="time_slot" {{ old('booking_type') == 'time_slot' ? 'selected' : '' }}>Time Slot</option>
                        </select>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Start Time</label>
                            <input type="time" name="start_time" value="{{ old('start_time') }}"
                                   class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">End Time</label>
                            <input type="time" name="end_time" value="{{ old('end_time') }}"
                                   class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Event Type</label>
                        <input type="text" name="event_type" value="{{ old('event_type') }}"
                               placeholder="e.g. Wedding, Birthday, Conference" required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Number of Guests</label>
                        <input type="number" name="guests" value="{{ old('guests') }}" min="1" required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-indigo-700 py-3.5 font-semibold text-white hover:bg-indigo-800">
                        Submit Booking Request →
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
