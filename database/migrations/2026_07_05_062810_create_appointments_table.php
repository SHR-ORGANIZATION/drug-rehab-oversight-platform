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
       Schema::create('appointments', function (Blueprint $table) {

    $table->id();

    $table->foreignId('patient_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('caregiver_id')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->foreignId('doctor_id')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete();

    $table->dateTime('appointment_date');

    $table->text('purpose');

    $table->enum('status', [
        'pending',
        'approved',
        'rejected',
        'completed'
    ])->default('pending');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
