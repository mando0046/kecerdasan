<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'name',             // Nama ujian
        'description',      // Deskripsi ujian
        'duration',         // Durasi ujian (menit)
        'total_questions',  // Jumlah soal
        'is_active',        // Status aktif ujian
    ];

    protected $casts = [
        'duration' => 'integer',
        'total_questions' => 'integer',
        'is_active' => 'boolean',
    ];

    // ==========================
    // 🔹 RELATIONS
    // ==========================

    /**
     * Relasi ke ExamAttempt (1 ujian memiliki banyak attempt)
     */
    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class, 'exam_id');
    }

    /**
     * Relasi ke Question (1 ujian memiliki banyak soal)
     * Jika kamu punya kolom exam_id di tabel questions
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

    // ==========================
    // 🔹 SCOPES
    // ==========================

    /**
     * Ambil hanya ujian yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ==========================
    // 🔹 HELPER METHODS
    // ==========================

    /**
     * Ambil attempt aktif milik user tertentu (atau user login)
     */
    public function activeAttempt($userId = null)
    {
        $userId = $userId ?? Auth::id();

        return $this->attempts()
            ->where('user_id', $userId)
            ->whereNull('finished_at')
            ->latest()
            ->first();
    }

    /**
     * Cek apakah ujian ini sedang aktif
     */
    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }
}
