<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'exam_id',          // relasi ke ujian
        'question',
        'question_image',
        'option_a',
        'option_image_a',
        'option_b',
        'option_image_b',
        'option_c',
        'option_image_c',
        'option_d',
        'option_image_d',
        'option_e',
        'option_image_e',
        'answer', // kolom kunci jawaban
    ];

    /**
     * 🔗 Relasi ke model Exam
     * Setiap soal dimiliki oleh satu ujian.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * 🔗 Relasi ke model Answer
     * Satu soal bisa memiliki banyak jawaban user.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * 🧩 Accessor agar mudah ambil jawaban benar.
     */
    public function getCorrectAnswerAttribute()
    {
        return $this->answer;
    }

    /**
     * 🔠 Mutator untuk memastikan kolom answer selalu huruf besar
     */
    public function setAnswerAttribute($value)
    {
        $this->attributes['answer'] = strtoupper($value);
    }
}
