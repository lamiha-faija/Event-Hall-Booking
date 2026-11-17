
@extends('layouts.app')

@section('title', 'Explore Halls | Hallora')

@section('content')

<!-- PAGE HEADER -->
<section class="bg-slate-950 px-5 pb-20 pt-36 text-white">

    <div class="mx-auto max-w-7xl">

        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-amber-400">
            Discover Your Perfect Venue
        </p>

        <h1 class="max-w-3xl text-4xl font-bold leading-tight md:text-6xl">
            Find a Beautiful Space for Your Special Moments.
        </h1>

        <p class="mt-6 max-w-2xl leading-7 text-slate-300">
            Explore our collection of event halls and find the perfect
            venue for weddings, birthdays, meetings and celebrations.
        </p>

    </div>

</section>


<!-- HALL LIST -->
<section class="bg-slate-50 px-5 py-16">

    <div class="mx-auto max-w-7xl">

        <!-- Section Heading -->
        <div class="mb-10 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

            <div class="bg = ash>
                <p class="mb-2 text-sm font-semibold uppercase tracking-widest text-indigo-600">
                    Our Collection
                </p>

                <h2 class="text-3xl font-bold text-slate-900">
                    Available Event Halls
                </h2>

                <p class="mt-2 text-slate-500">
                    Choose a venue that matches your occasion.
                </p>
            </div>


        </div>


        <!-- Hall Cards -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($halls as $hall)

                <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <!-- Hall Image -->
                    <div class="relative h-64 overflow-hidden">

                        @if($hall->image)

                            <img src="{{ asset('images/halls/' . $hall->image) }}"
                                 alt="{{ $hall->name }}"
                                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                        @else

                            <img src="{{ asset('images/halls/home-hall.webp.webp') }}"
                                 alt="Event hall"
                                 class="h-full w-full object-cover">

                        @endif

                        <div class="absolute bottom-4 left-4 rounded-lg bg-white/95 px-4 py-2 text-sm font-bold text-indigo-700 shadow">
                            ৳{{ number_format($hall->price, 2) }}
                        </div>

                    </div>


                    <!-- Hall Information -->
                    <div class="p-6">

                        <h3 class="text-xl font-bold text-slate-900 transition group-hover:text-indigo-700">
                            {{ $hall->name }}
                        </h3>

                        <p class="mt-3 flex items-center gap-2 text-sm text-slate-500">
                            <span class="text-indigo-600">📍</span>
                            {{ $hall->location }}
                        </p>

                        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-5">

                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-400">
                                    Guest Capacity
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $hall->capacity }} Guests
                                </p>
                            </div>

                            <a href="{{ route('viewBookingForm', $hall->id) }}"
                               class="rounded-lg bg-indigo-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-800">
                                Book Now →
                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-20 text-center">

                    <div class="mb-5 text-5xl">🏛️</div>

                    <h3 class="text-xl font-bold text-slate-900">
                        No Halls Available Yet
                    </h3>

                    <p class="mt-3 text-slate-500">
                        Our event halls will appear here once they are added.
                    </p>

                    <a href="{{ url('/') }}"
                       class="mt-7 inline-block rounded-lg bg-indigo-700 px-6 py-3 font-semibold text-white hover:bg-indigo-800">
                        Back to Home
                    </a>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection
