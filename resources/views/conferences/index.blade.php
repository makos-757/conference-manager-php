@extends('layouts.app')

@section('title', 'Conferences')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Conferences</h1>
        @if (auth()->user()->isStaff())
            <a href="{{ route('conferences.create') }}" class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700">New conference</a>
        @endif
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Dates</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Capacity</th>
                    <th class="px-4 py-3">Organiser</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($conferences as $conference)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">
                            <a href="{{ route('conferences.show', $conference) }}" class="text-blue-600 hover:underline">{{ $conference->title }}</a>
                        </td>
                        <td class="px-4 py-3 text-slate-600">{{ $conference->start_date }} → {{ $conference->end_date }}</td>
                        <td class="px-4 py-3"><span class="rounded-full bg-slate-100 px-2 py-1 text-xs capitalize">{{ $conference->status }}</span></td>
                        <td class="px-4 py-3 text-slate-600">{{ $conference->capacity ?? '—' }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $conference->organiser->name ?? '—' }}</td>
                        <td class="px-4 py-3">
                            @if (auth()->user()->isStaff())
                                <div class="flex gap-2">
                                    <a href="{{ route('conferences.edit', $conference) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('conferences.destroy', $conference) }}" onsubmit="return confirm('Delete this conference?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-center text-slate-500">No conferences yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection