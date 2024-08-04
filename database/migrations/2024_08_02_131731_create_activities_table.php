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
            $table->id();
            $table->string('adm_no');
            $table->string('teacher_name');
            $table->string('date_time');
            $table->string('poop_susu')->nullable();
            $table->string('nap')->nullable();
            $table->string('meals')->nullable();
            $table->string('dieppers')->nullable();
            $table->string('milk_bottle_feed')->nullable();
            $table->longText('describe_poop_susu')->nullable();
            // $table->longText('describe_bootle_feed')->nullable();
            $table->longText('describe_nap')->nullable();
            $table->longText('describe_meals')->nullable();
            $table->longText('describe_dieppers')->nullable();
            $table->longText('describe_bootle_feed')->nullable();
            $table->timestamps();
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
