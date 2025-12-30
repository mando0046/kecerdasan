<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Exam;

class CreateExam extends Command
{
    protected $signature = 'exams:create';
    protected $description = 'Membuat exam baru melalui CLI';

    public function handle()
    {
        $this->info("=== Buat Exam Baru ===");

        $name = $this->ask('Nama exam');
        $description = $this->ask('Deskripsi exam');
        $duration = $this->ask('Durasi (menit)');
        $totalQuestions = $this->ask('Jumlah soal');
        
        $isActive = $this->choice(
            'Aktifkan exam?',
            ['0', '1'],  // 0 = tidak aktif, 1 = aktif
            1            // default active
        );

        $exam = Exam::create([
            'name' => $name,
            'description' => $description,
            'duration' => (int) $duration,
            'total_questions' => (int) $totalQuestions,
            'is_active' => (int) $isActive,
        ]);

        $this->info("Exam berhasil dibuat dengan ID: {$exam->id}");
    }
}
