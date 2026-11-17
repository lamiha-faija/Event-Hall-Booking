<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hallora | Event Hall Booking</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800">

    <!-- NAVIGATION BAR -->
    <header class="fixed top-0 left-0 w-full z-50 bg-black shadow-sm">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="text-3xl font-bold text-indigo-700">
                Hallora<span class="text-amber-500">.</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-bold font-medium">
                <a href="/"  class="text-amber-500">Home</a>
                <a href="#halls" class="text-amber-500">Halls</a>
                <a href="#goals" class="text-amber-500">Goals</a>
                <a href="#about" class="text-amber-500">About Us</a>

                @auth
                    @if(auth()->user()->isAdmin)
                        <a href="{{ route('admin-panel') }}" class="text-amber-500">Dashboard</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-amber-500">Dashboard</a>
                    @endif
                
                    <a href="{{ route('logout') }}"
                       class="text-amber-500">
                        Logout
                    </a>
                @else
                    <a href="{{ route('viewLoginForm') }}" class="text-amber-500 text-bold">
                        Login
                    </a>

                @endauth
            </div>

            <a href="{{ route('browseHalls') }}"
               class="md:hidden bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm">
                Explore Halls
            </a>
        </nav>
    </header>


    <!-- HERO SECTION -->
    <section
        class="relative min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center"
        style="background-image: url('/images/halls/home-hall.webp.webp');">  

        <div class="absolute inset-0 bg-black/55"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center text-white pt-20">

            <p class="uppercase tracking-[0.3em] text-amber-300 font-semibold text-sm mb-6">
                Make Every Celebration Special
            </p>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight mb-7">
                Find the Perfect Hall
                <span class="text-amber-300">for Your Special Moments.</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed mb-10">
                Discover beautiful event spaces for weddings, birthdays,
                corporate events and every celebration that matters.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">

                <a href="{{ route('browseHalls') }}"
                   class="bg-amber-500 hover:bg-amber-600 text-white px-9 py-4 font-semibold rounded-lg transition duration-300">
                    Explore Available Halls →
                </a>

                @guest
                    <a href="{{ route('viewSignupForm') }}"
                       class="border border-white hover:bg-white hover:text-gray-900 px-9 py-4 font-semibold rounded-lg transition duration-300">
                        Get Started
                    </a>
                @endguest

            </div>
        </div>
    </section>


    <!-- FEATURED HALLS -->
    <section id="halls" class="py-20 bg-gradient-to-br from-indigo-100 via-purple-50 to-amber-50">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">
                <p class="text-indigo-600 uppercase tracking-widest font-semibold text-sm mb-3">
                    Discover Our Spaces
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Explore Our Halls
                </h2>

                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                    Find the ideal venue for your celebrations,
                    gatherings and memorable occasions.
                </p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($halls as $hall)

                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">

                        @if($hall->image)
                            <img src="{{ asset('images/halls/' . $hall->image) }}"
                                 alt="{{ $hall->name }}"
                                 class="w-full h-56 object-cover">
                        @else
                            <img src="{{ asset('images/halls/home-hall.webp') }}"
                                 alt="Event hall"
                                 class="w-full h-56 object-cover">
                        @endif

                        <div class="p-6">

                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                {{ $hall->name }}
                            </h3>

                            <p class="text-gray-500 text-sm mb-2">
                                📍 {{ $hall->location }}
                            </p>

                            <p class="text-gray-500 text-sm mb-4">
                                Capacity: {{ $hall->capacity }} Guests
                            </p>

                            <div class="flex justify-between items-center">

                                <span class="text-indigo-700 font-bold">
                                    ৳{{ number_format($hall->price, 2) }}
                                </span>

                                <a href="{{ route('browseHalls') }}"
                                   class="text-indigo-600 font-semibold hover:text-indigo-800">
                                    View Details →
                                </a>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-span-3 text-center py-10">
                        <p class="text-gray-500 text-lg">
                            Our halls will be available here soon.
                        </p>
                    </div>

                @endforelse

            </div>

            <div class="text-center mt-12">
                <a href="{{ route('browseHalls') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                    View All Halls →
                </a>
            </div>

        </div>
    </section>


    <!-- Goals SECTION -->
    <section id="goals" class="py-20 bg-gray-900 text-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">

                <p class="text-amber-400 uppercase tracking-widest text-sm font-semibold mb-3">
                    Everything You Need
                </p>

                <h2 class="text-3xl md:text-4xl font-bold">
                    Our Goals
                </h2>

                <p class="text-gray-400 mt-4">
                    Making every event comfortable and memorable.
                </p>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">✦</div>
                    <h3 class="text-xl font-semibold mb-3">Elegant Interiors</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Beautifully designed spaces for memorable occasions.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">❋</div>
                    <h3 class="text-xl font-semibold mb-3">Spacious Seating</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Comfortable seating arrangements for your guests.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">⌂</div>
                    <h3 class="text-xl font-semibold mb-3">Convenient Locations</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Find event venues in convenient locations.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">◇</div>
                    <h3 class="text-xl font-semibold mb-3">Flexible Spaces</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Spaces suitable for different types of celebrations.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">◎</div>
                    <h3 class="text-xl font-semibold mb-3">Easy Booking</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Browse halls and submit your booking request online.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl hover:bg-gray-700 transition">
                    <div class="text-amber-400 text-3xl mb-5">✧</div>
                    <h3 class="text-xl font-semibold mb-3">Memorable Events</h3>
                    <p class="text-gray-400 leading-relaxed">
                        The right space to make your special moments unforgettable.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT SECTION -->
    <section id="about" class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">

                <div>

                    <p class="text-indigo-600 uppercase tracking-widest text-sm font-semibold mb-3">
                        Get to Know Us
                    </p>

                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        About Hallora
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Hallora is an event hall booking management system
                        designed to make finding and booking event venues
                        easier and more convenient.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        Our Mission
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Our mission is to simplify the hall booking process
                        through an organized digital platform that connects
                        customers with suitable event spaces.
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        Our Vision
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-8">
                        We aim to provide a smooth, transparent and
                        user-friendly experience for every customer.
                    </p>

                    <a href="{{ route('browseHalls') }}"
                       class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-7 py-3 rounded-lg font-semibold transition">
                        Discover Our Halls →
                    </a>

                </div>


                <div class="relative">

                    <div class="absolute -inset-3 bg-amber-100 rounded-2xl rotate-2"></div>

                    <img src="{{ asset('images/halls/home-hall.webp.webp') }}"
                         alt="Hallora event venue"
                         class="relative w-full h-[450px] object-cover rounded-2xl shadow-xl">

                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="bg-gray-950 text-gray-300 py-14">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <div class="md:col-span-2">

                    <h2 class="text-3xl font-bold text-white mb-5">
                        Hallora<span class="text-amber-400">.</span>
                    </h2>

                    <p class="text-gray-400 leading-relaxed max-w-lg">
                        Your destination for discovering and booking
                        beautiful event spaces. We make every celebration
                        easier to plan and more memorable.
                    </p>

                </div>


                <div>

                    <h3 class="text-white text-lg font-semibold mb-5">
                        Quick Links
                    </h3>

                    <ul class="space-y-3">

                        <li>
                            <a href="/" class="hover:text-amber-400">Home</a>
                        </li>

                        <li>
                            <a href="#halls" class="hover:text-amber-400">Our Halls</a>
                        </li>

                        <li>
                            <a href="#goals" class="hover:text-amber-400">Goals</a>
                        </li>

                        <li>
                            <a href="#about" class="hover:text-amber-400">About Us</a>
                        </li>

                        <li>
                            <a href="{{ route('viewLoginForm') }}"
                               class="hover:text-amber-400">Login</a>
                        </li>

                    </ul>

                </div>

            </div>


            <div class="border-t border-gray-800 mt-12 pt-7 text-center">

                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} Hallora. All rights reserved.
                </p>

            </div>

        </div>
    </footer>

</body>
</html>
