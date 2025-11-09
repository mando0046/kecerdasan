<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_reset_requests', function (Blueprint $table) {
            $table->id();

            // Relasi ke user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Alasan dan status
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Waktu permintaan
            $table->timestamp('requested_at')->nullable();

            // Timestamps otomatis created_at & updated_at
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_reset_requests');
    }
};
