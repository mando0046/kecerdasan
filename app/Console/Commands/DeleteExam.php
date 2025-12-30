<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;

class DeleteExam extends Command
{
    protected $signature = 'exams:delete {id}';
    protected $description = 'Menghapus exam berdasarkan ID beserta relasinya';

public function handle()
{
    $id = $this->argument('id');

    // Pastikan exam ada
    $exam = Exam::find($id);
    if (!$exam) {
        $this->error("Exam dengan ID $id tidak ditemukan.");
        return;
    }

    $this->info("Menghapus exam ID $id beserta relasinya...");

    DB::statement("SET FOREIGN_KEY_CHECKS=0;");

    // 1. Hapus scores yg terkait exam
    DB::table('scores')->where('exam_id', $id)->delete();

    // 2. Hapus exam_attempts yg terkait exam (walau tidak ada FK)
    if (DB::getSchemaBuilder()->hasColumn('exam_attempts', 'exam_id')) {
        DB::table('exam_attempts')->where('exam_id', $id)->delete();
    }

    // 3. Hapus exam itu sendiri
    DB::table('exams')->where('id', $id)->delete();

    DB::statement("SET FOREIGN_KEY_CHECKS=1;");

    $this->info("Exam ID $id dan relasi yang valid berhasil dihapus!");
}




}
