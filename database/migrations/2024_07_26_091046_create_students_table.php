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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); 
            $table->string('firstname');
            $table->string('secondname')->nullable();
            $table->string('lastname');
            $table->unsignedBigInteger('s_class_id');
            $table->unsignedBigInteger('section_id'); 
            $table->string('adm_no', 30)->unique();
            $table->string('photo')->nullable(); 
            $table->unsignedInteger('bg_id')->nullable();
            $table->string('session');
            $table->string('age')->nullable();
            $table->string('admission_date')->nullable();
            $table->tinyInteger('grad')->default(0);
            $table->string('grad_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

