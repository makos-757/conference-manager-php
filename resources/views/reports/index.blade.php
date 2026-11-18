@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-semibold text-slate-900">Reports</h1>

    <div class="grid gap-4 sm:grid-cols-2">
        <div class="rounded-lg border border-slate-200 bg-white p-5">
            <p class="text-sm text-slate-500">Total conference registrations</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalRegistrations }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-5">
            <p class="text-sm text-slate-500">Total check-ins</p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalCheckedIn }}</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <h2 class="border-b border-slate-200 px-4 py-3 font-medium text-slate-900">Conference registration report</h2>
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr><th class="px-4 py-3">Conference</th><th class="px-4 py-3">Capacity</th><th class="px-4 py-3">Confirmed</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($conferences as $conference)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $conference->title }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $conference->capacity ?? '—' }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $conference->confirmed_registrations_count }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-4 py-6 text-center text-slate-500">No conferences.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <h2 class="border-b border-slate-200 px-4 py-3 font-medium text-slate-900">Session attendance report</h2>
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr><th class="px-4 py-3">Session</th><th class="px-4 py-3">Conference</th><th class="px-4 py-3">Capacity</th><th class="px-4 py-3">Confirmed</th><th class="px-4 py-3">Checked in</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($sessions as $session)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $session->title }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $session->conference->title ?? '—' }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $session->capacity }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $session->confirmed_registrations_count }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $session->checked_in_count }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-500">No sessions.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection