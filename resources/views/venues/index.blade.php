@extends('layouts.app')

@section('title', 'Venues')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Venues</h1>
        <a href="{{ route('venues.create') }}" class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700">New venue</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Capacity</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($venues as $venue)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $venue->name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $venue->address ?? '—' }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $venue->capacity }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('venues.edit', $venue) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('venues.destroy', $venue) }}" onsubmit="return confirm('Delete this venue?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-500">No venues yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection