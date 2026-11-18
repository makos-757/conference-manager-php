<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VenueController extends Controller
{
    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function index(): View
    {
        $venues = Venue::latest()->get();

        return view('venues.index', compact('venues'));
    }

    public function create(): View
    {
        return view('venues.form', ['venue' => new Venue()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Venue::create($request->validate($this->rules()));

        return redirect()->route('venues.index')->with('status', 'Venue created.');
    }

    public function edit(Venue $venue): View
    {
        return view('venues.form', compact('venue'));
    }

    public function update(Request $request, Venue $venue): RedirectResponse
    {
        $venue->update($request->validate($this->rules()));

        return redirect()->route('venues.index')->with('status', 'Venue updated.');
    }

    public function destroy(Venue $venue): RedirectResponse
    {
        $venue->delete();

        return back()->with('status', 'Venue deleted.');
    }
}