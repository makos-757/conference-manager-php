@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="mx-auto mt-8 max-w-md">
    <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">
        <div class="mb-6">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-r from-emerald-600 to-blue-600 text-lg font-bold text-white">C</div>
            <h1 class="mt-4 text-2xl font-bold text-slate-900">Create your account</h1>
            <p class="mt-1 text-sm text-slate-500">Public signup is limited to attendees and speakers.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Full name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-slate-700">I am a</label>
                <select id="role" name="role" class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    <option value="attendee" @selected(old('role') === 'attendee')>Attendee</option>
                    <option value="speaker" @selected(old('role') === 'speaker')>Speaker</option>
                </select>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <button type="submit" class="w-full rounded-lg bg-gradient-to-r from-emerald-600 to-blue-600 px-4 py-2 font-semibold text-white hover:from-emerald-700 hover:to-blue-700">Register</button>
        </form>

        <p class="mt-4 text-sm text-slate-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Log in</a>
        </p>
    </div>
</div>
@endsection