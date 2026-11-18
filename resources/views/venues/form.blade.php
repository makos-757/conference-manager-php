@extends('layouts.app')

@section('title', $venue->exists ? 'Edit venue' : 'New venue')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">{{ $venue->exists ? 'Edit venue' : 'New venue' }}</h1>

    <form method="POST" action="{{ $venue->exists ? route('venues.update', $venue) : route('venues.store') }}" class="mt-6 space-y-4">
        @csrf
        @if ($venue->exists)
            @method('PUT')
        @endif

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $venue->name) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-slate-700">Address</label>
            <input id="address" type="text" name="address" value="{{ old('address', $venue->address) }}"
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="capacity" class="block text-sm font-medium text-slate-700">Capacity</label>
            <input id="capacity" type="number" min="1" name="capacity" value="{{ old('capacity', $venue->capacity) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">{{ $venue->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('venues.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection