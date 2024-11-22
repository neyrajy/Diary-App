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
            $table->unsignedBigInteger('fee_type_id');
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->date('paid_date')->nullable();
            $table->string('status')->default('unpaid'); 
            $table->date('due_date')->nullable(); 
            $table->string('receipt')->unique(); 
            $table->timestamps();

            
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('fee_type_id')->references('id')->on('fee_types')->onDelete('cascade');
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
