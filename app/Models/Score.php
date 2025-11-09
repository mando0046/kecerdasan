<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',          // 🔹 pastikan kolom ini ada di tabel
        'attempt_number',
        'correct_answers',
        'total_questions',
        'score',
    ];

    /**
     * 🔹 Relasi ke User (peserta)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 🔹 Relasi ke Exam (ujian)
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * 🔹 Relasi ke ExamAttempt (percobaan ujian)
     */
    public function attempt()
    {
        return $this->belongsTo(ExamAttempt::class, 'attempt_number', 'id');
    }

    /**
     * 🔹 Accessor opsional: persentase skor
     */
    public function getScorePercentageAttribute()
    {
        return $this->total_questions > 0
            ? round(($this->correct_answers / $this->total_questions) * 100, 2)
            : 0;
    }
}
