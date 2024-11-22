<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolFeeSettingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('school_fee_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_annual_fee', 10, 2)->nullable();
            $table->decimal('total_term_fee', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_fee_settings');
    }
}
