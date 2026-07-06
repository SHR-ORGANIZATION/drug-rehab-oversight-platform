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
      Schema::create('caregiver_reports', function (Blueprint $table) {

    $table->id();

    $table->foreignId('patient_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('caregiver_id')
        ->constrained('caregivers')
        ->cascadeOnDelete();

    $table->date('report_date');

    $table->text('symptoms');

    $table->text('observations');

    $table->enum('status', ['pending', 'reviewed'])
        ->default('pending');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregiver_reports');
    }
};
