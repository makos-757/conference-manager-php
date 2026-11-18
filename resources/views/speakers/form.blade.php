@extends('layouts.app')

@section('title', $speaker->exists ? 'Edit speaker' : 'New speaker')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">{{ $speaker->exists ? 'Edit speaker' : 'New speaker' }}</h1>

    <form method="POST" action="{{ $speaker->exists ? route('speakers.update', $speaker) : route('speakers.store') }}" class="mt-6 space-y-4">
        @csrf
        @if ($speaker->exists)
            @method('PUT')
        @endif

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $speaker->name) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="user_id" class="block text-sm font-medium text-slate-700">Linked user (optional)</label>
            <input id="user_id" type="number" name="user_id" value="{{ old('user_id', $speaker->user_id) }}"
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" placeholder="User ID" />
        </div>

        <div>
            <label for="bio" class="block text-sm font-medium text-slate-700">Biography</label>
            <textarea id="bio" name="bio" rows="4"
                      class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">{{ old('bio', $speaker->bio) }}</textarea>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-slate-700">Photo URL (optional)</label>
            <input id="photo" type="text" name="photo" value="{{ old('photo', $speaker->photo) }}"
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">{{ $speaker->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('speakers.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection