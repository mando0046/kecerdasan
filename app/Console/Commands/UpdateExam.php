<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Exam;

class UpdateExam extends Command
{
    protected $signature = 'exams:update {id}';
    protected $description = 'Update exam details via CLI';

    public function handle()
    {
        $id = $this->argument('id');
        $exam = Exam::find($id);

        if (!$exam) {
            $this->error("Exam dengan ID $id tidak ditemukan.");
            return 1;
        }

        $this->info("Mengedit exam ID: $exam->id");
        $this->line("Tekan ENTER untuk melewati update field.\n");

        // ===============================
        // UPDATE NAME
        // ===============================
        $name = $this->ask("Nama exam", $exam->name);
        if ($name !== null && $name !== '') {
            $exam->name = $name;
        }

        // ===============================
        // UPDATE DESCRIPTION
        // ===============================
        $description = $this->ask("Deskripsi exam", $exam->description);
        if ($description !== null && $description !== '') {
            $exam->description = $description;
        }

        // ===============================
        // UPDATE DURATION
        // ===============================
        $duration = $this->ask("Durasi (menit)", $exam->duration);
        if (is_numeric($duration)) {
            $exam->duration = (int)$duration;
        }

        // ===============================
        // UPDATE TOTAL QUESTIONS
        // ===============================
        $totalQuestions = $this->ask("Total Soal", $exam->total_questions);
        if (is_numeric($totalQuestions)) {
            $exam->total_questions = (int)$totalQuestions;
        }

        // ===============================
        // UPDATE IS ACTIVE (YES/NO)
        // ===============================
        $isActive = $this->confirm(
            "Aktifkan exam?", 
            $exam->is_active == 1
        );

        $exam->is_active = $isActive ? 1 : 0;

        // Simpan perubahan
        $exam->save();

        $this->info("\nExam ID $exam->id berhasil diperbarui!\n");

        // ===============================
        // TAMPILKAN TABEL
        // ===============================
        $this->table(
            ['ID', 'Name', 'Description', 'Duration', 'Total Questions', 'Is Active'],
            [[
                $exam->id,
                $exam->name,
                $exam->description,
                $exam->duration,
                $exam->total_questions,
                $exam->is_active
            ]]
        );

        return 0;
    }
}
