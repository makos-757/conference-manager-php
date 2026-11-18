<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceRegistration;
use App\Models\ConferenceSession;
use App\Models\SessionRegistration;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $conferences = Conference::withCount([
            'registrations as confirmed_registrations_count' => fn ($q) => $q->where('status', 'confirmed'),
        ])->orderBy('title')->get();

        $sessions = ConferenceSession::with('conference')->withCount([
            'registrations as confirmed_registrations_count' => fn ($q) => $q->where('status', 'confirmed'),
            'registrations as checked_in_count' => fn ($q) => $q->whereNotNull('checked_in_at'),
        ])->orderBy('title')->get();

        $totalRegistrations = ConferenceRegistration::where('status', 'confirmed')->count();
        $totalCheckedIn = SessionRegistration::whereNotNull('checked_in_at')->count();

        return view('reports.index', compact('conferences', 'sessions', 'totalRegistrations', 'totalCheckedIn'));
    }
}