
@extends('layouts.app')

@section('title', 'Register | Hallora')

@section('content')

<section class="min-h-screen bg-green px-5 pb-16 pt-32">

    <div class="mx-auto grid max-w-5xl overflow-hidden rounded-3xl bg-grey shadow-xl md:grid-cols-2">

        <!-- Left Image -->
        <div class="relative hidden min-h-[650px] md:block">

            <img src="/images/halls/home-hall.webp.webp"
                 alt="Beautiful event venue"
                 class="absolute inset-0 h-full w-full object-cover">

            <div class="absolute inset-0 bg-slate-950/60"></div>

            <div class="absolute bottom-12 left-10 right-10 text-white">

                <h2 class="text-4xl font-bold leading-tight">
                    Your special moments deserve a special place.
                </h2>

                <p class="mt-5 text-slate-200">
                    Create your account and discover the perfect
                    venue for your next celebration.
                </p>

            </div>

        </div>


        <!-- Registration Form -->
            <div class="flex items-center bg-gradient-to-br from-indigo-100 via-purple-50 to-amber-50 px-7 py-12 sm:px-12">
            <div class="mx-auto w-full max-w-md">

                <p class="mb-3 text-sm font-bold uppercase tracking-widest text-indigo-600">
                    Join Hallora
                </p>

                <h1 class="text-3xl font-bold text-slate-900">
                    Create Your Account
                </h1>

                <p class="mt-3 text-sm text-slate-500">
                    Fill in your details to get started.
                </p>


                @if($errors->any())
                    <div class="mt-6 rounded-lg border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif


                <form action="{{ route('signup') }}" method="POST" class="mt-8 space-y-4">

                    @csrf

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Full Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter your full name"
                               required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    </div>


                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter your email"
                               required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    </div>


                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Phone Number
                        </label>

                        <input type="text"
                               name="phone_number"
                               value="{{ old('phone_number') }}"
                               placeholder="Enter your phone number"
                               required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    </div>


                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Create a password"
                               required
                               class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                    </div>


                    <button type="submit"
                            class="w-full rounded-xl bg-indigo-700 py-3.5 font-semibold text-white shadow-lg transition hover:bg-indigo-800">
                        Create Account →
                    </button>

                </form>


                <p class="mt-7 text-center text-sm text-slate-500">
                    Already have an account?

                    <a href="{{ route('viewLoginForm') }}"
                       class="font-semibold text-indigo-700 hover:underline">
                        Login
                    </a>
                </p>

                <div class="mt-5 text-center">
                    <a href="{{ url('/') }}"
                       class="text-sm text-slate-500 hover:text-indigo-700">
                        ← Back to Homepage
                    </a>
                </div>

            </div>
        </div>

    </div>

</section>

@endsection
