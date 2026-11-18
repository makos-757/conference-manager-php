@extends('layouts.app')

@section('title', 'Speaker assignments')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">Assign a speaker to a session</h1>

    <form method="POST" action="{{ route('speakers.assign.store') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label for="conference_session_id" class="block text-sm font-medium text-slate-700">Session</label>
            <select id="conference_session_id" name="conference_session_id" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                @foreach ($sessions as $session)
                    <option value="{{ $session->id }}">{{ $session->title }} — {{ $session->conference->title ?? '' }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="speaker_id" class="block text-sm font-medium text-slate-700">Speaker</label>
            <select id="speaker_id" name="speaker_id" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                @foreach ($speakers as $speaker)
                    <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="assignment_type" class="block text-sm font-medium text-slate-700">Assignment type</label>
            <select id="assignment_type" name="assignment_type" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                @foreach (['keynote', 'speaker', 'panelist', 'moderator'] as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">Assign</button>
            <a href="{{ route('speakers.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection