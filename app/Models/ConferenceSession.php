<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConferenceSession extends Model
{
    protected $fillable = [
        'conference_id', 'venue_id', 'title', 'description',
        'start_datetime', 'end_datetime', 'capacity', 'status',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'capacity' => 'integer',
    ];

    public function conference(): BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class, 'conference_session_speaker', 'conference_session_id', 'speaker_id')
            ->withPivot('assignment_type');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(SessionRegistration::class);
    }
}