<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowExams extends Command
{
    protected $signature = 'exams:show';
    protected $description = 'Menampilkan semua data di tabel exams';

    public function handle()
    {
        $exams = DB::table('exams')->get();

        if ($exams->isEmpty()) {
            $this->info('Tidak ada data di tabel exams.');
            return;
        }

        // Menampilkan data dalam bentuk tabel di CLI
        $this->table(
            ['ID', 'Name', 'Description', 'Duration', 'Total Questions', 'Is Active'],
            $exams->map(function ($item) {
                return [
                    $item->id,
                    $item->name,
                    $item->description,
                    $item->duration,
                    $item->total_questions,
                    $item->is_active,
                ];
            })
        );
    }
}
