
@extends('layouts.admin')

@section('title', 'Add Hall | Hallora')

@section('content')
<div class="mx-auto max-w-4xl">

    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Hall Management</p>
        <h1 class="mt-2 text-3xl font-bold text-slate-900">Add New Hall</h1>
        <p class="mt-2 text-slate-500">Enter the venue details to create a new listing.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('addHall') }}" method="POST" enctype="multipart/form-data"
          class="space-y-6 rounded-2xl border border-slate-200 bg-white p-7 shadow-sm md:p-9">
        @csrf

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Hall Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Location</label>
            <input type="text" name="location" value="{{ old('location') }}" required
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Guest Capacity</label>
                <input type="number" name="capacity" value="{{ old('capacity') }}" min="1" required
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Price (BDT)</label>
                <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" required
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">
            </div>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Hall Image</label>
            <input type="file" name="image" accept="image/png,image/jpeg,image/webp"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm">
            <p class="mt-2 text-xs text-slate-400">Accepted formats: PNG, JPG/JPEG and WebP.</p>
        </div>

        <div class="flex flex-wrap gap-3 pt-3">
            <button type="submit" class="rounded-xl bg-indigo-700 px-7 py-3 font-semibold text-white hover:bg-indigo-800">Add Hall</button>
            <a href="{{ route('viewHallList') }}" class="rounded-xl border border-slate-200 px-7 py-3 font-semibold text-slate-600 hover:bg-slate-50">Cancel</a>
        </div>
    </form>
</div>
@endsection
