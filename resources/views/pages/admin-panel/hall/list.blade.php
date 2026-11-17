
@extends('layouts.admin')

@section('title', 'Manage Halls | Hallora')

@section('content')
<div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
    <div>
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Venue Management</p>
        <h1 class="mt-2 text-3xl font-bold text-slate-900">All Halls</h1>
        <p class="mt-2 text-slate-500">Manage your event venue listings.</p>
    </div>

    <a href="{{ route('viewHallForm') }}" class="w-fit rounded-xl bg-indigo-700 px-6 py-3 font-semibold text-white hover:bg-indigo-800">
        + Add New Hall
    </a>
</div>

<form action="{{ route('viewHallList') }}" method="GET"
      class="mb-8 grid gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 xl:grid-cols-3">

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Search Hall</label>
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Name or location"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Minimum Price</label>
        <input type="number" name="min_price" value="{{ $min_price ?? '' }}"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Maximum Price</label>
        <input type="number" name="max_price" value="{{ $max_price ?? '' }}"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Minimum Capacity</label>
        <input type="number" name="min_capacity" value="{{ $min_capacity ?? '' }}"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Maximum Capacity</label>
        <input type="number" name="max_capacity" value="{{ $max_capacity ?? '' }}"
               class="w-full rounded-lg border border-slate-200 px-3 py-3">
    </div>

    <div class="flex items-end gap-2">
        <button type="submit" class="rounded-lg bg-indigo-700 px-5 py-3 font-semibold text-white hover:bg-indigo-800">Filter</button>
        <a href="{{ route('viewHallList') }}" class="rounded-lg border border-slate-200 px-5 py-3 font-semibold text-slate-600">Clear</a>
    </div>
</form>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-5 py-4">ID</th>
                    <th class="px-5 py-4">Image</th>
                    <th class="px-5 py-4">Hall</th>
                    <th class="px-5 py-4">Location</th>
                    <th class="px-5 py-4">Capacity</th>
                    <th class="px-5 py-4">Price</th>
                    <th class="px-5 py-4">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($halls as $hall)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-4 font-medium">{{ $hall->id }}</td>
                        <td class="px-5 py-4">
                            @if($hall->image)
                                <img src="{{ asset('images/halls/' . $hall->image) }}" alt="{{ $hall->name }}" class="h-14 w-20 rounded-lg object-cover">
                            @else
                                <img src="{{ asset('images/halls/home-hall.webp') }}" alt="Hall" class="h-14 w-20 rounded-lg object-cover">
                            @endif
                        </td>
                        <td class="px-5 py-4 font-semibold text-slate-900">{{ $hall->name }}</td>
                        <td class="px-5 py-4 text-slate-500">{{ $hall->location }}</td>
                        <td class="px-5 py-4">{{ $hall->capacity }}</td>
                        <td class="px-5 py-4 font-semibold">৳{{ number_format($hall->price) }}</td>
                        <td class="px-5 py-4">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('viewHallEditForm', $hall->id) }}" class="rounded-lg bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-700 hover:bg-indigo-100">Edit</a>
                                <a href="{{ route('deleteHall', $hall->id) }}" onclick="return confirm('Are you sure you want to delete this hall?')" class="rounded-lg bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100">Delete</a>
                                <a href="{{ route('viewBookingForm', $hall->id) }}" class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-200">Book</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center text-slate-500">No halls found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
