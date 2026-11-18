<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conference extends Model
{
    protected $fillable = [
        'organiser_id', 'title', 'description', 'start_date', 'end_date',
        'registration_deadline', 'capacity', 'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'registration_deadline' => 'datetime',
    ];

    public function organiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organiser_id');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ConferenceSession::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(ConferenceRegistration::class);
    }
}