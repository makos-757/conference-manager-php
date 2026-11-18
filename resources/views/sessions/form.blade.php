@extends('layouts.app')

@section('title', $session->exists ? 'Edit session' : 'New session')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">{{ $session->exists ? 'Edit session' : 'New session' }}</h1>

    <form method="POST" action="{{ $session->exists ? route('sessions.update', $session) : route('sessions.store') }}" class="mt-6 space-y-4">
        @csrf
        @if ($session->exists)
            @method('PUT')
        @endif

        <div>
            <label for="conference_id" class="block text-sm font-medium text-slate-700">Conference</label>
            <select id="conference_id" name="conference_id" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                @foreach ($conferences as $conference)
                    <option value="{{ $conference->id }}" @selected(old('conference_id', $session->conference_id) == $conference->id)>{{ $conference->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="venue_id" class="block text-sm font-medium text-slate-700">Venue</label>
            <select id="venue_id" name="venue_id" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                <option value="">No venue</option>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}" @selected(old('venue_id', $session->venue_id) == $venue->id)>{{ $venue->name }} ({{ $venue->capacity }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
            <input id="title" type="text" name="title" value="{{ old('title', $session->title) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">{{ old('description', $session->description) }}</textarea>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="start_datetime" class="block text-sm font-medium text-slate-700">Start</label>
                <input id="start_datetime" type="datetime-local" name="start_datetime" value="{{ old('start_datetime', $session->start_datetime?->format('Y-m-d\TH:i')) }}" required
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
            <div>
                <label for="end_datetime" class="block text-sm font-medium text-slate-700">End</label>
                <input id="end_datetime" type="datetime-local" name="end_datetime" value="{{ old('end_datetime', $session->end_datetime?->format('Y-m-d\TH:i')) }}" required
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="capacity" class="block text-sm font-medium text-slate-700">Capacity</label>
                <input id="capacity" type="number" min="1" name="capacity" value="{{ old('capacity', $session->capacity) }}" required
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                <select id="status" name="status" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                    @foreach (['scheduled', 'ongoing', 'completed', 'cancelled'] as $status)
                        <option value="{{ $status }}" @selected(old('status', $session->status ?: 'scheduled') === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">{{ $session->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('sessions.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection