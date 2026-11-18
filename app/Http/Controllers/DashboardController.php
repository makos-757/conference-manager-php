<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceSession;
use App\Models\Speaker;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $stats = [
            'conferences' => Conference::count(),
            'venues' => Venue::count(),
            'sessions' => ConferenceSession::count(),
            'speakers' => Speaker::count(),
            'members' => User::count(),
            'my_registrations' => $user->conferenceRegistrations()->where('status', 'confirmed')->count()
                + $user->sessionRegistrations()->where('status', 'confirmed')->count(),
        ];

        return view('dashboard', compact('user', 'stats'));
    }
}