{{-- Role-aware sidebar (green-blue accents) --}}
@php $user = auth()->user(); @endphp

<aside class="hidden w-64 shrink-0 border-r border-slate-200 bg-white p-4 lg:block">
    <nav class="space-y-1 text-sm">
        <a href="{{ route('dashboard') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Dashboard</a>
        <a href="{{ route('conferences.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Conferences</a>
        <a href="{{ route('sessions.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Sessions</a>
        <a href="{{ route('registrations.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">My registrations</a>

        @if ($user->isStaff())
            <p class="mt-6 px-3 text-xs font-semibold uppercase tracking-wide text-slate-400">Manage</p>
            <a href="{{ route('venues.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Venues</a>
            <a href="{{ route('speakers.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Speakers</a>
            <a href="{{ route('speakers.assign') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Speaker assignments</a>
            <a href="{{ route('members.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Members</a>
            <a href="{{ route('reports.index') }}" class="block rounded-lg px-3 py-2 font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700">Reports</a>
        @endif
    </nav>
</aside>