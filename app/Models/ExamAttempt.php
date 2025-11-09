<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    use HasFactory;

    protected $table = 'exam_attempts';

    protected $fillable = [
        'user_id',
        'exam_id',
        'total_questions',
        'correct_answer',
        'wrong_answer',
        'score',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'exam_id' => 'integer',
        'total_questions' => 'integer',
        'correct_answer' => 'integer',
        'wrong_answer' => 'integer',
        'score' => 'float',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'answers' => 'array',
    ];

    // ==========================
    // 🔹 RELATIONS
    // ==========================

    /**
     * Relasi ke tabel exams (1 attempt milik 1 exam)
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    /**
     * Relasi ke tabel users (1 attempt milik 1 user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke tabel answers (1 attempt memiliki banyak jawaban)
     * Hubungkan melalui kolom `attempt_number` di tabel answers
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'attempt_number', 'id');
    }

    /**
     * Relasi ke tabel scores (1 attempt punya 1 score)
     */
    public function score()
    {
        return $this->hasOne(Score::class, 'attempt_number', 'id');
    }

    // ==========================
    // 🔹 HELPER & SCOPE
    // ==========================

    /**
     * Cek apakah attempt sudah selesai
     */
    public function isFinished(): bool
    {
        return !is_null($this->finished_at);
    }

    /**
     * Scope: Ambil hanya attempt yang masih aktif (belum selesai)
     */
    public function scopeActive($query)
    {
        return $query->whereNull('finished_at');
    }
}
