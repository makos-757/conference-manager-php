@extends('layouts.app')

@section('title', $conference->exists ? 'Edit conference' : 'New conference')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">{{ $conference->exists ? 'Edit conference' : 'New conference' }}</h1>

    <form method="POST" action="{{ $conference->exists ? route('conferences.update', $conference) : route('conferences.store') }}" class="mt-6 space-y-4">
        @csrf
        @if ($conference->exists)
            @method('PUT')
        @endif

        <div>
            <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
            <input id="title" type="text" name="title" value="{{ old('title', $conference->title) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">{{ old('description', $conference->description) }}</textarea>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="start_date" class="block text-sm font-medium text-slate-700">Start date</label>
                <input id="start_date" type="date" name="start_date" value="{{ old('start_date', $conference->start_date?->format('Y-m-d')) }}" required
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-slate-700">End date</label>
                <input id="end_date" type="date" name="end_date" value="{{ old('end_date', $conference->end_date?->format('Y-m-d')) }}" required
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="registration_deadline" class="block text-sm font-medium text-slate-700">Registration deadline</label>
                <input id="registration_deadline" type="datetime-local" name="registration_deadline" value="{{ old('registration_deadline', $conference->registration_deadline?->format('Y-m-d\TH:i')) }}"
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
            <div>
                <label for="capacity" class="block text-sm font-medium text-slate-700">Capacity</label>
                <input id="capacity" type="number" min="1" name="capacity" value="{{ old('capacity', $conference->capacity) }}"
                       class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
            </div>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
            <select id="status" name="status" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                @foreach (['draft', 'upcoming', 'ongoing', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $conference->status ?: 'draft') === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">{{ $conference->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('conferences.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection