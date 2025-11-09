<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PribadiSeeder extends Seeder
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
            3 => ['name' => 'Simulasi Tes Kepribadian', 'total' => 100],
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
                'question' => 'Setelah mempersiapkan presentasi acara Hari Kartini selama berhari-hari, Bripda Laila diminta memaparkannya di depan komandan. Namun, saat sedang menjelaskan poin penting, laptop yang digunakan tiba-tiba error dan tidak bisa menampilkan file presentasinya. Beberapa anggota mulai terlihat kecewa dan mengernyitkan dahi. Bripda Laila merasa gugup dan mulai kehilangan arah pembicaraan. Apa yang seharusnya dilakukan Bripda Laila? ',
                'option_a' => 'Menjelaskan situasi dengan tenang dan melanjutkan presentasi sebisa mungkin tanpa visual',
                'option_b' => 'Meminta waktu untuk memperbaiki file dan menghentikan presentasi sementara ',
                'option_c' => 'Mengalihkan pembahasan ke topik yang lebih ringan agar suasana cair ',
                'option_d' => 'Menunjukkan sikap frustasi dan meminta presentasi dijadwal ulang ',
                'option_e' => 'Langsung meminta maaf dan menyerahkan sesi kepada rekan kerja ',
                'answer' => 'A',
            ],
            // --- No 2  ------
            [
                'question' => 'Rizky adalah anggota baru di kepolisian. Dalam rapat bulanan, Rizky secara tidak sengaja menyebutkan data yang belum terverifikasi. Akibatnya, tim  mendapatkan teguran dari Atasan. Meski Rizky tidak sengaja, sebagian rekan mulai mengkritiknya secara terang-terangan di grup chat internal. Bagaimana sikap Rizky seharusnya?',
                'option_a' => 'Menjelaskan bahwa kesalahan adalah bagian dari proses belajar dan berkomitmen untuk Lebih hati-hati ',
                'option_b' => 'Menyalahkan rekan yang seharusnya memverifikasi data tersebut ',
                'option_c' => 'Menonaktifkan grup chat karena merasa disudutkan ',
                'option_d' => 'Meminta atasan memberikan perlindungan dari serangan rekan kerja ',
                'option_e' => 'Menghindari rapat-rapat selanjutnya karena malu ',
                'answer' => 'A',
            ],
            // --- No 3  ------
            [
                'question' => 'Bripka Dewi baru saja pindah ke mabes dan ditugaskan memimpin acara besar. Di minggu pertamanya, terjadi miskomunikasi dengan vendor yang menyebabkan keterlambatan pengiriman perlengkapan acara. Atasan langsungnya kecewa dan mempertanyakan kapabilitas Bripka Dewi sebagai pimpinan acara, padahal Bripka Dewi belum sepenuhnya memahami sistem kerja baru. Bagaimana sikap Bripka Dewi seharusnya? ',
                'option_a' => 'Mengundurkan diri dari proyek karena merasa tidak cocok ',
                'option_b' => 'Menyanggah semua tuduhan karena merasa tidak bersalah ',
                'option_c' => 'Menghubungi vendor dan menyalahkan mereka di depan atasan ',
                'option_d' => 'Membiarkan situasi berjalan dan berharap tidak dibahas lagi ',
                'option_e' => 'Mengakui kesalahan, menjelaskan kendala yang dihadapi, dan menyusun rencana perbaikan ',
                'answer' => 'E',
            ],
            // --- No 4  ------
            [
                'question' => 'Bripda Fajar bekerja di bagian layanan. Suatu hari ia menghadapi seseorang yang sangat marah karena SIMnya belum selesai di proses. Padahal, Bripda Fajar bukan orang yang bertanggung jawab langsung dalam kasus tersebut. Orang tersebut menyalahkan Bripda Fajar dan mengancam akan menyebarkan keluhan di media sosial. Bagaimana sikap Bripda Fajar seharusnya?',
                'option_a' => 'Memutus sambungan komunikasi dan melaporkan ke atasan ',
                'option_b' => 'Menjelaskan bahwa bukan dirinya yang bertanggung jawab dan menyuruh pelanggan mencari orang lain  ',
                'option_c' => 'Menanggapi keluhan dengan cuek karena merasa tidak bersalah  ',
                'option_d' => 'Menjawab dengan nada tinggi agar pelanggan tidak meremehkan  ',
                'option_e' => 'Mendengarkan keluhan pelanggan dan meminta maaf atas ketidaknyamanan sambil mencari solusi  ',
                'answer' => 'E',
            ],
            // --- No 5  ------
            [
                'question' => 'Briptu Tania sedang mengerjakan laporan audit akhir tahun yang sangat penting. Namun di tengah penyusunan, rekan kerja di sebelahnya terus-menerus berbicara dengan suara keras dan bercanda, mengganggu konsentrasi. Ketika Briptu Tania meminta tolong untuk sedikit tenang, rekannya malah menanggapinya dengan bercanda dan tidak menghentikan perilakunya. Bagaimana sikap Briptu Tania seharusnya? ',
                'option_a' => 'Membalas candaan dengan keras agar rekan kerja merasa terganggu juga  ',
                'option_b' => 'Menjauh sejenak dan mencari tempat lebih tenang agar bisa menyelesaikan pekerjaannya ',
                'option_c' => 'Melaporkan langsung ke atasan tanpa memperingatkan terlebih dahulu  ',
                'option_d' => 'Menyela aktivitas rekan dengan emosi ',
                'option_e' => 'Meminta bantuan rekan lain agar ikut menegur si pembuat gaduh ',
                'answer' => 'B',
            ],
            // --- No 6  ------
            [
                'question' => 'Saya menerima setiap kritikan dari orang lain demi kebaikan saya.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 7  ------
            [
                'question' => 'Saya sering merasa gagal dengan apa yang telah saya capai',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 8  ------
            [
                'question' => 'Ketika terjadi masalah saya akan berusaha menyelesaikannya dengan maksimal.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 9  ------
            [
                'question' => 'Sering kali saya merasa bingung ketika menghadapi masalah.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 10  ------
            [
                'question' => 'Ketika berada di lingkungan yang baru, saya akan memberanikan diri untuk menyapa orang disamping saya.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ], // --- No 11  ------
            [
                'question' => 'Tidak seperti teman-teman sebaya, saya tidak berani untuk menyapa orang yang baru beberapa kali saya temui.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 12  ------
            [
                'question' => 'Ketika saya telah memutuskan sesuatu, saya akan berusaha untuk menggapainya dengan segala resikonya.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 13  ------
            [
                'question' => 'Saya tidak cukup berani untuk mengambil keputusan sendiri, saya selalu membutuhkan bantuan orang lain.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 14  ------
            [
                'question' => 'Masalah yang telah saya hadapi membuat saya semakin memiliki banyak pengalaman.',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 15  ------
            [
                'question' => 'Begitu banyaknya masalah yang terjadi, menjadikan saya mudah untuk merasa putus asa',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 16  ------
            [
                'question' => 'Saya sering mendapatkan kritikan dari orang lain, tapi hal itu membuat saya menjadi lebih baik',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 17  ------
            [
                'question' => 'Kritikan yang saya terima membuat saya sulit untuk melakukan sesuatu karena terlalu memikirkan kritikan tersebut',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 18  ------
            [
                'question' => 'Saya tidak merasa sakit hati ketika pendapat saya tidak diterima di dalam kerja kelompok',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 19  ------
            [
                'question' => 'Di lingkungan saya sering mengadakan kegiatan gotong royong dan saya bersemangat mengikutinya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 20  ------
            [
                'question' => 'Saya merasa malas untuk mengikuti kegiatan gotong royong di lingkungan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 21  ------
            [
                'question' => 'Dalam kelompok saya selalu berusaha untuk terbuka kepada semua anggota',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 22  ------
            [
                'question' => 'Ketika dalam kerja kelompok, sering kali saya tidak mengikuti perkumpulan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 23  ------
            [
                'question' => 'Ketika saya di minta untuk ikut dalam pengambilan keputusan di kelompok saya akan berusaha kooperatif',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 24  ------
            [
                'question' => 'Sering kali teman kelompok saya tidak mau mengerjakan tugas kelompok',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 25  ------
            [
                'question' => 'Saya memiliki kemampuan mendengarkan dengan baik',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 26  ------
            [
                'question' => 'Saya lebih banyak bercerita dari pada mendengarkan keluh kesah teman',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 27  ------
            [
                'question' => 'Ketika dalam sebuah kelompok saya akan berpartisipasi dengan semua anggota',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 28  ------
            [
                'question' => 'Saya tidak terlalu suka berada di sebuah kelompok yang asing bagi saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 29  ------
            [
                'question' => 'Saya berusaha untuk memaksimalkan waktu saya dengan kelompok ketika rapat',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 30  ------
            [
                'question' => 'Saya tidak suka menolong orang yang baru saja saya kenal',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 31  ------
            [
                'question' => 'Ketika di beri tugas dalam kelompok, saya dan teman-teman dapat menyelesaikan dengan baik',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 32  ------
            [
                'question' => 'Ketika di sekolah ada peraturan telat sepuluh menit tidak boleh masuk kelas, maka saya akan berusaha keras agar tidak terlambat',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 33  ------
            [
                'question' => 'Saya sering sengaja berangkat terlambat ketika sekolah',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 34  ------
            [
                'question' => 'Saya akan memakai baju sekolah sesuai dengan peraturan yang telah ditetapkan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 35  ------
            [
                'question' => 'Baju seragam yang saya pakai sering saya keluarkan', 
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 36  ------
            [
                'question' => 'Saya akan datang tepat waktu ketika rapat organisasi',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'D',
            ],
			 // --- No 37  ------
            [
                'question' => 'Ketika di minta untuk mengerjakan tugas, saya sering meninggalnya tidur',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 38  ------
            [
                'question' => 'Saya tidak terpengaruh dengan ajakan teman membolos',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 39  ------
            [
                'question' => 'Saya sering di ajak keluar kelas untuk membolos, dan saya mengikutinya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 40  ------
            [
                'question' => 'Saya membiasakan diri untuk tepat waktu dalam segala kegiatan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 41  ------
            [
                'question' => 'Sering kali saya menunda-nunda pekerjaan yang akan saya lakukan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 42  ------
            [
                'question' => 'Saya mengerjakan tugas dengan senang dan bersemangat',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 43  ------
            [
                'question' => 'Saya tidak memiliki semangat dalam mengerjakan tugas dari sekolah',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 44  ------
            [
                'question' => 'Saya akan bertanya kepada guru ketika ada pelajaran yang tidak saya tidak pahami',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 45  ------
            [
                'question' => ' Saya antusias ketika menyelesaikan tugas yang sesuai dengan keinginan saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 46  ------
            [
                'question' => 'Saya sering merasa malas mengerjakan tugas yang saya anggap sulit',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 47  ------
            [
                'question' => 'Menurut saya tugas-tugas yang menantang memacu diri saya untuk lebih menunjukkan prestasi',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 48  ------
            [
                'question' => 'Jika ada tugas yang sulit akan saya lemparkan kepada teman saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 49  ------
            [
                'question' => ' Saya tetap belajar dengan penuh semangat meskipun mengalami banyak kesulitan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 50  ------
            [
                'question' => 'Ketika mengalami kesulitan dalam mengerjakan tugas, saya akan langsung berhenti untuk mengerjakan ',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Setuju',
                'option_e' => 'Sangat setuju',
                'answer' => 'A',
            ],
             // --- No 51  ------
            [
                'question' => 'Saya diberi tugas baru yang belum pernah saya kerjakan,  maka:',
                'option_a' => 'saya  merekomendasikan rekan yang pernah mengerjakan',
                'option_b' => 'Saya menerima tugas tersebut walaupun hasilnya kurang memuaskan ',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
            // --- No 52  ------
            [
                'question' => 'Dalam situasi darurat:',
                'option_a' => 'Saya akan segera mengambil tindakan',
                'option_b' => 'Tetap menunggu instruksi atasan',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
            // --- No 53  ------
            [
                'question' => 'Saat saya harus melaksanakan dua tugas dalam waktu yang bersamaan, maka:',
                'option_a' => 'Saya akan melaksanakan salah satunya',
                'option_b' => 'Berusaha melaksanakan dua-duanya',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
            // --- No 54  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Dalam mengikuti seleksi saya berharap keberuntungan',
                'option_b' => 'Saya mempersiapkan diri untuk mengikuti seleksi agar lulus terpilih',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
            // --- No 55  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya menunjukkan kinerja yang optimal walau tidak dinilai atasan',
                'option_b' => 'Saya akan menampilkan kinerja terbaik saat dinilai atasan',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
            // --- No 56  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya menjaga hubungan baik dengan rekan kerja',
                'option_b' => 'saya berusaha untuk berprestasi walaupun dianggap berlebihan',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 57  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya merasa tertantang bekerja dengan teman yang tidak dikenal sebelumnya',
                'option_b' => 'Saya merasa lebih mudah mengerjakan tugas saat bekerja dengan teman dikenal',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 58  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Sesekali saya perlu memastikan kebutuhan saya tidak bertentangan dengan keinginan orang lain',
                'option_b' => 'Menurut saya setiap orang berhak memeroleh apa yang menjadi kebutuhannya',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 59  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya memberikan selamat kepada rekan yang mendapat promosi jabatan',
                'option_b' => 'Saya ikut merayakan keberhasilan rekan yang mendapat promosi jabatan',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 60  ------
            [
                'question' => 'pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya akan memberikan masukan kepada rekan kerja yang sudah mengerti betul pekerjaannya',
                'option_b' => 'Saya percaya bahwa rekan kerja dapat menyelesaikan pekerjaan dengan baik.',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ], // --- No 61  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Ketika ada promosi jabatan, saya harus mendapatkan jabatan tersebut walaupun berpindah tugas',
                'option_b' => 'Saya tetap bertugas di kampung halaman walaupun tanpa mendapatkan jabatan',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 62  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Menjadi pimpinan adalah cita-cita yang harus diwujudkan',
                'option_b' => 'Bagi saya menjadi anggota yang baik dan dipercaya pimpinan sudah cukup',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 63  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Sulit rasanya bisa kembali meyakinkan orang yang sebelumnya tidak setuju dengan pendapat saya',
                'option_b' => 'Saya dapat meyakinkan orang tidak setuju terhadap pendapat saya sebelumnya',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 64  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Saya memilih profesi sebagai penulis',
                'option_b' => 'Saya memilih profesi sebagai pemandu wisata',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 65  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Menurut teman-teman, saya sering mendominasi pembicaraan saat berdiskusi',
                'option_b' => ' Menurut teman-teman, saya lebih cocok sebagai notulen dalam rapat',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 66  ------
            [
                'question' => 'Sebagai anggota polisi, ketika terjadi peristiwa pencurian di rumah tetangga, maka:..',
                'option_a' => 'Saya akan langsung mengambil tindakan mengamankan TKP ',
                'option_b' => 'Saya akan berkoordinasi dengan Ketua RT. ',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 67  ------
            [
                'question' => 'Saat terjadi kebakaran, maka saya:...',
                'option_a' => 'Menelpon petugas pemadam kebakaran atau pihak berwajib',
                'option_b' => ' Langsung memberi pertolongan',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 68  ------
            [
                'question' => 'Saat kesiangan berangkat ke kantor, maka saya:...',
                'option_a' => 'Saya memacu kendaraan dengan kecepatan sedang asalkan sampai dengan selamat',
                'option_b' => 'Saya memacu kendaraan dengan cepat agar tepat waktu sampai ke kantor',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 69  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Bantuan yang saya berikan terasa kurang maksimal karena saya dalam keadaan lelah ',
                'option_b' => 'Ketika lelah saya memilih beristirahat terlebih dahulu agar bantuan yang diberikan lebih maksimal ',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 70  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Ketika terjadi kecelakaan lalu lintas dan sudah banyak yang berkerumun, saya berpikir pasti ada orang yang menolong korban',
                'option_b' => ' Ketika terjadi kecelakaan lalu lintas, saya ikut berdesakan dikerumunan dan meminta beberapa orang mengangkat korban',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 71  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Saya kadang berbagi makanan dengan tetangga agar hubungan semakin akrab',
                'option_b' => 'Jika ada kesempatan, saya akan berbagi dengan orang yang belum saya kenal',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 72  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Ketika menghadapi suatu permasalahan, saya mengutamakan kenyamanan perasaan',
                'option_b' => 'Ketika menghadapi suatu permasalahan, saya mengutamakan pemecahan masalah',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 73  ------
            [
                'question' => 'Melihat teman sekampung saya dianiaya orang lain',
                'option_a' => 'Wajar bila saya spontan membelanya',
                'option_b' => 'Seharusnya saya bisa bersikap netral',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 74  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Saya merasa sedikit terganggu jika harus bekerja melebihi jam kerja',
                'option_b' => 'Saya menjadi terbiasa bekerja melebihi jam kerja',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 75  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Ketika ada rekan yang berhasil, mungkin ada hal yang bisa saya tiru',
                'option_b' => 'sMenurut saya, sukses tidak semestinya ditiru dari orang lain ',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 76  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => 'Dalam menghadapi orang baru, saya jarang ragu-ragu karena umumnya saran yang saya berikan selalu diterima dengan baik.  ',
                'option_b' => 'Saya terbiasa menimbang-nimbang bagaimana sebaiknya bersikap agar orang lain menerima saransaran saya. ',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 77  ------
            [
                'question' => 'Pilih jawaban yang paling tepat menurut anda',
                'option_a' => ' Saya tidak merasa ragu-ragu untuk menyampaikan maksud hati saya kepada orang lain.',
                'option_b' => 'Saya kadang-kadang tidak jadi menyampaikan maksud hati saya kepada orang lain karena khawatir orang lain tersebut merasa tidak enak.',
               'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 78  ------
            [
                'question' => 'Jika saya diminta untuk menyampaikan suatu informasi dalam forum yang emosional, saya akan:..',
                'option_a' => 'Mengemukakan apa adanya informasi yang saya peroleh meskipun ada yang menjadi sangat emosi.',
                'option_b' => 'Mempertimbangkan informasi apa yang dapat saya sampaikan apa adanya, dan tidak mengemukakan apa adanya hal-hal yang menyebabkan orang sangat emosi.',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'B',
            ],
			 // --- No 79  ------
            [
                'question' => 'Jika seorang kenalan baik akan berkunjung ke rumah saya pada beberapa hari mendatang tapi dia belum bisa memastikan kapan akan datang, maka tindakan saya:',
                'option_a' => 'Kapanpun dia datang, tidak masalah sekalipun mungkin saya sedang tidak ada di rumah',
                'option_b' => ' Saya akan mendesak dia untuk memberi kepastian karena saya merasa tidak enak jika ia datang saat saya tidak ada di rumah.',
                'option_c' => 0,
                'option_d' => 0,
                'option_e' => 0,
                'answer' => 'A',
            ],
			 // --- No 80  ------
            [
                'question' => 'Saya merasa cemas ketika di hadapkan dengan pengambilan keputusan untuk masa depan saya ',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 81  ------
            [
               'question' => 'Saya merasa malas untuk mengikuti organisasi yang ada di sekolah ',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 82  ------
            [
              'question' => 'Saya selalu berusaha untuk menjaga kesehatan tubuh saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 83  ------
            [
               'question' => 'Sulit bagi saya untuk melupakan kegagalan-kegagalan yang pernah saya alami',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 84  ------
            [
                'question' => 'Saya selalu membuat rencana-rencana kegiatan sesuai dengan kemampuan saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 85  ------
            [
                'question' => 'Saya sering memaksa diri saya untuk melakukan sesuatu yang sebenarnya diri saya tidak mampu',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 86  ------
            [
                'question' => 'Biasanya saya akan berfikir secara objektif dalam menghadapi suatu masalah',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 87  ------
            [
                'question' => 'Sering kali saya berpikiran negatif ketika ada masalah yang menimpa saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 88  ------
            [
                'question' => 'Ketika di dalam sebuah kelompok saya berusaha untuk lebih awal mengambil kesempatan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 89  ------
            [
               'question' => 'Saya akan menunggu orang lain terlebih dahulu untuk mengambil suatu tindakan',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 90  ------
            [
                'question' => 'Saya terbiasa menyelesaikan persoalan saya sendiri tanpa bantuan orang lain',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 91  ------
            [
                'question' => 'Sering kali saya meminta bantuan orang lain untuk menyelesaikan masalah saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 92  ------
            [
               'question' => 'Saya merasa, bahwa saya dapat memahami diri saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 93  ------
            [
               'question' => 'Terkadang saya ingin marah tanpa sebab',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 94  ------
            [
               'question' => 'Ketika saya berada di suatu tempat saya tidak merasa risih dengan penampilan saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 95  ------
            [
               'question' => 'Saya termasuk orang yang sulit untuk membantu teman yang telah menyakiti saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 96  ------
            [
                'question' => 'Ketika saya memiliki masalah, saya berusaha untuk tidak mengikut campurkan masalah saya ke dalam kelompok',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 97  ------
            [
               'question' => 'Ketika saya berada dalam sebuah kelompok, saya tidak pernah memperhatikan masalah teman kelompok saya',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 98  ------
            [
                'question' => 'Saya mampu membedakan masalah pribadi dan tugas',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
            ],
			 // --- No 99  ------
            [
                'question' => 'Saya tidak mampu berempati dengan apa yang dirasakan orang lain',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'A',
            ],
			 // --- No 100  ------
            [
                'question' => 'Apabila di beri tugas saya dapat membedakan tugas yang harus di kerjakan terlebih dahulu',
                'option_a' => 'Sangat tidak setuju',
                'option_b' => 'Tidak setuju',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'setuju',
                'option_e' => 'sangat setuju',
                'answer' => 'E',
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
