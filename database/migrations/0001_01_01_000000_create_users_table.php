<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * 🔹 USERS
         * Menyimpan akun admin, peserta, dan guest.
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin','operator' ,'guest', 'peserta'])->default('guest');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         * 🔹 EXAMS
         * Menyimpan data ujian.
         */
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration')->default(60); // menit
            $table->integer('total_questions')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        /**
         * 🔹 QUESTIONS
         * Menyimpan pertanyaan dan pilihan jawaban.
         */
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id')->nullable();

            // Soal dan gambar
            $table->text('question');
            $table->string('question_image')->nullable();

            // Pilihan jawaban dan gambar
            foreach (['a', 'b', 'c', 'd', 'e'] as $opt) {
                $table->string("option_{$opt}")->default('');
                $table->string("option_image_{$opt}")->nullable();
            }

            // Kunci jawaban
            $table->string('answer');
            $table->timestamps();

            // Foreign key ke exams
            $table->foreign('exam_id')
                  ->references('id')
                  ->on('exams')
                  ->onDelete('cascade');
        });

        /**
         * 🔹 ANSWERS
         * Menyimpan jawaban peserta terhadap soal.
         */
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->string('answer');
            $table->unsignedInteger('attempt_number')->default(1); // percobaan keberapa
            $table->boolean('is_correct')->default(false); // apakah benar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Urutan drop harus sesuai relasi agar tidak error
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('users');
    }
};
