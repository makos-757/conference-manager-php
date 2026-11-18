@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-slate-900">Members</h1>
        <a href="{{ route('members.create') }}" class="rounded-md bg-emerald-600 px-3 py-2 text-sm font-medium text-white hover:bg-emerald-700">New member</a>
    </div>
    <p class="text-sm text-slate-500">Only attendees and speakers can be managed here. Admin and organiser accounts are protected.</p>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($members as $member)
                    <tr>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $member->name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $member->email }}</td>
                        <td class="px-4 py-3 capitalize">{{ $member->role }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-2 py-1 text-xs {{ $member->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-slate-200 text-slate-600' }}">{{ $member->status }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('members.edit', $member) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('members.destroy', $member) }}" onsubmit="return confirm('Remove this member?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-500">No members.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection