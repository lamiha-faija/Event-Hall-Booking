
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Hallora | Event Hall Booking')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- NAVIGATION -->
    <header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-black shadow-sm backdrop-blur">
        <nav class="mx-auto flex min-h-[76px] max-w-7xl items-center justify-between px-5 sm:px-8">

            <a href="{{ url('/') }}"
            class="text-3xl font-bold text-indigo-700">
            Hallora<span class="text-amber-500">.</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden items-center gap-7 text-sm font-semibold text-slate-600 md:flex">

                <a href="{{ url('/') }}" class="text-bold text-amber-500">
                    Home
                </a>

                <a href="{{ route('browseHalls') }}" class="text-bold text-amber-500">
                    Explore Halls
                </a>

                @auth

                    @if(auth()->user()->isAdmin)

                        <a href="{{ route('admin-panel') }}"
                           class="hover:text-indigo-700">
                            Admin Panel
                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="text-bold text-amber-500">
                            Dashboard
                        </a>

                        <a href="{{ route('myBookings') }}"
                           class="text-bold text-amber-500">
                            My Bookings
                        </a>

                    @endif

                    <a href="{{ route('logout') }}"
                       class="text-bold text-amber-500">
                        Logout
                    </a>

                @else


               @if(request()->routeIs('viewLoginForm'))

                 <a href="{{ route('viewSignupForm') }}"
                   class="text-amber-400 font-semibold hover:text-amber-300">Register</a>

               @elseif(request()->routeIs('viewSignupForm'))

                 <a href="{{ route('viewLoginForm') }}"
                  class="text-amber-400 font-semibold hover:text-amber-300">Login</a>

@else

    <a href="{{ route('viewLoginForm') }}"
       class="text-amber-400 font-semibold hover:text-amber-300">
        Login
    </a>

    <a href="{{ route('viewSignupForm') }}"
       class="rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700">
        Get Started
    </a>

@endif


                @endauth

            </div>

            <!-- Mobile Navigation -->
            <details class="relative md:hidden">

                <summary class="grid h-10 w-10 cursor-pointer list-none place-items-center rounded-lg border border-slate-200 text-xl">
                    ☰
                </summary>

                <div class="absolute right-0 top-12 flex w-56 flex-col gap-1 rounded-xl border border-slate-200 bg-white p-3 shadow-xl">

                    <a href="{{ url('/') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                        Home
                    </a>

                    <a href="{{ route('browseHalls') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                        Explore Halls
                    </a>

                    <a href="{{ url('/#goals') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                        Goals
                    </a>

                    <a href="{{ url('/#about') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                        About
                    </a>

                    @auth

                        @if(auth()->user()->isAdmin)
                            <a href="{{ route('admin-panel') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                                Admin Panel
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                                Dashboard
                            </a>

                            <a href="{{ route('myBookings') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                                My Bookings
                            </a>
                        @endif

                        <a href="{{ route('logout') }}" class="rounded-lg px-3 py-2 text-rose-600 hover:bg-rose-50">
                            Logout
                        </a>

                    @else

                        <a href="{{ route('viewLoginForm') }}" class="rounded-lg px-3 py-2 hover:bg-slate-50">
                            Login
                        </a>

                        <a href="{{ route('viewSignupForm') }}" class="rounded-lg px-3 py-2 text-indigo-700 hover:bg-indigo-50">
                            Register
                        </a>

                    @endauth

                </div>
            </details>

        </nav>
    </header>


    <!-- PAGE CONTENT -->
    <main class="min-h-[70vh]">

        @if(session('success'))
            <div class="mx-auto mt-24 max-w-7xl px-5">
                <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mx-auto mt-24 max-w-7xl px-5">
                <div class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')

    </main>


    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-300">

        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 md:grid-cols-3">

            <div class="md:col-span-2">

                <a href="{{ url('/') }}"
                   class="text-3xl font-bold text-white">
                    Hallora<span class="text-amber-400">.</span>
                </a>

                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-400">
                    A simple and convenient way to discover event spaces
                    and manage hall bookings for weddings, celebrations,
                    meetings and special occasions.
                </p>

            </div>

            <div>

                <h3 class="mb-4 font-semibold text-white">
                    Quick Links
                </h3>

                <div class="grid grid-cols-2 gap-3 text-sm">

                    <a href="{{ url('/') }}" class="hover:text-amber-400">
                        Home
                    </a>

                    <a href="{{ route('browseHalls') }}" class="hover:text-amber-400">
                        Our Halls
                    </a>

                    <a href="{{ url('/#about') }}" class="hover:text-amber-400">
                        About Us
                    </a>

                    <a href="{{ route('viewLoginForm') }}" class="hover:text-amber-400">
                        Login
                    </a>

                </div>

            </div>

        </div>

        <div class="border-t border-white/10 px-5 py-5 text-center text-xs text-slate-500">
            © {{ date('Y') }} Hallora. All rights reserved.
        </div>

    </footer>

</body>
</html>
