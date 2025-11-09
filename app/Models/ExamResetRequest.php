<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResetRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'reason',
        'requested_at',
    ];

    // Pastikan semua field datetime di-cast ke Carbon
    protected $casts = [
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
        'requested_at' => 'datetime', // tambahkan jika field ini tanggal/waktu
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
