<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Cerdas3Seeder extends Seeder
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
            3 => ['name' => 'Simulasi Tes Kecerdasan ke-2', 'total' => 100],
        ];

        $questions = [];

        foreach ($exams as $examId => $examData) {
            $total = $examData['total'];

            switch ($examId) {
                // 🧠 Simulasi Kepribadian
                case 3:
                    $questions = array_merge($questions, [



 // --- No 1  ------
            [
                'question' => 'Jarak Yogyakarta – Klaten di peta adalah 6 cm. Skala yang dipergunakan di peta itu adalah 1 : 700.000. Niko bersepeda dari Yogyakarta ke Klaten dengan kecepatan 36 km/jam. Bila Niko berangkat pada pukul 06.00, pukul berapa Niko tiba di Klaten?  ',
                'option_a' => 'pk 07.00',
                'option_b' => 'pk 07.10 ',
                'option_c' => 'pk 07.30 ',
                'option_d' => 'pk 08.00 ',
                'option_e' => 'pk 08.10 ',
                'answer' => 'B',
            ],
            // --- No 2  ------
            [
                'question' => 'Seorang pengendara sepeda mengayuh sepedanya dalam waktu 40 detik untuk menempuh jarak 400 meter. Berapakah selisih kecepatannya dalam km/jam dibandingkan seseorang lainnya yang menaiki kudanya dengan kecepatan 48 km/jam?  ',
                'option_a' => '20 km/jam',
                'option_b' => '18 km/jam',
                'option_c' => '16 km/jam ',
                'option_d' => '14 km/jam',
                'option_e' => '12 km/jam  ',
                'answer' => 'E',
            ],
            // --- No 3  ------
            [
                'question' => 'Jika satuan ukuran untuk soal tersebut di atas dalam satuan meter, dan Joko telah mengelilinginya sebanyak 27 kali sementara Rudi telah menempuh 644 meter, berapa meterkah selisih antara jarak yang dilakukan Joko dan Rudi? ',
                'option_a' => '102 meter',
                'option_b' => '112 meter ',
                'option_c' => '122 meter ',
                'option_d' => '202 meter ',
                'option_e' => '92 meter ',
                'answer' => 'B',
            ],
            // --- No 4  ------
            [
                'question' => 'Seorang pembalap mampu melajukan sepeda motornya hingga dapat menempuh jarak 1,8 kilometer dalam waktu 30 detik. Berapakah kecepatannya dalam hitungan kilometer per jam (km/jam)? ',
                'option_a' => '216 km/jam ',
                'option_b' => '226 km/jam ',
                'option_c' => '230 km/jam ',
                'option_d' => '234 km/jam  ',
                'option_e' => '236 km/jam ',
                'answer' => 'A',
            ],
            // --- No 5  ------
            [
                'question' => 'Kecepatan seorang pelari marathon adalah 500 m/menit. Jika ia istirahat 2 kali dan setiap istirahat berlangsung selama 5 menit. Berapa jarak yang ditempuh selama 1 jam?  ',
                'option_a' => '20 km',
                'option_b' => '30 km ',
                'option_c' => '25 km ',
                'option_d' => '35 km ',
                'option_e' => '45 km ',
                'answer' => 'B',
            ],
            // --- No 6  ------
            [
                'question' => 'Jarak antara Cilacap dan Bandung adalah 267 kilometer. Jika jarak antara Cilacap dan Bandung dalam peta adalah 12 centimeter, maka berapakah skala pada peta tersebut? ',
                'option_a' => '1 : 2.255.000',
                'option_b' => '1 : 2.245.000 ',
                'option_c' => '1 : 2.235.000  ',
                'option_d' => '1 : 2.225.000 ',
                'option_e' => '1 : 2.215.000 ',
                'answer' => 'D',
            ],
			 // --- No 7  ------
            [
                'question' => 'Sebuah denah memiliki skala 1 : 200. Jika dua titik pada denah berjarak 7 cm, berapakah jarak sebenarnya?  ',
                'option_a' => '1.000 cm',
                'option_b' => '1.400 cm ',
                'option_c' => '2.100 cm ',
                'option_d' => '700 cm ',
                'option_e' => '800 cm ',
                'answer' => 'B',
            ],
			 // --- No 8  ------
            [
                'question' => 'Jarak dua kota pada peta adalah 4 cm. Jika jarak sebenarnya 8 km, maka skala peta tersebut adalah… ',
                'option_a' => '1 : 100.000',
                'option_b' => '1 : 300.000 ',
                'option_c' => '1 : 500.000 ',
                'option_d' => '1 : 2.000.000 ',
                'option_e' => '1 : 200.000 ',
                'answer' => '0',
             ],
			 // --- No 9  ------
            [
                'question' => 'Pada gambar berskala 1 : 300, sebuah jalan digambar sepanjang 5 cm. Berapa meter panjang jalan sebenarnya?  ',
                'option_a' => '1,5 m',
                'option_b' => '0,15 m ',
                'option_c' => '15 m ',
                'option_d' => '150 m ',
                'option_e' => '20 m ',
                'answer' => 'C',
            ],
			 // --- No 10  ------
            [
               'question' => 'Jika sebuah taman berukuran 30 meter digambar sepanjang 6 cm, maka skala denah tersebut adalah… ',
                'option_a' => '1 : 600',
                'option_b' => '1 : 50 ',
                'option_c' => '1 : 5 ',
                'option_d' => '1 : 500 ',
                'option_e' => '1 : 60 ',
                'answer' => 'D',
               ], // --- No 11  ------
            [
               'question' => '(27 + 34)² – 2345 = …… ',
                'option_a' => '1176',
                'option_b' => '1276 ',
                'option_c' => '1376 ',
                'option_d' => '1367  ',
                'option_e' => '1267 ',
                'answer' => 'C',

            ],
			 // --- No 12  ------
            [
               'question' => '(√1.369  X √2.401 : 4) = …… ',
                'option_a' => '453,25',
                'option_b' => '455,25  ',
                'option_c' => '435,25 ',
                'option_d' => '455,35 ',
                'option_e' => '453,55 ',
                'answer' => 'A',
             ],
			 // --- No 13  ------
            [
                'question' => 'Jika, a = 4.5 dan   b = 5.4     c = a + b²
                                maka, hasil (a² X b) – c adalah ……  ',
                'option_a' => '76,59',
                'option_b' => '75,69 ',
                'option_c' => '75,96 ',
                'option_d' => '75,95 ',
                'option_e' => '74,59 ',
                'answer' => 'B',
            ],
			 // --- No 14  ------
            [
               'question' => '(0.3² – 0.3) X (–3) = …… ',
                'option_a' => '–0,63',
                'option_b' => '6,3 ',
                'option_c' => '–6,3  ',
                'option_d' => '0,63   ',
                'option_e' => '3,6  ',
                'answer' => 'D',
            ],
			 // --- No 15  ------
            [
               'question' => 'Ali memiliki kelereng sebanyak 180 butir, kelereng tersebut akan dibagikan kepada rekannya. Dayat memperoleh 1/5 kelereng, Udin memperoleh 4/9, dan sisanya diberikan kepada Bagus. Berapakah total kelereng yang diterima Bagus?  ',
                'option_a' => '36 butir',
                'option_b' => '64 butir ',
                'option_c' => '46 butir ',
                'option_d' => '80 butir ',
                'option_e' => '116 butir ',
                'answer' => 'C',
            ],
			 // --- No 16  ------
            [
                'question' => 'Adi menabung setiap hari dari sisa uang jajan sekolahnya selama 50 hari sebesar Rp3.000. la mempunyai keinginan untuk membeli sepatu seharga Rp80.000. Berapakah sisa uang tabungan Adi? ',
                'option_a' => 'Rp100.000',
                'option_b' => 'Rp80.000 ',
                'option_c' => 'Rp95.000 ',
                'option_d' => 'Rp70.000 ',
                'option_e' => 'Rp65.000 ',
                'answer' => 'D',
            ],
			 // --- No 17  ------
            [
                'question' => 'Di sebuah toko terdapat 10 buah buku tulis, 9 pulpen, 8 pensil, dan 4 penghapus. Jika dua orang anak masing-masing berbelanja 2 buah buku tulis, 1 pensil, dan 2 penghapus, berapakah sisa barang yang dimiliki oleh toko?  ',
                'option_a' => '9 pulpen, 8 pensil, 4 penghapus, dan 10 buah buku tulis',
                'option_b' => '8 pensil, 9 pulpen, 10 buah buku tulis, dan 4 penghapus ',
                'option_c' => '2 penghapus, 6 pensil, 6 buah buku tulis, dan 9 pulpen, ',
                'option_d' => '10 buah buku tulis, 8 pensil, 4 penghapus, dan 9 pulpen ',
                'option_e' => '9 pulpen, 10 buah buku tulis, 4 penghapus, dan 8 pensil ',
                'answer' => 'C',

            ],
			 // --- No 18  ------
            [
                'question' => '9 – 2 x 18 : 3 = … ',
                'option_a' => '-3',
                'option_b' => '-42 ',
                'option_c' => '3 ',
                'option_d' => '7 ',
                'option_e' => '42 ',
                'answer' => 'A',
            ],
			 // --- No 19  ------
            [
               'question' => '30 X 5 + 75 : 25 =... ',
                'option_a' => '90',
                'option_b' => '102 ',
                'option_c' => '153 ',
                'option_d' => '155 ',
                'option_e' => '157 ',
                'answer' => 'C',
            ],
			 // --- No 20  ------
            [
               'question' => '65 + 95 - 60 =... ',
                'option_a' => '75',
                'option_b' => '90 ',
                'option_c' => '100 ',
                'option_d' => '120 ',
                'option_e' => '45 ',
                'answer' => 'C',
            ],
			 // --- No 21  ------
            [
                'question' => 'Jika 3 kg beras harganya Rp36.000, berapa harga 5 kg beras … ?  ',
                'option_a' => 'Rp45.000',
                'option_b' => 'Rp50.000 ',
                'option_c' => 'Rp55.000 ',
                'option_d' => 'Rp60.000 ',
                'option_e' => 'Rp65.000 ',
                'answer' => 'D',
            ],
			 // --- No 22  ------
            [
                'question' => 'Sebuah mobil patroli memerlukan 5 liter bensin untuk menempuh jarak 60 km. Berapa liter bensin yang diperlukan untuk menempuh jarak 180 km … ? ',
                'option_a' => '10 Liter',
                'option_b' => '12 Liter ',
                'option_c' => '15 Liter ',
                'option_d' => '18 Liter ',
                'option_e' => '20 Liter ',
                'answer' => 'C',
            ],
			 // --- No 23  ------
            [
                'question' => 'Jika 8 mesin dapat memproduksi 480 unit barang dalam sehari, berapa banyak unit yang dapat diproduksi oleh 12 mesin dalam sehari … ? ',
                'option_a' => '620 unit',
                'option_b' => '640 unit ',
                'option_c' => '660 unit ',
                'option_d' => '680 unit ',
                'option_e' => '720 unit ',
                'answer' => 'E',
            ],
			 // --- No 24  ------
            [
                'question' => 'Seorang polisi lalu lintas dapat membuat 8 tilang dalam 2 jam. Berapa tilang yang dapat dibuat dalam 5 jam … ?  ',
                'option_a' => '15 Tilang',
                'option_b' => '18 Tilang',
                'option_c' => '20 Tilang',
                'option_d' => '22 Tilang',
                'option_e' => '25 Tilang',
                'answer' => 'C',
            ],
			 // --- No 25  ------
            [
                'question' => 'Jika 15 polisi dapat mengamankan sebuah acara dalam 4 jam, berapa polisi yang diperlukan untuk mengamankan acara serupa selama 6 jam … ?  ',
                'option_a' => '13 Polisi',
                'option_b' => '14 Polisi',
                'option_c' => '15 Polisi',
                'option_d' => '16 Polisi',
                'option_e' => '17 Polisi',
                'answer' => 'C',
            ],
			 // --- No 26  ------
            [
                'question' => 'Jika 6 pekerja dapat menyelesaikan sebuah proyek dalam 12 hari, berapa lama waktu yang dibutuhkan oleh 9 pekerja untuk menyelesaikan proyek yang sama … ?  ',
                'option_a' => '6 hari',
                'option_b' => '8 hari',
                'option_c' => '9 hari',
                'option_d' => '10 hari',
                'option_e' => '12 hari',
                'answer' => 'B',
            ],
			 // --- No 27  ------
            [
                'question' => 'Sebuah mobil melaju dengan kecepatan 60 km/jam dan menempuh jarak tertentu dalam 5 jam. Jika mobil tersebut ingin menempuh jarak yang sama dalam 3 jam, berapakah kecepatan yang diperlukan … ?   ',
                'option_a' => '80 Km/Jam',
                'option_b' => '90 Km/Jam',
                'option_c' => '100 Km/Jam',
                'option_d' => '110 Km/Jam',
                'option_e' => '120 Km/Jam',
                'answer' => 'C',
            ],
			 // --- No 28  ------
            [
                'question' => 'Jika 4 petugas dapat menyelesaikan suatu tugas dalam 6 hari, berapa hari yang diperlukan oleh 12 petugas untuk menyelesaikan tugas yang sama … ?  ',
                'option_a' => '1 hari',
                'option_b' => '2 hari ',
                'option_c' => '3 hari ',
                'option_d' => '4 hari ',
                'option_e' => '5 hari ',
                'answer' => 'B',
            ],
			 // --- No 29  ------
            [
                'question' => 'Sebuah pipa dapat mengisi kolam dalam waktu 12 jam. Jika digunakan 3 pipa identik, berapa lama waktu yang dibutuhkan untuk mengisi kolam tersebut … ?  ',
                'option_a' => '3 Jam',
                'option_b' => '4 jam ',
                'option_c' => '5 jam ',
                'option_d' => '6 jam ',
                'option_e' => '8 jam ',
                'answer' => 'B',
            ],
			 // --- No 30  ------
            [
               'question' => 'Jika 15 orang dapat menyelesaikan sebuah pekerjaan dalam 10 hari, berapa banyak orang yang dibutuhkan untuk menyelesaikan pekerjaan yang sama dalam 6 hari … ? ',
                'option_a' => '20 orang',
                'option_b' => '22 orang',
                'option_c' => '23 orang',
                'option_d' => '25 orang',
                'option_e' => '27 orang',
                'answer' => 'D',
            ],
			 // --- No 31  ------
            [
               'question' => '3   5   9   15   15   25   21 ---   ---  ',
                'option_a' => '35 dan 23',
                'option_b' => '35 dan 27  ',
                'option_c' => '45 dan 23  ',
                'option_d' => '45 dan 27 ',
                'option_e' => '35 dan 45 ',
                'answer' => 'B',
            ],
			 // --- No 32  ------
            [
               'question' => '243   81   27   9   3   1   ---  ',
                'option_a' => '1/2',
                'option_b' => '1/3 ',
                'option_c' => '1/4 ',
                'option_d' => '1/6 ',
                'option_e' => '3/4 ',
                'answer' => 'B',
            ],
			 // --- No 33  ------
            [
                'question' => '0, 1, 4, 9, 16, 25, 36, 49, ... ',
                'option_a' => '64',
                'option_b' => '46 ',
                'option_c' => '68 ',
                'option_d' => '78 ',
                'option_e' => '74 ',
                'answer' => 'A',
            ],
			 // --- No 34  ------
            [
               'question' => '9, 18, 27, ... , 45, ... , 63 ',
                'option_a' => '36,  45',
                'option_b' => '36,  54 ',
                'option_c' => '54,  63 ',
                'option_d' => '54,  36 ',
                'option_e' => '36,  63 ',
                'answer' => 'B',

            ],
			 // --- No 35  ------
            [
                'question' => '17, 34, 51, 68, .... ',
                'option_a' => '87',
                'option_b' => '58 ',
                'option_c' => '85 ',
                'option_d' => '90 ',
                'option_e' => '81',
                'answer' => 'C',
            ],
			 // --- No 36  ------
            [
                'question' => 'A, B, M, N, C, D, M, N, E, ...., ..... ',
                'option_a' => 'F dan M',
                'option_b' => 'M dan N ',
                'option_c' => 'G dan M ',
                'option_d' => 'G dan N ',
                'option_e' => 'F dan G ',
                'answer' => 'A',
            ],
			 // --- No 37  ------
            [
                'question' => 'E, D, U, G, F, V, I, H, W, ...., ..... ',
                'option_a' => ' J dan X',
                'option_b' => 'K dan J ',
                'option_c' => ' L dan K',
                'option_d' => 'K dan L ',
                'option_e' => 'J dan K ',
                'answer' => 'C',

            ],
			 // --- No 38  ------
            [
                'question' => 'G, G, Z, J, J, Y, M, M, X, P, ...., ... ',
                'option_a' => 'P dan V',
                'option_b' => 'V dan P ',
                'option_c' => 'W dan P ',
                'option_d' => 'P dan W ',
                'option_e' => 'S dan W ',
                'answer' => 'D',

            ],
			 // --- No 39  ------
            [
                'question' => 'G, H, I, I, J, K, L, L, M, N, O, ...., .... ',
                'option_a' => 'P dan P',
                'option_b' => 'P dan Q ',
                'option_c' => 'O dan O ',
                'option_d' => 'O dan P ',
                'option_e' => 'O dan Q ',
                'answer' => 'D',

            ],
			 // --- No 40  ------
            [
                'question' => 'B, W, D, U, F, S, H, Q, ...., ..... ',
                'option_a' => 'K dan O',
                'option_b' => 'J dan P ',
                'option_c' => 'J dan O ',
                'option_d' => 'O dan J ',
                'option_e' => 'J dan N ',
                'answer' => 'C',
             ],
			 // --- No 41  ------
            [
                'question' => 'Seorang penjual buah membeli buah dengan harga Rp450.000, dan pedagang tersebut berhasil menjual semuanya dengan harga Rp573.750. Berapakah persentase keuntungan yang didapat oleh penjual ',
                'option_a' => '20 %',
                'option_b' => '22.5% ',
                'option_c' => '25% ',
                'option_d' => '25.5% ',
                'option_e' => '27.5% ',
                'answer' => 'E',

            ],
			 // --- No 42  ------
            [
                'question' => 'Seseorang mendapatkan hadiah mobil dalam suatu program televisi. Di pasaran umum, harga mobil tersebut adalah Rp150.000.000. Adapun pajak ditetapkan 2/3 dari harga tersebut. Jika ia diharuskan membayar pajak sebesar Rp450 per Rp1.000, berapa besar pajak yang harus dibayar?   ',
                'option_a' => 'Rp45.000.000',
                'option_b' => 'Rp37.500.000 ',
                'option_c' => 'Rp30.000.000   ',
                'option_d' => 'Rp25.750.000  ',
                'option_e' => 'Rp25.000.000  ',
                'answer' => 'A',
              ],
			 // --- No 43  ------
            [
                'question' => 'Dari pembagiannya dengan Budi, Ahmad mendapatkan bagian 62,5%, yakni sebesar Rp3.200.000. Berapakah selisih uang Ahmad dan Budi? ',
                'option_a' => 'Rp1.380.00B.',
                'option_b' => 'Rp1.280.00 ',
                'option_c' => 'Rp1.180.00D ',
                'option_d' => 'Rp1.080.00 ',
                'option_e' => 'Rp980.00 ',
                'answer' => 'B',

            ],
			 // --- No 44  ------
            [
                'question' => 'Seorang pedagang buah membeli satu karung mangga dengan harga Rp325.000, kemudian mangga tersebut ditimbang dan ternyata timbangannya 45 kg. Kemudian mangga tersebut dijual seharga Rp15.000 per kg. Maka pedagang tersebut mengalami . . .  ',
                'option_a' => 'Untung Rp325.000',
                'option_b' => 'Rugi Rp325.000 ',
                'option_c' => 'Untung Rp350.000 ',
                'option_d' => 'Rugi Rp350.000 ',
                'option_e' => 'Untung Rp 360.000 ',
                'answer' => 'C',

            ],
			 // --- No 45  ------
            [
                'question' => 'Seorang pedagang ayam membeli 20 ekor ayam dengan harga seluruhnya Rp600.000. Kemudian 8 ekor ayam dijual dengan harga Rp35.000 tiap ekor dan sisanya dijual dengan harga Rp25.000 tiap ekor. Maka pedagang tersebut mengalami . . .  ',
                'option_a' => 'Untung Rp25.000',
                'option_b' => 'Rugi Rp25.000 ',
                'option_c' => 'Untung Rp20.000 ',
                'option_d' => 'rugi Rp20.000 ',
                'option_e' => 'Untung Rp30.000 ',
                'answer' => 'D',

            ],
			 // --- No 46  ------
            [
                'question' => 'Rata-rata dari 5 bilangan adalah 60. Jika satu bilangan ditambahkan sehingga rata-rata menjadi 66, maka nilai bilangan yang ditambahkan adalah… ',
                'option_a' => '90',
                'option_b' => '96 ',
                'option_c' => '100 ',
                'option_d' => '110 ',
                'option_e' => '120 ',
                'answer' => 'D',
            ],
			 // --- No 47  ------
            [
                'question' => 'Rata-rata dari 4 bilangan ganjil berurutan adalah 47. Bilangan terkecil adalah…  ',
                'option_a' => '43',
                'option_b' => '44 ',
                'option_c' => '45 ',
                'option_d' => '46 ',
                'option_e' => '47 ',
                'answer' => 'A',
            ],
			 // --- No 48  ------
            [
                'question' => 'Nilai rata-rata dari 7 orang siswa adalah 80. Dua nilai siswa ditambahkan, yaitu 85 dan 95, sehingga rata-rata baru menjadi…  ',
                'option_a' => '83',
                'option_b' => '82 ',
                'option_c' => '81 ',
                'option_d' => '84 ',
                'option_e' => '80.5 ',
                'answer' => 'B',
            ],
			 // --- No 49  ------
            [
                'question' => 'Jika rata-rata dari 8 bilangan adalah 52, dan satu bilangan yaitu 60 diganti dengan 48, maka rata-rata baru adalah… ',
                'option_a' => '50.5',
                'option_b' => '50 ',
                'option_c' => '51 ',
                'option_d' => '51.5 ',
                'option_e' => '52 ',
                'answer' => 'A',
            ],
			 // --- No 50  ------
            [
                'question' => 'Rata-rata dari lima bilangan adalah 72. Jika satu bilangan yaitu 65 diganti dengan 85, maka rata-rata baru adalah… ',
                'option_a' => '76',
                'option_b' => '74 ',
                'option_c' => '73 ',
                'option_d' => '78 ',
                'option_e' => '75 ',
                'answer' => 'C',
            ],
             // --- No 51  ------
            [
                'question' => 'Andi berusia 12 tahun sedangkan usia ayahnya adalah 36 tahun. Berapakah perbandingan usia Andi dan usia ayahnya …  ',
                'option_a' => '2:1',
                'option_b' => '3:1 ',
                'option_c' => '1:3 ',
                'option_d' => '1:2 ',
                'option_e' => '2:2 ',
                'answer' => 'C',
            ],
            // --- No 52  ------
            [
                'question' => 'Perbandingan usia Rina dan Sila adalah 7 : 8. Jika usia Rina adalah 21 tahun, maka berapakah usia dari sila …  ',
                'option_a' => '22 tahun',
                'option_b' => '24 tahun',
                'option_c' => '26 tahun',
                'option_d' => '28 tahun',
                'option_e' => '30 tahun',
                'answer' => 'B',
            ],
            // --- No 53  ------
            [
               'question' => 'CERUK =  ______ ',
                'option_a' => 'pusat',
                'option_b' => 'simpang ',
                'option_c' => 'tanda ',
                'option_d' => 'lekuk ',
                'option_e' => 'poros ',
                'answer' => 'D',
            ],
            // --- No 54  ------
            [
                'question' => 'KLARIFIKASI =  ______ ',
                'option_a' => 'pengaturan',
                'option_b' => 'penentuan ',
                'option_c' => 'penegasan ',
                'option_d' => 'penjelasan ',
                'option_e' => 'pemeriksaan ',
                'answer' => 'D',
            ],
            // --- No 55  ------
            [
                'question' => 'DEPENDENSI =  ______ ',
                'option_a' => 'subsidi',
                'option_b' => 'swadaya ',
                'option_c' => 'mandiri ',
                'option_d' => 'tergantung ',
                'option_e' => 'sendiri ',
                'answer' => 'D',
            ],
            // --- No 56  ------
            [
                'question' => 'MEGA >< … ',
                'option_a' => 'luas',
                'option_b' => 'kecil ',
                'option_c' => 'hina ',
                'option_d' => 'rendah ',
                'option_e' => 'bawah ',
                'answer' => 'B',
            ],
			 // --- No 57  ------
            [
                'question' => 'CANGGIH >< … ',
                'option_a' => 'asli',
                'option_b' => 'mudah ',
                'option_c' => 'murah ',
                'option_d' => 'rendah ',
                'option_e' => 'rumit ',
                'answer' => 'A',
            ],
			 // --- No 58  ------
            [
                'question' => 'EKSPLISIT >< … ',
                'option_a' => 'terang',
                'option_b' => 'kabur ',
                'option_c' => 'takut ',
                'option_d' => 'tersirat ',
                'option_e' => 'tersurat ',
                'answer' => 'D',
            ],
			 // --- No 59  ------
            [
                'question' => 'Setiap siswa peserta kesenian adalah peserta bela diri atau renang. Tidak ada peserta bela diri atau renang yang bukan peserta melukis. Inda bukan peserta melukis. Kesimpulan yang tepat adalah … ',
                'option_a' => 'Inda adalah bukan peserta bela diri maupun kesenian. ',
                'option_b' => 'Inda adalah peserta melukis dan bukan peserta kesenian. ',
                'option_c' => 'Inda adalah bukan peserta kesenian, tetapi peserta renang. ',
                'option_d' => 'Inda adalah peserta renang dan bukan peserta melukis. ',
                'option_e' => 'Inda adalah bukan peserta kesenian tetapi peserta bela diri.  ',
                'answer' => 'A',
            ],
			 // --- No 60  ------
            [
                'question' => 'Anggota yang memiliki anak lebih dari tiga orang menerima piagam dan hadiah. Dedo menerima piagam organisasi, tetapi tidak menerima hadiah. Kesimpulan yang tepat adalah …  ',
                'option_a' => 'Dedo adalah anggota organisasi yang anaknya kurang dari tiga orang.',
                'option_b' => 'Dedo adalah anggota organisasi yang anaknya lebih dari tiga orang.  ',
                'option_c' => 'Dedo adalah anggota organisasi yang berhak menerima hadiah. ',
                'option_d' => 'Dedo adalah bukan anggota organisasi yang berhak menerima hadiah.  ',
                'option_e' => 'Dedo adalah bukan anggota yang anaknya lebih dari tiga orang. ',
                'answer' => 'A',
            ], // --- No 61  ------
            [
                'question' => 'Semua sopir bus sering mengemudikan kendaraannya dengan kecepatan tinggi. Sebagian sopir bus yang sering mengemudikan kendaraannya dengan kecepatan tinggi, tidak pernah mengantuk saat mengemudi. Kesimpulan yang tepat adalah … ',
                'option_a' => 'Semua yang tidak pernah mengemudikan mobilnya dengan kecepatan tinggi bukan sopir bus.',
                'option_b' => 'Semua yang tidak pernah mengantuk saat mengemudikan kendaraannya bukan sopir bus.  ',
                'option_c' => 'Semua sopir bus tidak pernah mengantuk saat mengemudikan kendaraannya.  ',
                'option_d' => 'Sebagian sopir bus pernah mengantuk saat mengemudikan kendaraannya. ',
                'option_e' => 'Sebagian sopir bus mengantuk saat mengemudikan kendaraannya dengan kecepatan tinggi. ',
                'answer' => 'D',
            ],
			 // --- No 62  ------
            [
                'question' => 'Elang : Kelinci = Ular : …  ',
                'option_a' => 'Ikan',
                'option_b' => 'ulat ',
                'option_c' => 'gagak ',
                'option_d' => 'singa  ',
                'option_e' => 'tikus ',
                'answer' => 'E',
            ],
			 // --- No 63  ------
            [
                'question' => 'Senin : Rabu = Januari : … ',
                'option_a' => 'februari',
                'option_b' => 'maret ',
                'option_c' => 'april ',
                'option_d' => 'mei ',
                'option_e' => 'juni ',
                'answer' => 'B',
            ],
			 // --- No 64  ------
            [
                'question' => 'Platina : Logam = Permata : … ',
                'option_a' => 'intan',
                'option_b' => 'emas ',
                'option_c' => 'akik ',
                'option_d' => 'batu ',
                'option_e' => 'sapir ',
                'answer' => 'D',
            ],
			 // --- No 65  ------
            [
                'question' => 'Bani, Caca, Danu, Ena, dan Fira berdiri sejajar dalam satu deret dari kiri ke kanan. Bani bertukar tempat dengan Ena, kemudian Ena bertukar tempat dengan Caca. Siapakah yang ada di samping kiri Caca?  ',
                'option_a' => 'kosong',
                'option_b' => 'Bani ',
                'option_c' => 'Danu ',
                'option_d' => 'Ena ',
                'option_e' => 'Fira ',
                'answer' => 'A',
            ],
			 // --- No 66  ------
            [
                'question' => 'Jarak antara rumah Andi ke kantor adalah setengah dari jarak rumah Yanti. Jarak dari rumah Yanti adalah 300m, sedangkan rumah Teo ke kantor adalah 155m. Urutan jarak rumah yang paling dekat hingga terjauh adalah... ',
                'option_a' => 'Teo - Yanti - Andi',
                'option_b' => 'Andi - Yanti - Teo ',
                'option_c' => 'Yanti - Teo - Andi ',
                'option_d' => 'Andi - Teo - Yanti ',
                'option_e' => 'Andi - Teo - Andi ',
                'answer' => 'D',

            ],
			 // --- No 67  ------
            [
                'question' => 'Berat 2 karung beras adalah 1 kuintal, sementara berat 1 karung terigu adalah setengah dari 2 karung beras, dan berat dari gula pasir adalah seperempat dari berat karung beras. Urutan barang yang paling ringan ke terberat adalah... ',
                'option_a' => 'gula - beras - terigu',
                'option_b' => 'beras - gula - terigu   ',
                'option_c' => 'gula - terigu - beras   ',
                'option_d' => 'terigu - gula - beras   ',
                'option_e' => 'terigu - beras - gula  ',
                'answer' => 'A',
            ],
			 // --- No 68  ------
            [
                'question' => 'Umur Budi dua belas tahun dan setengah dari umur kakaknya Beni. Lisa empat tahun lebih muda dari Beni dan tiga tahun lebih tua dari Tutik. Berapakah umur Tutik? ',
                'option_a' => '16 tahun',
                'option_b' => '17 tahun ',
                'option_c' => '18 tahun ',
                'option_d' => '19 tahun ',
                'option_e' => '20 tahun ',
                'answer' => 'B',
            ],
			 // --- No 69  ------
            [
                'question' => 'siang  (anglam)      malam,    laut    (...... )   samudera ',
                'option_a' => 'lamera',
                'option_b' => 'autra ',
                'option_c' => 'autera ',
                'option_d' => 'lutra ',
                'option_e' => 'Samudra ',
                'answer' => '0',
            ],
			 // --- No 70  ------
            [
                'question' => 'bumi   (umiars)   mars,  gunung  (.....)   bukit ',
                'option_a' => 'gunit',
                'option_b' => 'ungkit ',
                'option_c' => 'gukit ',
                'option_d' => 'gunbuk ',
                'option_e' => 'bukung ',
                'answer' => 'B',
            ],
			 // --- No 71  ------
            [
                'question' => 'KEPOLISIAN ; ...  , K = 12 ',
                'option_a' => 'LFQYMJTJBO ',
                'option_b' => 'LFQPYJTYBO ',
                'option_c' => 'LFQPMJTJBO ',
                'option_d' => 'LFQPMYTJBO ',
                'option_e' => 'LFQPMJYJBO ',
                'answer' => 'C',
            ],
			 // --- No 72  ------
            [
                'question' => 'BHAYANGKARA ; ...,  B = 8 ',
                'option_a' => 'HNGEGTMGYHK',
                'option_b' => 'HNGEGTMKISL ',
                'option_c' => 'HNGEGTMQGXG ',
                'option_d' => 'HNGEGTMLSJH  ',
                'option_e' => 'HNGEGTMKAIL ',
                'answer' => 'C',
            ],
			 // --- No 73  ------
            [
                'question' => 'PATROLI = … ',
                'option_a' => 'SDWUING',
                'option_b' => 'SDWUING ',
                'option_c' => 'SDWUROL ',
                'option_d' => 'SDWUING ',
                'option_e' => 'SDWULNG ',
                'answer' => 'C',
            ],
			 // --- No 74  ------
            [
                'question' => 'NEGARA ; ..., N = 10 ',
                'option_a' => 'JACWNW ',
                'option_b' => 'JACKAK ',
                'option_c' => 'JACXOQ ',
                'option_d' => 'JACLKL ',
                'option_e' => 'JACHJH ',
                'answer' => 'A',
            ],
			 // --- No 75  ------
            [
                'question' => 'NEGARA = QHJDUD, ..... = GARUDA     ',
                'option_a' => 'DXORAX',
                'option_b' => 'DXOBYX ',
                'option_c' => 'DXOYHX ',
                'option_d' => 'DXOJHX ',
                'option_e' => 'DXOBGX ',
                'answer' => 'A',
            ],
			 // --- No 76  ------
            [
                'question' => 'NEGARA = OFHBSB,  BANGSA = ...  ',
                'option_a' => 'CBOHTT',
                'option_b' => 'CBOHTB ',
                'option_c' => 'CBOHST ',
                'option_d' => 'CBOTHT ',
                'option_e' => 'CBOHBT ',
                'answer' => 'B',
            ],
			 // --- No 77  ------
            [
                'question' => 'PATRIOT    = XIBZQWB,  ....= SETIA  ',
                'option_a' => 'KWGVY',
                'option_b' => 'KWLAS ',
                'option_c' => 'KWCYV ',
                'option_d' => 'KWVGY ',
                'option_e' => 'KWCVY ',
                'answer' => 'B',
            ],
			 // --- No 78  ------
            [
                'question' => 'POLISI = … ',
                'option_a' => 'QPMJTJ',
                'option_b' => 'QPMLVN ',
                'option_c' => 'QPMKLM ',
                'option_d' => 'QPMKUN ',
                'option_e' => 'QPMLUM ',
                'answer' => 'A',
            ],
			 // --- No 79  ------
            [
                'question' => 'Jika “KACA” 16, sementara “GELAS” 44, maka “BOTOL” ... ?  ',
                'option_a' => '42',
                'option_b' => '37 ',
                'option_c' => '64 ',
                'option_d' => '55 ',
                'option_e' => '58 ',
                'answer' => 'C',
            ],
			 // --- No 80  ------
            [
                'question' => 'BUKTI = … ',
                'option_a' => 'GZPYN',
                'option_b' => 'GZPTJ ',
                'option_c' => 'GZPTH ',
                'option_d' => 'GZPTK ',
                'option_e' => 'GZPTI ',
                'answer' => 'A',
            ],
			 // --- No 81  ------
            [
               'question' => 'Jika “SAPI” 45, sementara “KAMBING” 57, maka “KERBAU” ... ? ',
                'option_a' => '70',
                'option_b' => '58 ',
                'option_c' => '55 ',
                'option_d' => '50 ',
                'option_e' => '45 ',
                'answer' => 'B',
            ],
			 // --- No 82  ------
            [
              'question' => 'Jika “BOLA” 30, sementara “SEPAK” 52, maka “FUTSAL” ... ? ',
                'option_a' => '75',
                'option_b' => '65 ',
                'option_c' => '70 ',
                'option_d' => '60 ',
                'option_e' => '79 ',
                'answer' => 'E',
            ],
			 // --- No 83  ------
            [
               'question' => 'Jika “TANAH” 44, sementara “AIR” 28, maka “PASIR” ... ? ',
                'option_a' => '54',
                'option_b' => '63 ',
                'option_c' => '36 ',
                'option_d' => '42 ',
                'option_e' => '44 ',
                'answer' => 'B',
            ],
			 // --- No 84  ------
            [
                'question' => 'Manakah yang tidak termasuk dalam kelompok berikut? ',
                'option_a' => 'Najwa Shihab',
                'option_b' => 'Desi Anwar ',
                'option_c' => 'Andy F. Noya ',
                'option_d' => 'Dian Sastrowardoyo ',
                'option_e' => 'Rosiana Silalahi ',
                'answer' => 'D',
            ],
			 // --- No 85  ------
            [
                'question' => 'Manakah yang tidak sekelompok? ',
                'option_a' => 'Cristiano Ronaldo',
                'option_b' => 'Lionel Messi ',
                'option_c' => 'Roger Federer ',
                'option_d' => 'Neymar ',
                'option_e' => 'Kylian Mbappé ',
                'answer' => 'C',
            ],
			 // --- No 86  ------
            [
                'question' => 'Manakah yang berbeda dari yang lain? ',
                'option_a' => 'word',
                'option_b' => 'excel ',
                'option_c' => 'powerpoint ',
                'option_d' => 'google chrome ',
                'option_e' => 'oneNote ',
                'answer' => 'D',
            ],
			 // --- No 87  ------
            [
                'question' => 'Manakah yang berbeda dari yang lain? ',
                'option_a' => 'burung unta',
                'option_b' => 'paus ',
                'option_c' => 'gajah ',
                'option_d' => 'harimau ',
                'option_e' => 'kelelawar ',
                'answer' => 'A',
            ],
			 // --- No 88  ------
            [
                'question' => 'Tentukan pencerminan horizontal gambar dibawah ini! ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 89  ------
            [
               'question' => ' Tentukan pencerminan vertikal gambar dibawah ini!',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 90  ------
            [
                'question' => 'Tentukan perbedaan gambar berikut! ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 91  ------
            [
                'question' => 'Tentukan perbedaan gambar berikut! ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 92  ------
            [
               'question' => ' Tentukan lanjutkan gambar berikut!',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 93  ------
            [
               'question' => 'Tentukan lanjutkan gambar berikut!',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 94  ------
            [
               'question' => 'Jumlah segitiga dalam gambar adalah ... ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 95  ------
            [
               'question' => 'Jumlah segitiga dalam gambar adalah ... ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 96  ------
            [
                'question' => 'Tentukan jumlah kubus berikut!  ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 97  ------
            [
               'question' => 'Tentukan jumlah kubus berikut!  ',
                'option_a' => '.',
                'option_b' => ' .',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 98  ------
            [
                'question' => 'Tentukanlah bangun dari jaring-jaring gambar berikut! ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 99  ------
            [
                'question' => 'Tentukanlah bangun dari jaring-jaring gambar berikut! ',
                'option_a' => '.',
                'option_b' => '. ',
                'option_c' => '. ',
                'option_d' => ' .',
                'option_e' => '. ',
                'answer' => '0',
            ],
			 // --- No 100  ------
            [
                'question' => 'Perhatikan gambar berikut!  ',
                'option_a' => '.',
                'option_b' => ' .',
                'option_c' => '. ',
                'option_d' => '. ',
                'option_e' => '. ',
                'answer' => '0',
            ]






                    ]);
                    break;
            }
        }

        // Tambahkan exam_id dan timestamp ke semua soal
        foreach ($questions as &$q) {
            $q['exam_id'] = 3;       // ✅ tambahkan exam_id
            $q['created_at'] = $now;
            $q['updated_at'] = $now;
        }

        // Masukkan semua data ke tabel 'questions'
        DB::table('questions')->insert($questions);
    }
}
