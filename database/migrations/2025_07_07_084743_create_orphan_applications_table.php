<?php

// 1. MIGRATION - Create orphan_applications table
// File: database/migrations/2024_01_01_000001_create_orphan_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrphanApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('orphan_applications', function (Blueprint $table) {
            $table->id();
            
            // Guardian Information
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('guardian_email')->nullable();
            $table->string('guardian_id_number')->unique();
            $table->string('guardian_relationship'); // mother, grandmother, aunt, etc.
            $table->text('guardian_address');
            $table->string('guardian_city');
            $table->string('guardian_country')->default('السعودية');
            
            // Orphan Information
            $table->string('orphan_name');
            $table->date('orphan_birth_date');
            $table->enum('orphan_gender', ['ذكر', 'أنثى']);
            $table->string('orphan_id_number')->unique()->nullable();
            $table->string('orphan_nationality')->default('سعودي');
            $table->text('orphan_address');
            $table->string('orphan_city');
            
            // Father Information
            $table->string('father_name');
            $table->date('father_death_date');
            $table->string('father_death_cause');
            $table->string('father_id_number')->unique();
            $table->string('father_job_before_death')->nullable();
            
            // Family Financial Information
            $table->decimal('monthly_income', 10, 2)->default(0);
            $table->string('income_source')->nullable();
            $table->integer('family_members_count');
            $table->text('financial_situation_description');
            
            // Housing Information
            $table->enum('housing_type', ['ملك', 'إيجار', 'مع الأقارب', 'أخرى']);
            $table->decimal('monthly_rent', 10, 2)->nullable();
            $table->text('housing_description');
            
            // Health Information
            $table->boolean('has_health_issues')->default(false);
            $table->text('health_issues_description')->nullable();
            $table->boolean('needs_medical_care')->default(false);
            $table->text('medical_care_description')->nullable();
            
            // Education Information
            $table->string('education_level');
            $table->string('school_name')->nullable();
            $table->boolean('needs_educational_support')->default(false);
            $table->text('educational_needs_description')->nullable();
            
            // Additional Information
            $table->text('special_circumstances')->nullable();
            $table->text('additional_notes')->nullable();
            $table->text('support_needed');
            
            // Application Status
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            
            // File Attachments (stored as JSON)
            $table->json('attached_documents')->nullable();
            
            $table->timestamps();
            
            // Foreign key for reviewer
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
            
            // Indexes
            $table->index(['status', 'created_at']);
            $table->index(['orphan_name', 'guardian_name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('orphan_applications');
    }
}