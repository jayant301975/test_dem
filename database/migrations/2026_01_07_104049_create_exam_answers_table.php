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
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
             $table->foreignId('exam_attempt_id')->constrained()->cascadeOnDelete();
            
             $table->foreignId('question_id')->constrained()->cascadeOnDelete();

              $table->text('answer')->nullable();

                // For MCQ (single / multiple correct)
                $table->json('selected_options')->nullable();

                // Evaluation
                $table->decimal('marks_obtained', 5, 2)->default(0);
                $table->boolean('is_correct')->nullable();
                $table->timestamps();
                $table->unique(['exam_attempt_id', 'question_id']);



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_answers');
    }
};
