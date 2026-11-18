<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\ConferenceRegistration;
use App\Models\ConferenceSession;
use App\Models\Speaker;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the database with demo accounts and sample data.
     * Change the demo password before deploying.
     */
    public function run(): void
    {
        $organiser = User::updateOrCreate(['email' => 'organiser@convene.test'], [
            'name' => 'Demo Organiser',
            'password' => 'Password123',
            'role' => 'organiser',
            'status' => 'active',
        ]);

        User::updateOrCreate(['email' => 'admin@convene.test'], [
            'name' => 'Demo Admin',
            'password' => 'Password123',
            'role' => 'admin',
            'status' => 'active',
        ]);

        $speakerUser = User::updateOrCreate(['email' => 'speaker@convene.test'], [
            'name' => 'Demo Speaker',
            'password' => 'Password123',
            'role' => 'speaker',
            'status' => 'active',
        ]);

        User::updateOrCreate(['email' => 'attendee@convene.test'], [
            'name' => 'Demo Attendee',
            'password' => 'Password123',
            'role' => 'attendee',
            'status' => 'active',
        ]);

        $venue = Venue::updateOrCreate(['name' => 'Main Hall'], [
            'address' => 'Room 1',
            'capacity' => 100,
        ]);

        $conference = Conference::updateOrCreate(['title' => 'Technology Innovation Conference 2026'], [
            'organiser_id' => $organiser->id,
            'description' => 'An academic technology conference.',
            'start_date' => '2026-11-20',
            'end_date' => '2026-11-22',
            'registration_deadline' => '2026-11-19 23:59:00',
            'capacity' => 200,
            'status' => 'upcoming',
        ]);

        $session = ConferenceSession::updateOrCreate([
            'conference_id' => $conference->id,
            'title' => 'Opening Keynote',
        ], [
            'venue_id' => $venue->id,
            'description' => 'Keynote address.',
            'start_datetime' => '2026-11-20 09:00:00',
            'end_datetime' => '2026-11-20 10:00:00',
            'capacity' => 50,
            'status' => 'scheduled',
        ]);

        $speaker = Speaker::updateOrCreate(['user_id' => $speakerUser->id], [
            'name' => $speakerUser->name,
            'bio' => 'Technology researcher and keynote speaker.',
        ]);

        $session->speakers()->syncWithoutDetaching([
            $speaker->id => ['assignment_type' => 'keynote'],
        ]);

        ConferenceRegistration::updateOrCreate(
            ['conference_id' => $conference->id, 'user_id' => $speakerUser->id],
            ['status' => 'confirmed', 'registered_at' => now()]
        );
    }
}