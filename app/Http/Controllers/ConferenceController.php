<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ConferenceController extends Controller
{
    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'registration_deadline' => ['nullable', 'date'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['draft', 'upcoming', 'ongoing', 'completed', 'cancelled'])],
        ];
    }

    public function index(): View
    {
        $conferences = Conference::with('organiser')->latest()->get();

        return view('conferences.index', compact('conferences'));
    }

    public function create(): View
    {
        return view('conferences.form', ['conference' => new Conference()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules());
        Conference::create($data + ['organiser_id' => Auth::id()]);

        return redirect()->route('conferences.index')->with('status', 'Conference created.');
    }

    public function show(Conference $conference): View
    {
        $conference->load('sessions.venue', 'sessions.speakers', 'registrations.user');

        return view('conferences.show', compact('conference'));
    }

    public function edit(Conference $conference): View
    {
        return view('conferences.form', compact('conference'));
    }

    public function update(Request $request, Conference $conference): RedirectResponse
    {
        $conference->update($request->validate($this->rules()));

        return redirect()->route('conferences.index')->with('status', 'Conference updated.');
    }

    public function destroy(Conference $conference): RedirectResponse
    {
        $conference->delete();

        return back()->with('status', 'Conference deleted.');
    }
}