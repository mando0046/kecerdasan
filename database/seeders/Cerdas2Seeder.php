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
               'question' => 'Ekskavasi = ...',
                'option_a' => 'Penggalian ',
                'option_b' => 'Pemanggilan',
                'option_c' => 'Pertolongan',
                'option_d' => 'Pengangkutan',
                'option_e' => 'Perubahan',
                'answer' => 'A',
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
               'question' => 'Jika 5/15 = 2³/n maka nilai n adalah ...',
                'option_a' => '6',
                'option_b' => '12',
                'option_c' => '24',
                'option_d' => '36',
                'option_e' => '45',
                'answer' => 'C',
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
               'question' => 'Sekuler >< ...',
                'option_a' => 'sekunder',
                'option_b' => 'keagamaan',
                'option_c' => 'duniawi',
                'option_d' => 'hedonisme',
                'option_e' => 'kedua',
                'answer' => 'B',
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
               'question' => 'Sebuah mobil bergerak dengan kecepatan rata-rata 68 km/jam dapat menempuh jarak dari
kota J sampai kota K dalam waktu 6 jam. Jika jarak kedua kota ingin ditempuh selama 8 jam bepakah kecepatan rata-rata mobil tersebut … ?
',
                'option_a' => '39 km/jam',
                'option_b' => '37 km/jam',
                'option_c' => '41 km/jam',
                'option_d' => '31 km/jam   ',
                'option_e' => '51 Km/jam',
                'answer' => 'E',
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
               'question' => 'Barang pecah-belah adalah barang yang mudah pecah bila jatuh. Barang-barang yang tidak mudah pecah bila jatuh tidak lagi digolongkan dalam kategori pecah-belah. Gelas buatan PT.
Sudiro Indo tidak dapat pecah kalau jatuh. Maka kesimpulan yang tepat adalah ...
',
                'option_a' => 'Gelas produksi PT. Sudiro Indo tidak termasuk barang pecah belah.',
                'option_b' => 'Gelas produksi PT. Sudiro Indo tidak dapat pecah
',
                'option_c' => 'Gelas produksi PT. Sudiro Indo termasuk barang pecah-belah',
                'option_d' => 'Gelas produksi PT. Sudiro Indo mudah pecah',
                'option_e' => 'Gelas produksi PT. Sudiro Indo tidak mungkin pecah',
                'answer' => 'A',
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
              'question' => 'Pamungkas menjual softcase dengan laba 25% seharga Rp.100.000,00. Berapakah harga
belinya … ?',
                'option_a' => 'Rp.100.000,00',
                'option_b' => 'Rp.80.000,00',
                 'option_c' => 'Rp.75.000,00',
                'option_d' => 'Rp.70.000,00',
                'option_e' => 'Rp.60.000,00',
                 'answer' => 'B',
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
              'question' => 'Gunung : Bukit = ... : ...',
                'option_a' => 'Laut : Samudra',
                'option_b' => 'Pulau : Benua',
                'option_c' => 'Danau : Rawa',
                'option_d' => 'Gelombang : Ombak',
                'option_e' => 'Sungai : Selat',
                'answer' => 'D',
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
               'question' => ' sultan   (tanja)   raja 
                               bulan    (....)    matahari',  
                'option_a' => 'Sulja',
                'option_b' => 'tanri',
                'option_c' => 'lanri',
                'option_d' => 'bulja',
                'option_e' => 'bulri',
                'answer' => 'C',
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
               'question' => 'Uji coba mobil balap selama 30 detik mampu melintasi jarak 6 km. Berapa kecepatan mobil
balap tersebut … ? ',
                'option_a' => '680 km/jam',
                'option_b' => '700 km/jam',
                'option_c' => '710 km/jam',
                'option_d' => '720  km/jam',
                'option_e' => '730 km/jam',
                'answer' => 'D',
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
               'question' => 'Virtual = ...',
                'option_a' => 'nyata',
                'option_b' => 'maya',
                'option_c' => 'langsung',
                'option_d' => 'impian',
                'option_e' => 'hiponema',
                'answer' => 'A',
            ],
			 // --- No 22  ------
            [
               'question' => 'Harga 36 voucher data Rp.1.080.000. Harga 2,5 lusin voucher data tersebut adalah … ?',
                'option_a' => 'Rp. 1.000.000   ',
                'option_b' => 'Rp. 900.000',
                'option_c' => 'Rp. 850.000',
                'option_d' => 'Rp. 800.000',
                'option_e' => 'Rp. 750.000',
                'answer' => 'B',
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
               'question' => 'Terdapat 8 orang yang menyelesaikan pekerjaan dalam waktu 6 hari. Berapa orang yang harus
bekerja untuk menyelesaikan pekerjaan dalam 4 hari … ?
',
                'option_a' => '6 orang',
                'option_b' => '8 orang',
                'option_c' => '10 orang',
                'option_d' => '12 orang',
                'option_e' => '14 orang',
                'answer' => 'D',
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
               'question' => 'Semua bunga di taman sekolah berwarna ungu. Semua siswi suka bunga. Desi Listiani
membawa bunga merah. Kesimpulan yang tepat adalah ...
',
                'option_a' => 'Desi Listiani tidak suka bunga',
                'option_b' => 'Taman sekolah ada bunga merahnya',
                'option_c' => 'Siswi suka bunga merah',
                'option_d' => 'Siswi tidak suka bunga ungu',
                'option_e' => 'Bunga yang dibawa Desi Listiani bukan dari taman sekolah',
                'answer' => 'E',
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
               'question' => 'Harga beli 16 bibit tanaman hias Rp. 400.000,00. Semua bibit tanaman hias sudah terjual
habis. Setelah dijual penjual mendapatkan untung Rp. 64.000,00. Harga jual sebuah bibit
tanaman hias adalah ... ?',
                'option_a' => 'Rp. 24.000,00',
                'option_b' => 'Rp. 25.000,00',
                'option_c' => 'Rp. 27.000,00',
                'option_d' => 'Rp. 28.000,00',
                'option_e' => 'Rp. 29.000,00',
                'answer' => 'E',
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
               'question' => 'Geologi : Ilmu = ... : ...',
                'option_a' => 'Obat :Rumah Sakit',
                'option_b' => 'Duren :Pohon',
                'option_c' => 'Kuliah :Kampus',
                'option_d' => 'Belajar : Buku',
                'option_e' => 'Rumah : Indah',
                'answer' => 'B',
            ],
			 // --- No 31  ------
            [
               'question' => 'bahaya  ( hara ) merana 
                              malaka  ( ……… )  kemana ',
                'option_a' => 'lati',
                'option_b' => 'lama',
                'option_c' => 'lara',
                'option_d' => 'laha',
                'option_e' => 'laka',
                'answer' => 'B',
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
               'question' => 'Pailit = ...',
                'option_a' => 'kedil hati',
                'option_b' => 'bangkrut',
                'option_c' => 'keuntungan',
                'option_d' => 'senang',
                'option_e' => 'susah',
                'answer' => 'B',
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
               'question' => 'Untuk membuat 10 pizza membutuhkan 8 kg tepung terigu. Suatu toko ingin membuat 15
pizza, berapa banyak tepung yang diperlukan?',
                'option_a' => '9 Kg',
                'option_b' => '10 Kg',
                'option_c' => '11 Kg',
                'option_d' => '12 Kg',
                'option_e' => '14 Kg',
                'answer' => 'D',
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
               'question' => 'Dera >< …',
                'option_a' => 'pedih',
                'option_b' => 'luka',
                'option_c' => 'hukum',
                'option_d' => 'tekan',
                'option_e' => 'tangkis',
                'answer' => 'E',
            ],
			 // --- No 38  ------
            [
               'question' => 'Jika Adib lebih tua daripada Bachtiar, Wahyu, dan Marchel, maka pernyataan
berikut yang harus benar adalah …',
                'option_a' => 'Kevin lebih tua daripada Adib.',
                'option_b' => 'Bachtiar lebih tua daripada Wahyu.',
                'option_c' => 'Bachtiar lebih tua daripada Ombun.',
                'option_d' => 'Adib lebih tua daripada Ombun.',
                'option_e' => 'Adib lebih tua daripada Ombun.',
                'answer' => 'D', 
            ],
			 // --- No 39  ------
            [
               'question' => 'OPTIMIS ;... P=15',

                'option_a' => 'OSLHRSH',
                'option_b' => 'NOSLHLS',
                'option_c' => 'OLHRHSL',
                'option_d' => 'NOSHLHR',
                'option_e' => 'NLSHRHL ',
                'answer' => 'D',
            ],
			 // --- No 40  ------
            [
               'question' => 'BELGIA ; … B=6',
                'option_a' => ' IPKMFE ',
                'option_b' => 'FIPKME ',
                'option_c' => ' IKMPKE',
                'option_d' => 'FIKMEP',
                'option_e' => 'FPEMKK',
                'answer' => 'B',
            ],
			 // --- No 41  ------
            [
               'question' => 'PELAJAR ; …  J=14',
                'option_a' => 'TIPENEV',
                'option_b' => ' EPVNEV',
                'option_c' => 'TIEPNPV',
                'option_d' => 'TENVEP',
                'option_e' => 'ENVEPE',
                'answer' => 'A',
            ],
			 // --- No 42  ------
            [
               'question' => 'PANCASILA = QBOEBTJMB.     ... = IDEOLOGI ',
                'option_a' => 'HCDNKNFH',
                'option_b' => 'HCDNKNGJ',
                'option_c' => 'HCDNKNFK',
                'option_d' => 'HCDNKNFJ',
                'option_e' => 'HCDNKNGK',
                'answer' => 'A',
            ],
			 // --- No 43  ------
            [
               'question' => 'ADIL       = KNSV
HUKUM = ...',
                'option_a' => 'RETEW',
                'option_b' => 'RELEW',
                'option_c' => 'REFEW',
                'option_d' => 'REAEW',
                'option_e' => 'REUEW',
                'answer' => 'B',
            ],
			 // --- No 44  ------
            [
               'question' => 'DENSUS = …',
                'option_a' => 'HIRWYW',
                'option_b' => 'HIRSMA',
                'option_c' => 'HIRSME',
                'option_d' => 'HIRISE',
                 'option_e' => 'HIRISM',
                'answer' => 'A',
            ],
			 // --- No 45  ------
            [
               'question' => 'NARKOBA',
                'option_a' => 'OBSBZBD',
                'option_b' => 'OBSCBBZ',
                'option_c' => 'OBSDPCD',
                'option_d' => 'OBSILPD',
                'option_e' => 'OBSLPCB',
                'answer' => 'E',
            ],
			 // --- No 46  ------
            [
               'question' => 'Jika “TIKUS” 80, sementara “ULAR” 52, maka “BURUNG” ... ?',
                'option_a' => '98',
                'option_b' => '83',
                'option_c' => '77   ',
                'option_d' => '92',
                'option_e' => '100',
                'answer' => 'B',
            ],
			 // --- No 47  ------
            [
               'question' => 'Jika “KERETA” 60, sementara “BIS” 30, maka “MOTOR” ... ?',
                'option_a' => '98',
                'option_b' => '75',
                'option_c' => '77   ',
                'option_d' => '81',
                'option_e' => '86',
                'answer' => 'D',
            ],
			 // --- No 48  ------
            [
               'question' => 'Jika “MEJA” 29, sementara “KURSI” 78, maka “SOFA” ... ?',

                'option_a' => '40',
                'option_b' => '41',
                'option_c' => '50',
                'option_d' => '51',
                'option_e' => '60',
                'answer' => 'B',
            ],
			 // --- No 49  ------
            [
               'question' => 'Temukan jawaban dari soal berikut ini!',
                'option_a' => 'Ridwan Kamil',
                'option_b' => ' Tantowi Ahmad',
                'option_c' => ' Rio Haryanto',
                'option_d' => 'Evan Dimas',
                'option_e' => 'Boy Arnez',
                'answer' => 'A',
            ],
			 // --- No 50  ------
            [
               'question' => 'temukan jawaban dari soal berikut ini!',
               'option_a' => 'Biola',
                'option_b' => 'Ukulele',
                'option_c' => 'harpa',
                'option_d' => 'harmonika',
                'option_e' => 'kanvas',
                'answer' => 'E',
            ],
             // --- No 51  ------
            [
              'question' => 'temukan jawaban dari soal berikut ini!',     
               'option_a' => 'reog',
                'option_b' => 'taekwondo',
                'option_c' => 'futsal',
                'option_d' => 'sepak takraw',
                'option_e' => 'bulutangkis',
                'answer' => 'A',
            ],
            // --- No 52  ------
            [
               'question' => 'temukan jawaban dari soal berikut ini!',
                'option_a' => 'kerinci',
                'option_b' => 'bromo',
                'option_c' => 'slamet',
                'option_d' => 'kapuas',
                'option_e' => 'merbabu',
                'answer' => 'D',
            ],
            // --- No 53  ------
            [
               'question' => 'temukan jawaban dari soal berikut ini!',
                'option_a' => 'hakim',
                'option_b' => 'provokator',
                'option_c' => 'guru',
                'option_d' => 'dokter',
                'option_e' => 'aktor',
                'answer' => 'B',
            ],
            // --- No 54  ------
            [
               'question' => 'Paman pergi ke kota mengendarai sepeda motor. Ia berangkat dari rumah
pukul 07.45 dan sampai di kota pukul 08.05. Jika ia melaju dengan kecepatan
rata-rata 60 km/jam, jarak dari rumah paman ke kota adalah … km.    ',

                'option_a' => '20',
                'option_b' => '40'  , 
                'option_c' => '45',
                'option_d' => '50',
                'option_e' => '60'  ,
                'answer' => 'A',
            ],
            // --- No 55  ------
            [
               'question' => 'Panjang keliling lapangan 500 m. Danu berlari dengan kecepatan 20m/menit. Danu dapat mengelilingi lapangan dalam waktu ... menit.',

                'option_a' => '20',
                'option_b' => '25',
                'option_c' => '30',
                'option_d' => '35',
                'option_e' => '40',
                'answer' => 'B',
            ],
            // --- No 56  ------
            [
               'question' => 'Diketahui skala sebuah ukuran gambar adalah 1 : 400.000. Jika ukuran pada
peta 8 cm, maka ukuran sebenarnya adalah ...',
                'option_a' => '3.2 Km',
                'option_b' => '32 Km',
                'option_c' => '320 Km',
                'option_d' => '50 Km',
                'option_e' => '55 Km',
                'answer' => 'B',
            ],
			 // --- No 57  ------
            [
               'question' => 'Skala 1 : 2.750.000. Jarak pada peta dari kota A - B adalah 20 cm. Panjang
jarak kota A - B sebenarnya adalah ....',
                 'option_a' => '550 Km' , 
                'option_a' => '600 Km',
                'option_b' => '700 Km',
                'option_c' => '55 km',
                'option_d' => '750 Km',
                'option_e' => '650 Km',
                'answer' => 'A',
            ],
			 // --- No 58  ------
            [
               'question' => '120 (18) – 45 (120) + 120 (32) = …',
                'option_a' => '1200',
                'option_b' => '960  ',
                'option_c' => '1320',
                'option_d' => '720',
                'option_e' => '600',
                'answer' => 'E',
            ],
			 // --- No 59  ------
            [
               'question' => '1500%   = ... ? ',
                'option_a' => '30/2',
                'option_b' => '4/3',
                'option_c' => '60/5',
                'option_d' => '8/7',
                'option_e' => '50/4',
                'answer' => 'A',
            ],
			 // --- No 60  ------
            [
               'question' => 'Umur nenek saat ini 60 tahun dan umur kakek 8 windu 9 tahun. Selisih umur
mereka adalah ...tahun ',
                'option_a' => '15 tahun',
                'option_b' => '1 windu 5 tahun',
                'option_c' => '14 tahun',
                'option_d' => '2 windu 6 tahun',
                'option_e' => '2 windu 1 bulan',
                'answer' => 'B',
            ], // --- No 61  ------
            [
               'question' => '30 x 15 : (105 – 60) =….',

                'option_a' => '10',
                'option_b' => '15',
                'option_c' => '20',
                'option_d' => '25',
                'option_e' => '30',
                'answer' => 'A',
            ],
			 // --- No 62  ------
            [
               'question' => '2 lusin + 3 gross - 2 kodi =... buah',
                'option_a' => '170 buah',
                'option_b' => '200 buah',
                'option_c' => '410 buah',
                'option_d' => '416 buah',
                'option_e' => '450 buah',
                'answer' => 'D',
            ],
			 // --- No 63  ------
            [
               'question' => 'Seorang polisi dapat menyelesaikan laporan dalam 2 jam. Berapa laporan
yang dapat diselesaikan dalam 10 jam … ?', 

                'option_a' => '3 laporan',
                'option_b' => '4 laporan',
                'option_c' => '5 laporan',
                'option_d' => '6 laporan',
                'option_e' => '7 laporan',
                'answer' => 'C',
            ],
			 // --- No 64  ------
            [
               'question' => 'Seorang petugas dapat memeriksa 5 dokumen dalam 10 menit. Berapa
dokumen yang dapat diperiksa dalam 1,5 jam … ?',
                'option_a' => '40 dokumen',
                'option_b' => '42 dokumen',
                'option_c' => '44 dokumen',
                'option_d' => '45 dokumen',
                'option_e' => '50 dokumen',
                'answer' => 'D',
            ],
			 // --- No 65  ------
            [
               'question' => 'Jika 4 petugas dapat menyelesaikan suatu tugas dalam 6 hari, berapa hari
yang diperlukan oleh 12 petugas untuk menyelesaikan tugas yang sama … ?',

                'option_a' => '1 hari',
                'option_b' => '2 hari',
                'option_c' => '3 hari',
                'option_d' => '4 hari',
                'option_e' => '5 hari',
                'answer' => 'B',    
            ],
			 // --- No 66  ------
            [
               'question' => 'Jika 4 petugas keamanan dapat menjaga sebuah gedung selama 8 jam,
berapa jam 6 petugas keamanan dapat menjaga gedung yang sama … ?',

                'option_a' => '10 jam',
                'option_b' => '11 jam',
                'option_c' => '12 jam',
                'option_d' => '13 jam',
                'option_e' => '14 jam',
                'answer' => 'C',
            ],
			 // --- No 67  ------
            [
               'question' => 'Jika 18 orang dapat menyelesaikan sebuah pekerjaan dalam 10 hari dengan
bekerja 8 jam per hari, berapa hari yang diperlukan jika 24 orang bekerja 6 jam
per hari … ?',

                'option_a' => '8 hari',
                'option_b' => '9 hari',
                'option_c' => '10 hari',
                'option_d' => '11 hari',
                'option_e' => '12 hari',
                'answer' => 'C',
            ],
			 // --- No 68  ------
            [
               'question' => ' 11, 13, 14, 17, …, 23, 26, 31 ',

                'option_a' => '18',
                'option_b' => '19',
                'option_c' => '20',
                'option_d' => '21',
                'option_e' => '22',
                'answer' => 'B ',
            ],
			 // --- No 69  ------
            [
               'question' => ' …, 4, 22, 9, 33, 14, 44, 19 ',
                'option_a' => '2',
                'option_b' => '8',
                'option_c' => '11',
                'option_d' => '44',
                'option_e' => '50',
                'answer' => 'C',
            ],
			 // --- No 70  ------
            [
               'question' => '25, 28, 33, 36, 41, …, … ',
                'option_a' => '43 dan 48',
                'option_b' => '44 dan 49',
                'option_c' => '45 dan 50',
                'option_d' => '46 dan 51',
                'option_e' => '47 dan 52',
                'answer' => 'B',
            ],
			 // --- No 71  ------
            [
               'question' => '2048, 1024, 512, 256, 128, … ',
                'option_a' => '30',
                'option_b' => '60',
                'option_c' => '120',
                'option_d' => '32',
                'option_e' => '64',
                'answer' => 'E  ',
            ],
			 // --- No 72  ------
            [
               'question' => ' 1, 5, 10, 50, 100, …',
                'option_a' => '150',
                'option_b' => '200',
                'option_c' => '300',
                'option_d' => '400',
                'option_e' => '500',
                'answer' => 'E',
            ],
			 // --- No 73  ------
            [
               'question' => '3, 6, 5, 10, 9, …, ….',
                'option_a' => '17 dan 18',
                'option_b' => '18 dan 17',
                'option_c' => '18 dan 19',
                'option_d' => '19 dan 18',
                'option_e' => '19 dan 20',
                'answer' => 'B',
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
               'question' => 'M, O, K, M, I, …',
                'option_a' => 'K',
                'option_b' => 'L',
                'option_c' => 'M',
                'option_d' => 'N',
                'option_e' => 'P',
                'answer' => 'A',
            ],
			// --- No 76  ------
            [
               'question' => 'M, O, K, M, I, …',
                'option_a' => 'X dan Y',
                'option_b' => 'Q dan R',
                'option_c' => 'X dan Z',
                'option_d' => 'V dan Z',
                'option_e' => 'Q dan Y',
                'answer' => 'D',
            ],
            // --- No 77  ------
            [
               'question' => 'A, B, D, G, H, …, …',
                'option_a' => 'P dan W',
                'option_b' => 'P dan V',
                'option_c' => 'O dan U',
                'option_d' => 'O dan V',
                'option_e' => 'P dan U',
                'answer' => 'B',
            ],
            // --- No 78  ------
            [
               'question' => 'A, B, D, G, K, …, …   ',
                'option_a' => 'L dan M',
                'option_b' => 'M dan N',
                'option_c' => 'O dan V',
                'option_d' => 'P dan V',
                'option_e' => 'Q dan T  ',
                'answer' => 'D',
            ],
            // --- No 79  ------
            [
               'question' => 'Nilai rata-rata ulangan 35 siswa adalah 68. Jika 5 siswa mendapat nilai 80
dan sisanya mendapat nilai sama, berapakah nilai yang didapat oleh siswa
lainnya … ?',
                'option_a' => '65',
                'option_b' => '66',
                'option_c' => '67',
                'option_d' => '68',
                'option_e' => '69',
                'answer' => 'B',
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
               'question' => 'Sebuah mobil memerlukan bensin sebanyak 8 liter untuk perjalanan 56 km. Berapa liter bensin yang diperlukan untuk perjalanan 84 km … ?',
                'option_a' => '6 liter',
                'option_b' => '7 liter',
                'option_c' => '10.5 liter',
                'option_d' => '12 liter',
                'option_e' => '15 liter',
                'answer' => 'D',
            ],
            // --- No 96  ------
            [
               'question' => '15 mesin dapat mencapai target jika bekerja selama 30 hari. Setelah 6 hari bekerja, terdapat masalah sehingga seluruh mesin berhenti bekerja selama 4 hari. Berapa tambahan mesin yang diperlukan agar target tercapai …?',
                'option_a' => '1',
                'option_b' => '3',
                'option_c' => '6',
                'option_d' => '9',
                'option_e' => '12',
                'answer' => 'B',
            ],
            // --- No 97  ------
            [
               'question' => ' 8, 12, 10, 15, 12, 18, ... ',
                'option_a' => '18',
                'option_b' => '12',
                'option_c' => '14',
                'option_d' => '20',
                'option_e' => '16',
                'answer' => 'C',
            ],
            // --- No 98  ------
            [
               'question' => '... : Buku = Galeri : Lukisan',
                'option_a' => 'catatan',
                'option_b' => 'pengetahuan',
                'option_c' => 'rumah',
                'option_d' => 'perpustakaan',
                'option_e' => 'kamar',
                'answer' => 'D',
            ],
             // --- No 99  ------
            [
               'question' => 'Anomali >< ...',
                'option_a' => 'Normal',
                'option_b' => 'Aturan',
                'option_c' => 'Patuh',
                'option_d' => 'salah',
                'option_e' => 'takut',
                'answer' => 'A',
            ],
			// --- No 100  ------
            [
               'question' => 'Kolusi = ...',
                'option_a' => 'Perdebatan',
                'option_b' => 'Perseteruan',
                'option_c' => 'Kecenderungan',
                'option_d' => 'Persekongkolan',
                'option_e' => 'Penggelapan',
                'answer' => 'D',
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
