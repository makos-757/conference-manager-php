@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<div class="mx-auto mt-8 max-w-md">
    <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">
        <div class="mb-6">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-r from-emerald-600 to-blue-600 text-lg font-bold text-white">C</div>
            <h1 class="mt-4 text-2xl font-bold text-slate-900">Log in</h1>
            <p class="mt-1 text-sm text-slate-500">Access your Convene account.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500" />
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300" /> Remember me
                </label>
                <a href="{{ route('register') }}" class="text-sm font-medium text-blue-600 hover:underline">Create account</a>
            </div>
            <button type="submit" class="w-full rounded-lg bg-gradient-to-r from-emerald-600 to-blue-600 px-4 py-2 font-semibold text-white hover:from-emerald-700 hover:to-blue-700">Log in</button>
        </form>
    </div>
</div>
@endsection