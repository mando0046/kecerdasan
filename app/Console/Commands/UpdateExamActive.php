<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Exam;

class UpdateExamActive extends Command
{
    protected $signature = 'exams:activate {id}';
    protected $description = 'Update status aktif exam berdasarkan ID';

public function handle()
{
    $id = $this->argument('id');

    $exam = Exam::find($id);

    if (!$exam) {
        $this->error("Exam dengan ID $id tidak ditemukan.");
        return 1;
    }

    // Prompt Yes/No
    $newStatus = $this->confirm(
        'Aktifkan exam?', 
        $exam->is_active == 1
    );

    // Simpan status (boolean → integer)
    $exam->is_active = $newStatus ? 1 : 0;
    $exam->save();

    $this->info("Status exam ID $id berhasil diperbarui!");
    $this->showTable();

    return 0;
}

    // Tampilkan tabel semua exam
    private function showTable()
    {
        $exams = Exam::all(['id', 'name', 'description', 'duration', 'total_questions', 'is_active']);

        $this->table(
            ['ID', 'Name', 'Description', 'Duration', 'Total Questions', 'Is Active'],
            $exams->toArray()
        );
    }
}
