<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrphanApplication;
use App\Models\Orphan;
use Illuminate\Support\Facades\App;

class OrphanApplicationController extends Controller
{
    public function create()
    {
        // return the view that contains the orphan application form
        return view('orphan.create');
    }
    public function store(Request $request)
    {
        try {
            \Log::info('Request data:', $request->all());

            $validatedData = $request->validate([
                // guardian
                'guardian_name' => 'required|string|max:255',
                'guardian_phone' => 'required|string|max:20',
                'guardian_email' => 'nullable|email|max:255',
                'guardian_id_number' => 'required|string|unique:orphan_applications,guardian_id_number',
                'guardian_relationship' => 'required|string|max:255',
                'guardian_address' => 'required|string',
                'guardian_city' => 'required|string|max:255',
                'guardian_country' => 'required|string|max:255',

                // orphan
                'orphan_name' => 'required|string|max:255',
                'orphan_birth_date' => 'required|date',
                'orphan_gender' => 'required|in:ذكر,أنثى',
                'orphan_id_number' => 'nullable|string|unique:orphan_applications,orphan_id_number',
                'orphan_nationality' => 'required|string|max:255',
                'orphan_address' => 'required|string',
                'orphan_city' => 'required|string|max:255',

                // father
                'father_name' => 'required|string|max:255',
                'father_death_date' => 'required|date',
                'father_death_cause' => 'required|string|max:255',
                'father_id_number' => 'required|string|unique:orphan_applications,father_id_number',
                'father_job_before_death' => 'nullable|string|max:255',

                // financial
                'monthly_income' => 'required|numeric',
                'income_source' => 'nullable|string|max:255',
                'family_members_count' => 'required|integer',
                'financial_situation_description' => 'required|string',

                // housing
                'housing_type' => 'required|in:ملك,إيجار,مع الأقارب,أخرى',
                'monthly_rent' => 'nullable|numeric',
                'housing_description' => 'required|string',

                // health
                'has_health_issues' => 'sometimes|boolean',
                'health_issues_description' => 'nullable|string',
                'needs_medical_care' => 'sometimes|boolean',
                'medical_care_description' => 'nullable|string',

                // education
                'education_level' => 'required|string|max:255',
                'school_name' => 'nullable|string|max:255',
                'needs_educational_support' => 'sometimes|boolean',
                'educational_needs_description' => 'nullable|string',

                // other
                'special_circumstances' => 'nullable|string',
                'additional_notes' => 'nullable|string',
                'support_needed' => 'required|string',
            ]);

            // Convert checkboxes
            $validatedData['has_health_issues'] = $request->has('has_health_issues') ? 1 : 0;
            $validatedData['needs_medical_care'] = $request->has('needs_medical_care') ? 1 : 0;
            $validatedData['needs_educational_support'] = $request->has('needs_educational_support') ? 1 : 0;

            // Multilingual fields
            if (App::getLocale() === 'en') {
                $validatedData['orphan_city_en'] = $validatedData['orphan_city'];
                $validatedData['housing_type_en'] = $validatedData['housing_type'];
                $validatedData['education_level_en'] = $validatedData['education_level'];
            } else {
                $validatedData['orphan_city_en'] = null;
                $validatedData['housing_type_en'] = null;
                $validatedData['education_level_en'] = null;
            }

            $application = OrphanApplication::create($validatedData);
            \Log::info('Application created:', $application->toArray());

            // Age calculation
            $birthDate = new \DateTime($validatedData['orphan_birth_date']);
            $today = new \DateTime();
            $age = $birthDate->diff($today)->y;

            $orphan = Orphan::create([
                'name' => $validatedData['orphan_name'],
                'guardian_phone' => $validatedData['guardian_phone'],
                'address' => $validatedData['orphan_address'],
                'age' => $age,
                'status' => 'available',
            ]);

            \Log::info('Orphan created:', $orphan->toArray());

            return redirect()->back()->with('success', 'تم إرسال طلب الكفالة بنجاح.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            \Log::error('Error saving application:', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage())->withInput();
        }
    }
}
