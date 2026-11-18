<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionRegistration extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'conference_session_id', 'user_id', 'status',
        'registered_at', 'cancelled_at', 'checked_in_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'checked_in_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(ConferenceSession::class, 'conference_session_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}