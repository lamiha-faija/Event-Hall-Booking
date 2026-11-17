
@extends('layouts.app')

@section('title', 'Dashboard | Hallora')

@section('content')
<section class="min-h-screen bg-slate-50 px-5 pb-16 pt-32">
    <div class="mx-auto max-w-7xl">

        <div class="overflow-hidden rounded-3xl bg-slate-950 p-8 text-white md:p-12">
            <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Customer Dashboard</p>
            <h1 class="mt-4 text-3xl font-bold md:text-5xl">
                Welcome back, {{ auth()->user()->name }}!
            </h1>
            <p class="mt-4 max-w-xl leading-7 text-slate-300">
                Find your perfect event space and manage your bookings in one place.
            </p>
            <a href="{{ route('browseHalls') }}"
               class="mt-7 inline-block rounded-xl bg-amber-500 px-7 py-3 font-semibold text-white hover:bg-amber-600">
                Explore Halls →
            </a>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <a href="{{ route('browseHalls') }}"
               class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="text-3xl">🏛️</div>
                <h2 class="mt-5 text-xl font-bold">Explore Halls</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">Browse venues, compare prices and find the right space.</p>
                <span class="mt-5 inline-block font-semibold text-indigo-700">Browse venues →</span>
            </a>

            <a href="{{ route('myBookings') }}"
               class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="text-3xl">📅</div>
                <h2 class="mt-5 text-xl font-bold">My Bookings</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">View booking details and check your booking status.</p>
                <span class="mt-5 inline-block font-semibold text-indigo-700">View bookings →</span>
            </a>

            <a href="{{ route('viewProfile') }}"
               class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="text-3xl">👤</div>
                <h2 class="mt-5 text-xl font-bold">My Profile</h2>
                <p class="mt-2 text-sm leading-6 text-slate-500">Manage your personal information and account details.</p>
                <span class="mt-5 inline-block font-semibold text-indigo-700">Edit profile →</span>
            </a>

        </div>
    </div>
</section>
@endsection
