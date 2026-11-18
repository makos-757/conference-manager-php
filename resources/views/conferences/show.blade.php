@extends('layouts.app')

@section('title', $conference->title)

@section('content')
@php
    $myReg = $conference->registrations->first(fn ($r) => $r->user_id === auth()->id() && $r->status === 'confirmed');
    $confirmed = $conference->registrations->where('status', 'confirmed')->count();
@endphp

<div class="space-y-6">
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">{{ $conference->title }}</h1>
            <p class="mt-1 text-sm text-slate-600">{{ $conference->start_date }} → {{ $conference->end_date }} · <span class="capitalize">{{ $conference->status }}</span></p>
        </div>
        @if (auth()->user()->isStaff())
            <a href="{{ route('conferences.edit', $conference) }}" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Edit</a>
        @endif
    </div>

    @if ($conference->description)
        <p class="text-slate-700">{{ $conference->description }}</p>
    @endif

    <div class="grid gap-4 sm:grid-cols-3">
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <p class="text-sm text-slate-500">Capacity</p>
            <p class="mt-1 font-semibold text-slate-900">{{ $conference->capacity ?? 'Unlimited' }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <p class="text-sm text-slate-500">Registered</p>
            <p class="mt-1 font-semibold text-slate-900">{{ $confirmed }}</p>
        </div>
        <div class="rounded-lg border border-slate-200 bg-white p-4">
            <p class="text-sm text-slate-500">Deadline</p>
            <p class="mt-1 font-semibold text-slate-900">{{ $conference->registration_deadline ?? 'None' }}</p>
        </div>
    </div>

    <div>
        @if ($myReg)
            <form method="POST" action="{{ route('conferences.cancel', $conference) }}">
                @csrf
                <button type="submit" class="rounded-md border border-red-300 px-4 py-2 text-sm font-medium text-red-700 hover:bg-red-50">Cancel my registration</button>
            </form>
        @else
            <form method="POST" action="{{ route('conferences.register', $conference) }}">
                @csrf
                <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700">Register for this conference</button>
            </form>
        @endif
    </div>

    <div>
        <h2 class="text-lg font-semibold text-slate-900">Sessions</h2>
        <div class="mt-3 space-y-2">
            @forelse ($conference->sessions as $session)
                <div class="rounded-lg border border-slate-200 bg-white p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium text-slate-900">{{ $session->title }}</p>
                            <p class="text-sm text-slate-500">{{ $session->start_datetime }} → {{ $session->end_datetime }} · {{ $session->venue->name ?? 'No venue' }}</p>
                        </div>
                        <span class="text-sm text-slate-600">{{ $session->registrations->where('status', 'confirmed')->count() }}/{{ $session->capacity }}</span>
                    </div>
                    @if ($session->speakers->isNotEmpty())
                        <p class="mt-2 text-xs text-slate-500">
                            Speakers: {{ $session->speakers->map(fn ($s) => $s->name.' ('.$s->pivot->assignment_type.')')->implode(', ') }}
                        </p>
                    @endif
                </div>
            @empty
                <p class="text-sm text-slate-500">No sessions scheduled yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection