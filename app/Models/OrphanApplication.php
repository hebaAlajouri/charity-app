<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrphanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        // Guardian Information
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'guardian_id_number',
        'guardian_relationship',
        'guardian_address',
        'guardian_city',
        'guardian_country',
        
        // Orphan Information
        'orphan_name',
        'orphan_birth_date',
        'orphan_gender',
        'orphan_id_number',
        'orphan_nationality',
        'orphan_address',
        'orphan_city',
        
        // Father Information
        'father_name',
        'father_death_date',
        'father_death_cause',
        'father_id_number',
        'father_job_before_death',
        
        // Family Financial Information
        'monthly_income',
        'income_source',
        'family_members_count',
        'financial_situation_description',
        
        // Housing Information
        'housing_type',
        'monthly_rent',
        'housing_description',
        
        // Health Information
        'has_health_issues',
        'health_issues_description',
        'needs_medical_care',
        'medical_care_description',
        
        // Education Information
        'education_level',
        'school_name',
        'needs_educational_support',
        'educational_needs_description',
        
        // Additional Information
        'special_circumstances',
        'additional_notes',
        'support_needed',
        
        // Application Status
        'status',
        'admin_notes',
        'reviewed_at',
        'reviewed_by',
        
        // File Attachments
        'attached_documents',
    ];

    protected $casts = [
        'orphan_birth_date' => 'date',
        'father_death_date' => 'date',
        'monthly_income' => 'decimal:2',
        'monthly_rent' => 'decimal:2',
        'has_health_issues' => 'boolean',
        'needs_medical_care' => 'boolean',
        'needs_educational_support' => 'boolean',
        'reviewed_at' => 'datetime',
        'attached_documents' => 'array',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}