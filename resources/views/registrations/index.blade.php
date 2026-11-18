@extends('layouts.app')

@section('title', 'My registrations')

@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-semibold text-slate-900">My registrations</h1>

    <div>
        <h2 class="text-lg font-semibold text-slate-900">Conferences</h2>
        <div class="mt-3 space-y-2">
            @forelse ($conferenceRegistrations as $registration)
                <div class="flex items-center justify-between rounded-lg border border-slate-200 bg-white p-4">
                    <div>
                        <p class="font-medium text-slate-900">{{ $registration->conference->title ?? 'Conference' }}</p>
                        <p class="text-sm text-slate-500">Registered {{ $registration->registered_at }}</p>
                    </div>
                    <span class="rounded-full px-2 py-1 text-xs capitalize {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-slate-200 text-slate-600' }}">{{ $registration->status }}</span>
                </div>
            @empty
                <p class="text-sm text-slate-500">No conference registrations.</p>
            @endforelse
        </div>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-slate-900">Sessions</h2>
        <div class="mt-3 space-y-2">
            @forelse ($sessionRegistrations as $registration)
                <div class="flex items-center justify-between rounded-lg border border-slate-200 bg-white p-4">
                    <div>
                        <p class="font-medium text-slate-900">{{ $registration->session->title ?? 'Session' }}</p>
                        <p class="text-sm text-slate-500">{{ $registration->session->start_datetime ?? '' }}</p>
                    </div>
                    <div class="text-right">
                        <span class="rounded-full px-2 py-1 text-xs capitalize {{ $registration->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-slate-200 text-slate-600' }}">{{ $registration->status }}</span>
                        @if ($registration->checked_in_at)
                            <p class="mt-1 text-xs text-green-600">Checked in</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-500">No session registrations.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection