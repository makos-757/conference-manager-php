@extends('layouts.app')

@section('title', 'Speakers')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Speakers</h1>
        <div class="flex gap-2">
            <a href="{{ route('speakers.assign') }}" class="rounded-md border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">Assign to session</a>
            <a href="{{ route('speakers.create') }}" class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700">New speaker</a>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($speakers as $speaker)
            <div class="rounded-lg border border-slate-200 bg-white p-4">
                <p class="font-medium text-slate-900">{{ $speaker->name }}</p>
                <p class="mt-1 text-sm text-slate-600">{{ $speaker->bio ?? 'No biography.' }}</p>
                <p class="mt-2 text-xs text-slate-500">{{ $speaker->sessions->count() }} session(s)</p>
                <div class="mt-2 flex gap-2 text-xs">
                    <a href="{{ route('speakers.edit', $speaker) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('speakers.destroy', $speaker) }}" onsubmit="return confirm('Delete this speaker?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500">No speakers yet.</p>
        @endforelse
    </div>
</div>
@endsection