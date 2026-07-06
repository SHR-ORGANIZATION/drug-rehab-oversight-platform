<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Caregiver;
use App\Models\Patient;
use App\Models\CaregiverReport;
use App\Models\DoctorReview;
use App\Models\Appointment;
use App\Models\RiskType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $doctorRole = Role::create(['name' => 'doctor', 'guard_name' => 'web']);
        $caregiverRole = Role::create(['name' => 'caregiver', 'guard_name' => 'caregiver']);

        // Create Doctor (Admin) user
        $doctor = User::create([
            'name' => 'Dr. John Smith',
            'email' => 'doctor@rehabcare.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567890',
            'role' => 'doctor',
            'email_verified_at' => now(),
        ]);
        $doctor->assignRole($doctorRole);

        // Create Caregiver users (on separate caregivers table)
        $caregiver1 = Caregiver::create([
            'name' => 'Sarah Johnson',
            'email' => 'caregiver@rehabcare.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567891',
            'email_verified_at' => now(),
        ]);
        $caregiver1->assignRole($caregiverRole);

        $caregiver2 = Caregiver::create([
            'name' => 'David Brown',
            'email' => 'david@rehabcare.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567892',
            'email_verified_at' => now(),
        ]);
        $caregiver2->assignRole($caregiverRole);

        // Create Risk Types
        $riskHigh = RiskType::create(['name' => 'High', 'description' => 'High risk - requires immediate attention']);
        $riskMedium = RiskType::create(['name' => 'Medium', 'description' => 'Medium risk - requires monitoring']);
        $riskLow = RiskType::create(['name' => 'Low', 'description' => 'Low risk - routine monitoring']);

        // Create Patients for caregiver1
        $patient1 = Patient::create([
            'patient_id' => 'P-001',
            'caregiver_id' => $caregiver1->id,
            'full_name' => 'Michael Chen',
            'gender' => 'Male',
            'date_of_birth' => '1985-03-15',
            'phone' => '+1987654321',
            'email' => 'michael.chen@email.com',
            'address' => '123 Main Street, Springfield',
            'emergency_contact' => '+1987654322',
            'medical_history' => 'Post-surgery rehabilitation, knee replacement',
            'admission_date' => '2026-06-15',
            'status' => 'Active',
        ]);

        $patient2 = Patient::create([
            'patient_id' => 'P-002',
            'caregiver_id' => $caregiver1->id,
            'full_name' => 'Emma Wilson',
            'gender' => 'Female',
            'date_of_birth' => '1990-07-22',
            'phone' => '+1987654323',
            'email' => 'emma.wilson@email.com',
            'address' => '456 Oak Avenue, Springfield',
            'emergency_contact' => '+1987654324',
            'medical_history' => 'Stroke recovery, physical therapy',
            'admission_date' => '2026-06-20',
            'status' => 'Active',
        ]);

        $patient3 = Patient::create([
            'patient_id' => 'P-003',
            'caregiver_id' => $caregiver2->id,
            'full_name' => 'James Miller',
            'gender' => 'Male',
            'date_of_birth' => '1978-11-08',
            'phone' => '+1987654325',
            'email' => 'james.miller@email.com',
            'address' => '789 Pine Road, Springfield',
            'emergency_contact' => '+1987654326',
            'medical_history' => 'Spinal cord injury rehabilitation',
            'admission_date' => '2026-06-25',
            'status' => 'Active',
        ]);

        // Create Caregiver Reports
        $report1 = CaregiverReport::create([
            'patient_id' => $patient1->id,
            'caregiver_id' => $caregiver1->id,
            'report_date' => '2026-07-04',
            'symptoms' => 'Patient reports mild pain in the knee during walking exercises. Swelling has reduced compared to last week.',
            'observations' => 'Patient is making good progress with physical therapy. Range of motion improving. Able to walk short distances with minimal assistance.',
            'vital_signs' => 'BP: 120/80, Pulse: 72, Temp: 36.6°C',
            'pain_level' => 3,
            'functional_status' => 'improved',
            'session_type' => 'Physical Therapy',
            'mood_behavior' => 'Positive and motivated. Cooperated well during exercises. Expressed confidence in recovery.',
            'status' => 'pending',
        ]);

        $report2 = CaregiverReport::create([
            'patient_id' => $patient2->id,
            'caregiver_id' => $caregiver1->id,
            'report_date' => '2026-07-03',
            'symptoms' => 'Patient shows improved motor control in right arm. Minor tremors still present during fine motor tasks.',
            'observations' => 'Stroke recovery progressing well. Patient able to perform daily activities with increasing independence. Speech therapy showing positive results.',
            'vital_signs' => 'BP: 130/85, Pulse: 78, Temp: 36.8°C',
            'pain_level' => 2,
            'functional_status' => 'improved',
            'session_type' => 'Occupational Therapy',
            'mood_behavior' => 'Cheerful and engaged. Participated actively in group activities. Good social interaction with other patients.',
            'status' => 'reviewed',
        ]);

        $report3 = CaregiverReport::create([
            'patient_id' => $patient3->id,
            'caregiver_id' => $caregiver2->id,
            'report_date' => '2026-07-02',
            'symptoms' => 'Patient experiencing back pain during stretching exercises. Numbness in lower extremities reported intermittently.',
            'observations' => 'Spinal rehabilitation ongoing. Patient needs additional support during transfers. Mood has improved with social interaction activities.',
            'vital_signs' => 'BP: 140/90, Pulse: 82, Temp: 37.0°C',
            'pain_level' => 7,
            'functional_status' => 'declined',
            'session_type' => 'Physical Therapy',
            'mood_behavior' => 'Frustrated and anxious. Difficulty coping with slow progress. Refused morning session but participated in afternoon group therapy.',
            'status' => 'pending',
        ]);

        // Doctor Review for report2 (reviewed)
        DoctorReview::create([
            'caregiver_report_id' => $report2->id,
            'doctor_id' => $doctor->id,
            'risk_type_id' => $riskLow->id,
            'doctor_notes' => 'Patient is responding well to the current rehabilitation program. Continue monitoring tremor frequency.',
            'subjective_notes' => 'Patient reports feeling "much better" than last month. Able to dress independently and hold utensils without assistance. Sleep quality improved.',
            'objective_notes' => 'Right arm motor control improved by 30% compared to admission. Tremor frequency reduced from 4/10 to 2/10 during fine motor tasks. Grip strength increased bilaterally.',
            'assessment_notes' => 'Stroke recovery is progressing satisfactorily. Patient demonstrates good neuroplasticity response to therapy. Current trajectory suggests potential for near-full independence in ADLs within 3 months.',
            'treatment_plan' => 'Continue current OT program. Increase fine motor task difficulty gradually. Introduce community reintegration activities. Maintain speech therapy twice weekly.',
            'recommendation' => 'Continue current rehabilitation program with gradual increase in independence. Consider home visit assessment in 4 weeks.',
            'risk_severity' => 'low',
            'icd10_code' => 'I63.9',
            'treatment_goals' => 'Short-term: Improve fine motor control to 80% within 4 weeks. Long-term: Full independence in ADLs within 3 months.',
            'medication_changes' => 'No changes. Continue current antiplatelet therapy.',
            'follow_up_date' => '2026-07-10',
            'review_status' => 'finalized',
            'reviewed_at' => '2026-07-04 10:30:00',
        ]);

        // Create Appointments
        Appointment::create([
            'patient_id' => $patient1->id,
            'caregiver_id' => $caregiver1->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => '2026-07-08 10:00:00',
            'purpose' => 'Follow-up knee rehabilitation assessment',
            'status' => 'approved',
        ]);

        Appointment::create([
            'patient_id' => $patient2->id,
            'caregiver_id' => $caregiver1->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => '2026-07-08 14:30:00',
            'purpose' => 'Stroke recovery progress review',
            'status' => 'approved',
        ]);

        Appointment::create([
            'patient_id' => $patient3->id,
            'caregiver_id' => $caregiver2->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => '2026-07-09 09:00:00',
            'purpose' => 'Spinal rehabilitation review and risk assessment',
            'status' => 'approved',
        ]);
    }
}
