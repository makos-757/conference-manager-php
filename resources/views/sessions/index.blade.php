@extends('layouts.app')

@section('title', 'Sessions')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Sessions</h1>
        @if (auth()->user()->isStaff())
            <a href="{{ route('sessions.create') }}" class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700">New session</a>
        @endif
    </div>

    <div class="space-y-2">
        @forelse ($sessions as $session)
            <div class="rounded-lg border border-slate-200 bg-white p-4">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-medium text-slate-900">{{ $session->title }}</p>
                        <p class="text-sm text-slate-500">
                            {{ $session->conference->title ?? '—' }} ·
                            {{ $session->start_datetime }} → {{ $session->end_datetime }} ·
                            {{ $session->venue->name ?? 'No venue' }}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-600">{{ $session->registrations->where('status', 'confirmed')->count() }}/{{ $session->capacity }}</p>
                        @if (isset($myRegistrations[$session->id]))
                            <form method="POST" action="{{ route('sessions.cancel', $session) }}" class="mt-1">
                                @csrf
                                <button type="submit" class="text-xs font-medium text-red-600 hover:underline">Cancel</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('sessions.register', $session) }}" class="mt-1">
                                @csrf
                                <button type="submit" class="text-xs font-medium text-blue-600 hover:underline">Register</button>
                            </form>
                        @endif
                    </div>
                </div>
                @if (auth()->user()->isStaff())
                    <div class="mt-2 flex gap-3 text-xs">
                        <a href="{{ route('sessions.edit', $session) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('sessions.destroy', $session) }}" onsubmit="return confirm('Delete this session?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p class="text-sm text-slate-500">No sessions yet.</p>
        @endforelse
    </div>
</div>
@endsection