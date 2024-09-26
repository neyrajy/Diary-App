<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\KJDAHelpers;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('student')->nullable();
            $table->string('student2')->nullable();
            $table->string('firstname');
            $table->string('secondname')->nullable();
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->default(4);
            $table->string('phone')->unique()->nullable();
            $table->string('phone2')->unique()->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable(); 
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('nal_id')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->boolean('verified')->default(false); 
            $table->boolean('guardian')->default(false); 
            $table->timestamp('verified_at')->nullable(); 
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->string('class_name')->nullable();
            $table->string('section_name')->nullable();
            $table->string('salary')->nullable();
            $table->string('employment_type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

