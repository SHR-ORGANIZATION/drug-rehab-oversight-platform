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
        Schema::create('doctor_reviews', function (Blueprint $table) {

    $table->id();

    $table->foreignId('caregiver_report_id')
        ->constrained('caregiver_reports')
        ->cascadeOnDelete();

    $table->foreignId('doctor_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->foreignId('risk_type_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->text('doctor_notes')->nullable();

    $table->text('recommendation')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_reviews');
    }
};
