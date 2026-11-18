<?php

namespace App\Http\Controllers;

use App\Models\ConferenceSession;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SpeakerController extends Controller
{
    private function rules(): array
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function index(): View
    {
        $speakers = Speaker::with('user')->latest()->get();

        return view('speakers.index', compact('speakers'));
    }

    public function create(): View
    {
        return view('speakers.form', ['speaker' => new Speaker()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Speaker::create($request->validate($this->rules()));

        return redirect()->route('speakers.index')->with('status', 'Speaker created.');
    }

    public function edit(Speaker $speaker): View
    {
        return view('speakers.form', compact('speaker'));
    }

    public function update(Request $request, Speaker $speaker): RedirectResponse
    {
        $speaker->update($request->validate($this->rules()));

        return redirect()->route('speakers.index')->with('status', 'Speaker updated.');
    }

    public function destroy(Speaker $speaker): RedirectResponse
    {
        $speaker->delete();

        return back()->with('status', 'Speaker deleted.');
    }

    public function showAssign(): View
    {
        $speakers = Speaker::orderBy('name')->get();
        $sessions = ConferenceSession::with('conference')->orderBy('title')->get();

        return view('speakers.assign', compact('speakers', 'sessions'));
    }

    public function assign(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'conference_session_id' => ['required', 'exists:conference_sessions,id'],
            'speaker_id' => ['required', 'exists:speakers,id'],
            'assignment_type' => ['required', Rule::in(['keynote', 'speaker', 'panelist', 'moderator'])],
        ]);

        $session = ConferenceSession::findOrFail($data['conference_session_id']);
        $session->speakers()->syncWithoutDetaching([
            $data['speaker_id'] => ['assignment_type' => $data['assignment_type']],
        ]);

        return back()->with('status', 'Speaker assigned to session.');
    }
}