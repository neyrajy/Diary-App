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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('type'); // Type of fee (e.g., tuition, transport, etc.)
            $table->string('amount'); // The fee amount
            $table->string('status')->nullable(); // The status of the fee
            $table->date('due_date'); // The due date for the fee payment
            $table->string('receipt');
            $table->decimal('total_fee', 10, 2); 
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->date('paid_date')->nullable(); // The date the fee was paid
            $table->string('description')->nullable(); // Optional description for the fee
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
