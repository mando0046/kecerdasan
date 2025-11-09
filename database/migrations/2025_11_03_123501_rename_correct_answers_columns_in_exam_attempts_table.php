<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('exam_attempts', function (Blueprint $table) {
            $table->renameColumn('correct_answers', 'correct_answer');
            $table->renameColumn('wrong_answers', 'wrong_answer');
        });
    }

    public function down(): void
    {
        Schema::table('exam_attempts', function (Blueprint $table) {
            $table->renameColumn('correct_answer', 'correct_answers');
            $table->renameColumn('wrong_answer', 'wrong_answers');
        });
    }
};
