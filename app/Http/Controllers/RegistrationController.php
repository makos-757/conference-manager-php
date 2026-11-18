<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceRegistration;
use App\Models\ConferenceSession;
use App\Models\SessionRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $conferenceRegistrations = ConferenceRegistration::with('conference')
            ->where('user_id', $user->id)->orderByDesc('registered_at')->get();

        $sessionRegistrations = SessionRegistration::with('session.conference')
            ->where('user_id', $user->id)->orderByDesc('registered_at')->get();

        return view('registrations.index', compact('conferenceRegistrations', 'sessionRegistrations'));
    }

    public function registerConference(Request $request, Conference $conference): RedirectResponse
    {
        $user = $request->user();

        $already = ConferenceRegistration::where('conference_id', $conference->id)
            ->where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->exists();

        if ($already) {
            return back()->with('error', 'You are already registered for this conference.');
        }

        $confirmed = ConferenceRegistration::where('conference_id', $conference->id)
            ->where('status', 'confirmed')->count();

        if ($conference->registration_deadline && now()->greaterThan($conference->registration_deadline)) {
            return back()->with('error', 'Registration for this conference is closed.');
        }

        if ($conference->capacity !== null && $confirmed >= $conference->capacity) {
            return back()->with('error', 'This conference is full.');
        }

        ConferenceRegistration::updateOrCreate(
            ['conference_id' => $conference->id, 'user_id' => $user->id],
            ['status' => 'confirmed', 'registered_at' => now(), 'cancelled_at' => null]
        );

        return back()->with('status', 'Registered for the conference.');
    }

    public function cancelConference(Request $request, Conference $conference): RedirectResponse
    {
        ConferenceRegistration::updateOrCreate(
            ['conference_id' => $conference->id, 'user_id' => $request->user()->id],
            ['status' => 'cancelled', 'cancelled_at' => now()]
        );

        return back()->with('status', 'Conference registration cancelled.');
    }

    public function registerSession(Request $request, ConferenceSession $session): RedirectResponse
    {
        $user = $request->user();

        $existing = SessionRegistration::where('conference_session_id', $session->id)
            ->where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->exists();

        if ($existing) {
            return back()->with('error', 'You are already registered for this session.');
        }

        $confirmed = SessionRegistration::where('conference_session_id', $session->id)
            ->where('status', 'confirmed')->count();

        if ($confirmed >= $session->capacity) {
            return back()->with('error', 'This session is full.');
        }

        $conflict = SessionRegistration::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->whereHas('session', function ($q) use ($session) {
                $q->where('id', '!=', $session->id)
                    ->where('start_datetime', '<', $session->end_datetime)
                    ->where('end_datetime', '>', $session->start_datetime);
            })
            ->exists();

        if ($conflict) {
            return back()->with('error', 'This session overlaps with another session you are registered for.');
        }

        SessionRegistration::updateOrCreate(
            ['conference_session_id' => $session->id, 'user_id' => $user->id],
            ['status' => 'confirmed', 'registered_at' => now(), 'cancelled_at' => null]
        );

        return back()->with('status', 'Registered for the session.');
    }

    public function cancelSession(Request $request, ConferenceSession $session): RedirectResponse
    {
        SessionRegistration::updateOrCreate(
            ['conference_session_id' => $session->id, 'user_id' => $request->user()->id],
            ['status' => 'cancelled', 'cancelled_at' => now()]
        );

        return back()->with('status', 'Session registration cancelled.');
    }
}