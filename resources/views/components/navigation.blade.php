{{-- Single shared menu bar: green-to-blue gradient --}}
<nav class="sticky top-0 z-20 bg-gradient-to-r from-emerald-600 via-teal-600 to-blue-600 text-white shadow-lg">
    <div class="flex w-full items-center justify-between px-6 py-3">
        <div class="flex items-center gap-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-lg font-bold text-white">
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-white/20">C</span>
                <span>Convene</span>
            </a>

            <div class="hidden items-center gap-6 text-sm font-medium text-white/90 sm:flex">
                <a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a>
                <a href="{{ route('conferences.index') }}" class="hover:text-white">Conferences</a>
                <a href="{{ route('sessions.index') }}" class="hover:text-white">Sessions</a>
            </div>
        </div>

        <div class="flex items-center gap-3 text-sm">
            @guest
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 font-medium text-white/90 hover:bg-white/10">Log in</a>
                <a href="{{ route('register') }}" class="rounded-md bg-white px-3 py-2 font-semibold text-emerald-700 hover:bg-white/90">Register</a>
            @else
                <span class="hidden text-white/90 sm:inline">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-md px-3 py-2 font-medium text-white/90 hover:bg-white/10">Log out</button>
                </form>
            @endguest
        </div>
    </div>
</nav>