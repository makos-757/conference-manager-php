<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Speaker extends Model
{
    protected $fillable = ['user_id', 'name', 'bio', 'photo'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(ConferenceSession::class, 'conference_session_speaker', 'speaker_id', 'conference_session_id')
            ->withPivot('assignment_type');
    }
}