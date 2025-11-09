<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Cerdas2Seeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // 🧹 Kosongkan tabel sebelum isi ulang
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('questions');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /**
         * 📘 Daftar ujian dan jumlah soal per exam
         */
        $exams = [
            2 => ['name' => 'Simulasi Tes Kecerdasan-2', 'total' => 100],
        ];

        $questions = [];

        foreach ($exams as $examId => $examData) {
            $total = $examData['total'];

            switch ($examId) {
                // 🧠 Simulasi Cerdas 2
                case 2:
                    $questions = array_merge($questions, [
                        // --- No 1 ------
                        // --- No 1  ------
            [
                'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 2  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 3  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 4  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 5  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 6  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 7  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 8  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 9  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 10  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ], // --- No 11  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 12  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 13  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 14  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 15  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 16  ------
            [
              'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 17  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 18  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 19  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 20  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 21  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 22  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 23  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 24  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 25  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 26  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 27  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 28  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 29  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 30  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 31  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 32  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 33  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 34  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 35  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 36  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 37  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 38  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 39  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 40  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 41  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 42  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 43  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 44  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 45  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 46  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 47  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 48  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 49  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 50  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
             // --- No 51  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 52  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 53  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 54  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 55  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 56  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 57  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 58  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 59  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 60  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ], // --- No 61  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 62  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 63  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 64  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 65  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 66  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 67  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 68  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 69  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 70  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 71  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 72  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 73  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 74  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			 // --- No 75  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			// --- No 76  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 77  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 78  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 79  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 80  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 81  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 82  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
             // --- No 83  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			// --- No 84  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 85  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 86  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 87  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 88  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 89  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 90  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
             // --- No 91  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			// --- No 92  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 93  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 94  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 95  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 96  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 97  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
            // --- No 98  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
             // --- No 99  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
			// --- No 100  ------
            [
               'question' => '',
                'option_a' => '0',
                'option_b' => '0',
                'option_c' => '0',
                'option_d' => '0',
                'option_e' => '0',
                'answer' => '0',
            ],
           
           
                    ]);
                    break;
            }
        }

        // Tambahkan exam_id dan timestamp ke semua soal
        foreach ($questions as &$q) {
            $q['exam_id'] = 2;       // ✅ tambahkan exam_id
            $q['created_at'] = $now;
            $q['updated_at'] = $now;
        }

        // Masukkan semua data ke tabel 'questions'
        DB::table('questions')->insert($questions);
    }
}
