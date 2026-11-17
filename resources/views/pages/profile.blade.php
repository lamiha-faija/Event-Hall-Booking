
@extends('layouts.app')

@section('title', 'My Profile | Hallora')

@section('content')
<section class="min-h-screen bg-slate-50 px-5 pb-16 pt-32">
    <div class="mx-auto max-w-3xl">

        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Account Settings</p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">My Profile</h1>
            <p class="mt-2 text-slate-500">Update your personal information.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm md:p-10">
            <div class="mb-8 flex items-center gap-4">
                <div class="grid h-16 w-16 place-items-center rounded-full bg-indigo-100 text-2xl font-bold text-indigo-700">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-900">{{ $user->name }}</h2>
                    <p class="text-sm text-slate-500">{{ $user->email }}</p>
                </div>
            </div>

            <form action="{{ route('updateProfile') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email Address</label>
                    <input type="email" value="{{ $user->email }}" readonly
                           class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-3 text-slate-500">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">New Password</label>
                    <input type="password" name="password" placeholder="Leave blank to keep current password"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    <p class="mt-2 text-xs text-slate-400">Only enter a password if you want to change it.</p>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-indigo-700 px-7 py-3 font-semibold text-white hover:bg-indigo-800">
                        Save Changes
                    </button>
                    <a href="{{ route('dashboard') }}" class="rounded-xl border border-slate-200 px-7 py-3 font-semibold text-slate-600 hover:bg-slate-50">
                        Back to Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
