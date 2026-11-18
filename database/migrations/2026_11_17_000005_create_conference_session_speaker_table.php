<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conference_session_speaker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_session_id')->constrained('conference_sessions')->cascadeOnDelete();
            $table->foreignId('speaker_id')->constrained('speakers')->cascadeOnDelete();
            $table->string('assignment_type', 30)->default('speaker'); // keynote, speaker, panelist, moderator
            $table->unique(['conference_session_id', 'speaker_id'], 'css_speaker_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conference_session_speaker');
    }
};