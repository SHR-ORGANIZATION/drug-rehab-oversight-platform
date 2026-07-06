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
        Schema::table('caregiver_reports', function (Blueprint $table) {
            $table->text('vital_signs')->nullable()->after('observations');
            $table->unsignedTinyInteger('pain_level')->nullable()->after('vital_signs');
            $table->enum('functional_status', ['improved', 'stable', 'declined'])->nullable()->after('pain_level');
            $table->string('session_type')->nullable()->after('functional_status');
            $table->text('mood_behavior')->nullable()->after('session_type');
        });

        Schema::table('doctor_reviews', function (Blueprint $table) {
            $table->text('subjective_notes')->nullable()->after('doctor_notes');
            $table->text('objective_notes')->nullable()->after('subjective_notes');
            $table->text('assessment_notes')->nullable()->after('objective_notes');
            $table->text('treatment_plan')->nullable()->after('assessment_notes');
            $table->enum('risk_severity', ['low', 'medium', 'high', 'critical'])->nullable()->after('risk_type_id');
            $table->string('icd10_code')->nullable()->after('risk_severity');
            $table->text('treatment_goals')->nullable()->after('recommendation');
            $table->text('medication_changes')->nullable()->after('treatment_goals');
            $table->date('follow_up_date')->nullable()->after('medication_changes');
            $table->enum('review_status', ['draft', 'finalized'])->nullable()->after('follow_up_date');
            $table->timestamp('reviewed_at')->nullable()->after('review_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caregiver_reports', function (Blueprint $table) {
            $table->dropColumn(['vital_signs', 'pain_level', 'functional_status', 'session_type', 'mood_behavior']);
        });

        Schema::table('doctor_reviews', function (Blueprint $table) {
            $table->dropColumn([
                'subjective_notes', 'objective_notes', 'assessment_notes', 'treatment_plan',
                'risk_severity', 'icd10_code', 'treatment_goals', 'medication_changes',
                'follow_up_date', 'review_status', 'reviewed_at',
            ]);
        });
    }
};
