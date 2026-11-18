<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceSession;
use App\Models\Venue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SessionController extends Controller
{
    private function rules(): array
    {
        return [
            'conference_id' => ['required', 'exists:conferences,id'],
            'venue_id' => ['nullable', 'exists:venues,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_datetime' => ['required', 'date'],
            'end_datetime' => ['required', 'date', 'after:start_datetime'],
            'capacity' => ['required', 'integer', 'min:1'],
            'status' => ['required', Rule::in(['scheduled', 'ongoing', 'completed', 'cancelled'])],
        ];
    }

    public function index(): View
    {
        $sessions = ConferenceSession::with('conference', 'venue')->latest()->get();

        $myRegistrations = \App\Models\SessionRegistration::where('user_id', auth()->id())
            ->where('status', 'confirmed')
            ->pluck('id', 'conference_session_id');

        return view('sessions.index', compact('sessions', 'myRegistrations'));
    }

    public function create(): View
    {
        $conferences = Conference::orderBy('title')->get();
        $venues = Venue::orderBy('name')->get();

        return view('sessions.form', [
            'session' => new ConferenceSession(),
            'conferences' => $conferences,
            'venues' => $venues,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        ConferenceSession::create($request->validate($this->rules()));

        return redirect()->route('sessions.index')->with('status', 'Session created.');
    }

    public function edit(ConferenceSession $session): View
    {
        $conferences = Conference::orderBy('title')->get();
        $venues = Venue::orderBy('name')->get();

        return view('sessions.form', compact('session', 'conferences', 'venues'));
    }

    public function update(Request $request, ConferenceSession $session): RedirectResponse
    {
        $session->update($request->validate($this->rules()));

        return redirect()->route('sessions.index')->with('status', 'Session updated.');
    }

    public function destroy(ConferenceSession $session): RedirectResponse
    {
        $session->delete();

        return back()->with('status', 'Session deleted.');
    }
}