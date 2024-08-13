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
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // Use the id method to create an auto-incrementing primary key
            $table->unsignedBigInteger('student_id'); // Foreign key to students table
            $table->dateTime('date_time');
            $table->enum('mood', ['happy', 'sad', 'angry', 'neutral', 'excited'])->nullable(); // Mood of the student
            $table->text('learning_activities')->nullable(); // Description of learning activities
            $table->text('lessons_learnt')->nullable(); // Lessons learnt today
            $table->boolean('needs_more_time')->default(false); // Indicates if the student needs more time to learn
            $table->unsignedInteger('milk_times')->nullable(); // Times student drank milk (for baby class)
            $table->boolean('milk_finished')->nullable(); // Whether the milk was finished (for baby class)
            $table->string('breakfast')->nullable(); // Details of breakfast
            $table->string('breakfast_quantity')->nullable(); // Quantity of breakfast eaten
            $table->boolean('breakfast_finished')->nullable(); // Whether the breakfast was finished
            $table->string('lunch')->nullable(); // Details of lunch
            $table->string('lunch_quantity')->nullable(); // Quantity of lunch eaten
            $table->boolean('lunch_finished')->nullable(); // Whether the lunch was finished
            $table->string('snack')->nullable(); // Details of snack
            $table->string('snack_quantity')->nullable(); // Quantity of snack eaten
            $table->boolean('snack_finished')->nullable(); // Whether the snack was finished
            $table->text('general_observation')->nullable(); // General observation of the day
            $table->boolean('poop')->default(false)->nullable(); 
            $table->text('describe_poop')->nullable(); // Description of poop (if applicable)
            $table->string('nap')->nullable(); // Nap time/status
            $table->unsignedInteger('diapers_used')->nullable(); // Number of diapers used (for baby class)
            $table->string('photos')->nullable(); 
            $table->string('videos')->nullable(); 
            $table->string('milestones')->nullable(); // Milestones achieved
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
