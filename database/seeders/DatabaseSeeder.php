<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1️⃣ Akun admin utama
        User::updateOrCreate(
            ['email' => 'mando@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Sumda#0046'),
                'role' => 'admin',
            ]
        );

        // 2️⃣ Akun peserta contoh
        User::updateOrCreate(
            ['email' => 'arla@gmail.com'],
            [
                'name' => 'Azwa Nisyiatul Rizky',
                'password' => Hash::make('password'),
                'role' => 'peserta',
            ]
        );

        // 3️⃣ Akun peserta tambahan opsional
        User::updateOrCreate(
            ['email' => 'rozi@gmail.com'],
            [
                'name' => 'Muhammad Fahrurrozi',
                'password' => Hash::make('password'),
                'role' => 'Operator',
            ]
        );

        // 4️⃣ Jalankan seeder ujian & soal
        $this->call([
            UserSeeder::class,      // buat data user tambahan jika perlu
            ExamSeeder::class,      // buat data ujian
            Cerdas1Seeder::class,      // buat soal cerdas1
            Cerdas2Seeder::class,      // buat data cerdas2
            PribadiSeeder::class,      // buat data Pribadi1
        ]);

        // ✅ Kamu bisa tambahkan seeder lain di sini (scores, exam_attempts, dll)
    }
}
