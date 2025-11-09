<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::table('exam_attempts', function (Blueprint $table) {
        // Lepas foreign key constraint dulu (kalau ada)
        if (Schema::hasColumn('exam_attempts', 'question_id')) {
            try {
                $table->dropForeign(['question_id']);
            } catch (\Exception $e) {
                // abaikan kalau constraint tidak ada
            }

            // Baru hapus kolomnya
            $table->dropColumn('question_id');
        }

        // Tambahkan kolom baru jika belum ada
        if (!Schema::hasColumn('exam_attempts', 'exam_id')) {
            $table->unsignedBigInteger('exam_id')->nullable()->after('user_id');
        }

        if (!Schema::hasColumn('exam_attempts', 'total_questions')) {
            $table->integer('total_questions')->default(0)->after('exam_id');
        }

        if (!Schema::hasColumn('exam_attempts', 'correct_answers')) {
            $table->integer('correct_answers')->default(0)->after('total_questions');
        }

        if (!Schema::hasColumn('exam_attempts', 'wrong_answers')) {
            $table->integer('wrong_answers')->default(0)->after('correct_answers');
        }

        if (!Schema::hasColumn('exam_attempts', 'score')) {
            $table->decimal('score', 5, 2)->default(0)->after('wrong_answers');
        }

        if (!Schema::hasColumn('exam_attempts', 'started_at')) {
            $table->timestamp('started_at')->nullable()->after('score');
        }

        if (!Schema::hasColumn('exam_attempts', 'finished_at')) {
            $table->timestamp('finished_at')->nullable()->after('started_at');
        }
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_attempts', function (Blueprint $table) {
            //
        });
    }
};
