<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
        'attempt_number',
        'is_correct',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'question_id' => 'integer',
        'attempt_number' => 'integer',
        'is_correct' => 'boolean',
    ];

    /**
     * 🔗 Relasi ke tabel questions (1 jawaban milik 1 soal)
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * 🔗 Relasi ke tabel users (1 jawaban milik 1 user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 🔗 Relasi ke tabel exam_attempts
     */
    public function examAttempt()
    {
        return $this->belongsTo(ExamAttempt::class, 'attempt_number', 'id');
    }

    /**
     * 🔍 Scope: ambil jawaban untuk attempt aktif (dari session)
     */
    public function scopeForCurrentAttempt($query)
    {
        $attemptId = session('attempt_id');
        $userId = Auth::id();

        if (!$attemptId || !$userId) {
            return $query->whereRaw('1=0'); // Tidak ada data
        }

        return $query->where('user_id', $userId)
                     ->where('attempt_number', $attemptId);
    }
}
