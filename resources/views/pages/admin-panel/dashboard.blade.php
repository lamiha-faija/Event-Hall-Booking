
@extends('layouts.admin')

@section('title', 'Admin Dashboard | Hallora')

@section('content')
<div class="mb-8">
    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Overview</p>
    <h1 class="mt-2 text-3xl font-bold text-slate-900">Admin Dashboard</h1>
    <p class="mt-2 text-slate-500">Manage your halls, customers, bookings and reviews.</p>
</div>

<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">

    <a href="{{ route('viewHallList') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">🏛️</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">Manage Halls</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Add new halls, update venue information and manage hall listings.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">Manage halls →</span>
    </a>

    <a href="{{ route('allBookings') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">📋</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">Booking Requests</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Review customer requests and approve or reject pending bookings.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">Manage bookings →</span>
    </a>

    <a href="{{ route('allCustomers') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">👥</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">Customers</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">View registered customer information and contact details.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">View customers →</span>
    </a>

    <a href="{{ route('reviewList') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">⭐</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">Customer Reviews</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Read customer feedback and manage submitted reviews.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">View reviews →</span>
    </a>

    <a href="{{ route('viewHallForm') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">➕</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">Add New Hall</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Create a new venue listing with its details and photograph.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">Add a hall →</span>
    </a>

    <a href="{{ url('/') }}" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
        <div class="text-3xl">🌐</div>
        <h2 class="mt-5 text-xl font-bold text-slate-900">View Website</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Visit the customer-facing Hallora website.</p>
        <span class="mt-5 inline-block font-semibold text-indigo-700">Open website →</span>
    </a>

</div>
@endsection
