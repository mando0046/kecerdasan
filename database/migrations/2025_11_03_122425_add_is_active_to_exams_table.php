<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan ke database.
     */
    public function up(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            // Tambahkan kolom is_active (default: false)
            if (!Schema::hasColumn('exams', 'is_active')) {
                $table->boolean('is_active')
                      ->default(false)
                      ->after('total_questions')
                      ->comment('Menandakan apakah ujian aktif atau tidak');
            }
        });
    }

    /**
     * Kembalikan perubahan.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            if (Schema::hasColumn('exams', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
};
