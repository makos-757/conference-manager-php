@extends('layouts.app')

@section('title', $member->exists ? 'Edit member' : 'New member')

@section('content')
<div class="mx-auto max-w-2xl">
    <h1 class="text-2xl font-semibold text-slate-900">{{ $member->exists ? 'Edit member' : 'New member' }}</h1>

    <form method="POST" action="{{ $member->exists ? route('members.update', $member) : route('members.store') }}" class="mt-6 space-y-4">
        @csrf
        @if ($member->exists)
            @method('PUT')
        @endif

        <div>
            <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $member->name) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $member->email) }}" required
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700">Password {{ $member->exists ? '(leave blank to keep)' : '' }}</label>
            <input id="password" type="password" name="password" {{ $member->exists ? '' : 'required' }}
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2" />
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="role" class="block text-sm font-medium text-slate-700">Role</label>
                <select id="role" name="role" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                    @foreach (['attendee', 'speaker'] as $role)
                        <option value="{{ $role }}" @selected(old('role', $member->role ?: 'attendee') === $role)>{{ ucfirst($role) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                <select id="status" name="status" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                    @foreach (['active', 'inactive'] as $status)
                        <option value="{{ $status }}" @selected(old('status', $member->status ?: 'active') === $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-md bg-emerald-600 px-4 py-2 font-medium text-white hover:bg-emerald-700">{{ $member->exists ? 'Update' : 'Create' }}</button>
            <a href="{{ route('members.index') }}" class="rounded-md border border-slate-300 px-4 py-2 font-medium text-slate-700 hover:bg-slate-100">Cancel</a>
        </div>
    </form>
</div>
@endsection