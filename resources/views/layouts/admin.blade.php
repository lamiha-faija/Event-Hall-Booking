
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel | Hallora')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">

    <div class="min-h-screen md:flex">

        <!-- SIDEBAR -->
        <aside class="w-full shrink-0 bg-slate-950 text-slate-300 md:fixed md:inset-y-0 md:w-64">

            <div class="flex h-[76px] items-center border-b border-white/10 px-6">

                <a href="{{ route('admin-panel') }}"
                   class="text-2xl font-bold text-white">
                    Hallora<span class="text-amber-400">.</span>
                </a>

            </div>

            <div class="px-5 py-6">

                <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[.2em] text-slate-500">
                    Main Menu
                </p>

                <nav class="space-y-1 text-sm font-medium">

                    <a href="{{ route('admin-panel') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>▦</span>
                        Dashboard
                    </a>

                    <a href="{{ route('viewHallList') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>▤</span>
                        Manage Halls
                    </a>

                    <a href="{{ route('allBookings') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>▣</span>
                        Booking Requests
                    </a>

                    <a href="{{ route('allCustomers') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>♙</span>
                        Customers
                    </a>

                    <a href="{{ route('reviewList') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>☆</span>
                        Customer Reviews
                    </a>

                </nav>


                <p class="mb-3 mt-9 px-3 text-[10px] font-bold uppercase tracking-[.2em] text-slate-500">
                    Account
                </p>

                <nav class="space-y-1 text-sm font-medium">

                    <a href="{{ url('/') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 transition hover:bg-white/10 hover:text-white">
                        <span>⌂</span>
                        View Website
                    </a>

                    <a href="{{ route('logout') }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-3 text-rose-300 transition hover:bg-rose-500/10">
                        <span>↪</span>
                        Logout
                    </a>

                </nav>

            </div>

        </aside>


        <!-- MAIN AREA -->
        <div class="min-w-0 flex-1 md:ml-64">

            <!-- TOP BAR -->
            <header class="flex min-h-[76px] items-center justify-between border-b border-slate-200 bg-white px-5 sm:px-8">

                <div>
                    <p class="text-xs text-slate-400">
                        Hallora Management
                    </p>

                    <p class="font-semibold text-slate-800">
                        Administration
                    </p>
                </div>

                <div class="flex items-center gap-3">

                    <div class="grid h-10 w-10 place-items-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <span class="hidden text-sm font-medium text-slate-600 sm:block">
                        {{ auth()->user()->name }}
                    </span>

                </div>

            </header>


            <!-- PAGE CONTENT -->
            <main class="p-5 sm:p-8">

                @if(session('success'))
                    <div class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-5 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </main>

        </div>

    </div>

</body>
</html>
