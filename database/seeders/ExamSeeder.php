<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    public function run(): void
    {
        // 🔒 Nonaktifkan sementara foreign key checks agar bisa truncate dengan aman
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('exams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ✅ Masukkan 3 data ujian simulasi
        DB::table('exams')->insert([
            [
                'name' => 'Simulasi Tes Kecerdasan',
                'description' => 'Tes untuk mengukur tingkat kecerdasan logis dan analitis.',
                'duration' => 60, // menit
                'total_questions' => 50,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simulasi Tes Kecerdasan ke-2',
                'description' => 'Tes untuk mengukur tingkat kecerdasan logis dan analitis.',
                'duration' => 0, // menit
                'total_questions' => 0,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simulasi Tes Kepribadian',
                'description' => 'Tes untuk mengenali Profil kepribadian peserta.',
                'duration' => 60,
                'total_questions' => 100,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
