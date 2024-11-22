<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeTypesTable extends Migration
{
    public function up(): void
    {
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Type of fee (e.g., Tuition, Transport)
            $table->decimal('amount', 10, 2); // Default amount for the fee
            $table->decimal('annual_fee', 10, 2)->nullable(); // Optional annual fee
            $table->decimal('term_fee_1', 10, 2)->nullable(); // Term 1 fee
            $table->decimal('term_fee_2', 10, 2)->nullable(); // Term 2 fee
            $table->decimal('term_fee_3', 10, 2)->nullable(); // Term 3 fee
            $table->decimal('term_fee_4', 10, 2)->nullable(); // Term 4 fee
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_types');
    }
}
