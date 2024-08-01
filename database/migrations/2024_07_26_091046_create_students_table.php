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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('s_class_id');
            $table->unsignedInteger('section_id');
            $table->string('adm_no', 30)->unique()->nullable();
            $table->unsignedInteger('my_parent_id')->nullable();
            $table->string('session');
            $table->tinyInteger('age')->nullable();
            $table->string('year_admitted')->nullable();
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
