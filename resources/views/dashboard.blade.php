@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Hero banner: green → blue --}}
    <div class="rounded-2xl bg-gradient-to-r from-emerald-600 via-teal-600 to-blue-600 p-8 text-white shadow-xl">
        <p class="text-sm font-semibold uppercase tracking-wide text-white/80">Dashboard</p>
        <h1 class="mt-1 text-3xl font-bold sm:text-4xl">Welcome, {{ $user->name }}</h1>
        <p class="mt-2 text-white/90">
            Signed in as <span class="font-semibold capitalize">{{ $user->role }}</span>
        </p>
    </div>

    {{-- Stat cards: full width --}}
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-emerald-100 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-lg bg-emerald-100 text-emerald-700">◆</span>
                <p class="text-sm font-medium text-slate-500">Conferences</p>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['conferences'] }}</p>
        </div>

        <div class="rounded-xl border border-teal-100 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-lg bg-teal-100 text-teal-700">▲</span>
                <p class="text-sm font-medium text-slate-500">Venues</p>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['venues'] }}</p>
        </div>

        <div class="rounded-xl border border-blue-100 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-lg bg-blue-100 text-blue-700">●</span>
                <p class="text-sm font-medium text-slate-500">Sessions</p>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['sessions'] }}</p>
        </div>

        <div class="rounded-xl border border-cyan-100 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-lg bg-cyan-100 text-cyan-700">★</span>
                <p class="text-sm font-medium text-slate-500">Speakers</p>
            </div>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['speakers'] }}</p>
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-slate-500">My active registrations</p>
            <p class="mt-3 text-3xl font-bold text-emerald-600">{{ $stats['my_registrations'] }}</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-slate-500">Members</p>
            <p class="mt-3 text-3xl font-bold text-blue-600">{{ $stats['members'] }}</p>
        </div>
    </div>

    @if ($user->isStaff())
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Quick actions</h2>
            <div class="mt-4 flex flex-wrap gap-3 text-sm">
                <a href="{{ route('conferences.create') }}" class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">New conference</a>
                <a href="{{ route('venues.create') }}" class="rounded-lg border border-emerald-200 px-4 py-2 font-medium text-emerald-700 hover:bg-emerald-50">New venue</a>
                <a href="{{ route('sessions.create') }}" class="rounded-lg border border-blue-200 px-4 py-2 font-medium text-blue-700 hover:bg-blue-50">New session</a>
                <a href="{{ route('speakers.create') }}" class="rounded-lg border border-cyan-200 px-4 py-2 font-medium text-cyan-700 hover:bg-cyan-50">New speaker</a>
                <a href="{{ route('members.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Manage members</a>
                <a href="{{ route('reports.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Reports</a>
            </div>
        </div>
    @else
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-slate-900">Browse and register</h2>
            <div class="mt-4 flex flex-wrap gap-3 text-sm">
                <a href="{{ route('conferences.index') }}" class="rounded-lg bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">Browse conferences</a>
                <a href="{{ route('sessions.index') }}" class="rounded-lg border border-blue-200 px-4 py-2 font-medium text-blue-700 hover:bg-blue-50">Browse sessions</a>
                <a href="{{ route('registrations.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">My registrations</a>
            </div>
        </div>
    @endif
</div>
@endsection