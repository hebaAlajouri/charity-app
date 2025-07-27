@extends('admin.layout')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">{{ __('adminorphanapplication.create_orphan_application') }}</h1>

    <form action="{{ route('admin.orphan_applications.store') }}" method="POST"class="edit-form">
        @csrf

        <div class="bg-white p-6 rounded shadow space-y-6">

            <h2 class="text-xl font-semibold mb-4">{{ __('adminorphanapplication.guardian_info') }}</h2>

            <div>
                <label for="guardian_name" class="block font-semibold mb-1">اسم الولي <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_name" id="guardian_name" value="{{ old('guardian_name') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_id_number" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_id_number') }} <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_id_number" id="guardian_id_number" value="{{ old('guardian_id_number') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_id_number')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_phone" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_phone') }} <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_phone" id="guardian_phone" value="{{ old('guardian_phone') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_email" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_email') }}</label>
                <input type="email" name="guardian_email" id="guardian_email" value="{{ old('guardian_email') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_relationship" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_relationship') }} <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_relationship" id="guardian_relationship" value="{{ old('guardian_relationship') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_relationship')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_address" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_address') }} <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_address" id="guardian_address" value="{{ old('guardian_address') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_city" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_city') }} <span class="text-red-600">*</span></label>
                <input type="text" name="guardian_city" id="guardian_city" value="{{ old('guardian_city') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_city')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="guardian_country" class="block font-semibold mb-1">{{ __('adminorphanapplication.guardian_country') }}</label>
                <input type="text" name="guardian_country" id="guardian_country" value="{{ old('guardian_country', 'السعودية') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('guardian_country')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- معلومات اليتيم -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.orphan_info') }}</h2>

            <div>
                <label for="orphan_name" class="block font-semibold mb-1">اسم اليتيم <span class="text-red-600">*</span></label>
                <input type="text" name="orphan_name" id="orphan_name" value="{{ old('orphan_name') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_birth_date" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_birth_date') }} <span class="text-red-600">*</span></label>
                <input type="date" name="orphan_birth_date" id="orphan_birth_date" value="{{ old('orphan_birth_date') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_birth_date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_gender" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_gender') }} <span class="text-red-600">*</span></label>
                <select name="orphan_gender" id="orphan_gender" required class="w-full border rounded px-3 py-2">
                    <option value="">{{ __('adminorphanapplication.choose_gender') }}</option>
                    <option value="ذكر" {{ old('orphan_gender') == 'ذكر' ? 'selected' : '' }}>{{ __('adminorphanapplication.male') }}</option>
                    <option value="أنثى" {{ old('orphan_gender') == 'أنثى' ? 'selected' : '' }}>{{ __('adminorphanapplication.female') }}</option>
                </select>
                @error('orphan_gender')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_nationality" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_nationality') }}</label>
                <input type="text" name="orphan_nationality" id="orphan_nationality" value="{{ old('orphan_nationality', 'سعودي') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_nationality')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_id_number" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_id_number') }}</label>
                <input type="text" name="orphan_id_number" id="orphan_id_number" value="{{ old('orphan_id_number') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_id_number')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_address" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_address') }} <span class="text-red-600">*</span></label>
                <input type="text" name="orphan_address" id="orphan_address" value="{{ old('orphan_address') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="orphan_city" class="block font-semibold mb-1">{{ __('adminorphanapplication.orphan_city') }} <span class="text-red-600">*</span></label>
                <input type="text" name="orphan_city" id="orphan_city" value="{{ old('orphan_city') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('orphan_city')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- معلومات الأب -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.father_info') }}</h2>

            <div>
                <label for="father_name" class="block font-semibold mb-1">{{ __('adminorphanapplication.father_name') }} <span class="text-red-600">*</span></label>
                <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('father_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="father_death_date" class="block font-semibold mb-1">{{ __('adminorphanapplication.father_death_date') }} <span class="text-red-600">*</span></label>
                <input type="date" name="father_death_date" id="father_death_date" value="{{ old('father_death_date') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('father_death_date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="father_death_cause" class="block font-semibold mb-1">{{ __('adminorphanapplication.father_death_cause') }} <span class="text-red-600">*</span></label>
                <input type="text" name="father_death_cause" id="father_death_cause" value="{{ old('father_death_cause') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('father_death_cause')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="father_id_number" class="block font-semibold mb-1">{{ __('adminorphanapplication.father_id_number') }} <span class="text-red-600">*</span></label>
                <input type="text" name="father_id_number" id="father_id_number" value="{{ old('father_id_number') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('father_id_number')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="father_job_before_death" class="block font-semibold mb-1">{{ __('adminorphanapplication.father_job_before_death') }}</label>
                <input type="text" name="father_job_before_death" id="father_job_before_death" value="{{ old('father_job_before_death') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('father_job_before_death')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- الوضع المالي -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.financial_status') }}</h2>

            <div>
                <label for="monthly_income" class="block font-semibold mb-1">{{ __('adminorphanapplication.monthly_income') }} <span class="text-red-600">*</span></label>
                <input type="number" step="0.01" name="monthly_income" id="monthly_income" value="{{ old('monthly_income') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('monthly_income')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="income_source" class="block font-semibold mb-1">{{ __('adminorphanapplication.income_source') }}</label>
                <input type="text" name="income_source" id="income_source" value="{{ old('income_source') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('income_source')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="family_members_count" class="block font-semibold mb-1">{{ __('adminorphanapplication.family_members_count') }} <span class="text-red-600">*</span></label>
                <input type="number" name="family_members_count" id="family_members_count" value="{{ old('family_members_count') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('family_members_count')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="financial_situation_description" class="block font-semibold mb-1">{{ __('adminorphanapplication.financial_situation_description') }} <span class="text-red-600">*</span></label>
                <textarea name="financial_situation_description" id="financial_situation_description" rows="3" required
                          class="w-full border rounded px-3 py-2">{{ old('financial_situation_description') }}</textarea>
                @error('financial_situation_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- السكن -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.housing_info') }}</h2>

            <div>
                <label for="housing_type" class="block font-semibold mb-1">{{ __('adminorphanapplication.housing_type') }} <span class="text-red-600">*</span></label>
                <select name="housing_type" id="housing_type" required class="w-full border rounded px-3 py-2">
                    <option value="">{{ __('adminorphanapplication.choose_housing_type') }}</option>
                    <option value="ملك" {{ old('housing_type') == 'ملك' ? 'selected' : '' }}>{{ __('adminorphanapplication.owned') }}</option>
                    <option value="إيجار" {{ old('housing_type') == 'إيجار' ? 'selected' : '' }}>{{ __('adminorphanapplication.rented') }}</option>
                    <option value="مع الأقارب" {{ old('housing_type') == 'مع الأقارب' ? 'selected' : '' }}>{{ __('adminorphanapplication.with_relatives') }}</option>
                    <option value="أخرى" {{ old('housing_type') == 'أخرى' ? 'selected' : '' }}>{{ __('adminorphanapplication.other') }}</option>
                </select>
                @error('housing_type')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="monthly_rent" class="block font-semibold mb-1">{{ __('adminorphanapplication.monthly_rent') }}</label>
                <input type="number" step="0.01" name="monthly_rent" id="monthly_rent" value="{{ old('monthly_rent') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('monthly_rent')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="housing_description" class="block font-semibold mb-1">{{ __('adminorphanapplication.housing_description') }} <span class="text-red-600">*</span></label>
                <textarea name="housing_description" id="housing_description" rows="3" required
                          class="w-full border rounded px-3 py-2">{{ old('housing_description') }}</textarea>
                @error('housing_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- الوضع الصحي -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.health_status') }}</h2>

            <div class="flex items-center space-x-2 mb-4">
                <input type="checkbox" name="has_health_issues" id="has_health_issues" value="1" {{ old('has_health_issues') ? 'checked' : '' }} />
                <label for="has_health_issues" class="font-semibold">{{ __('adminorphanapplication.has_health_issues') }}</label>
            </div>

            <div>
                <label for="health_issues_description" class="block font-semibold mb-1">{{ __('adminorphanapplication.health_issues_description') }}</label>
                <textarea name="health_issues_description" id="health_issues_description" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('health_issues_description') }}</textarea>
                @error('health_issues_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-2 mb-4">
                <input type="checkbox" name="needs_medical_care" id="needs_medical_care" value="1" {{ old('needs_medical_care') ? 'checked' : '' }} />
                <label for="needs_medical_care" class="font-semibold">{{ __('adminorphanapplication.needs_medical_care') }}</label>
            </div>

            <div>
                <label for="medical_care_description" class="block font-semibold mb-1">{{ __('adminorphanapplication.medical_care_description') }}</label>
                <textarea name="medical_care_description" id="medical_care_description" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('medical_care_description') }}</textarea>
                @error('medical_care_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- التعليم -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.education_info') }}</h2>

            <div>
                <label for="education_level" class="block font-semibold mb-1">{{ __('adminorphanapplication.education_level') }} <span class="text-red-600">*</span></label>
                <input type="text" name="education_level" id="education_level" value="{{ old('education_level') }}" required
                       class="w-full border rounded px-3 py-2" />
                @error('education_level')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="school_name" class="block font-semibold mb-1">{{ __('adminorphanapplication.school_name') }}</label>
                <input type="text" name="school_name" id="school_name" value="{{ old('school_name') }}"
                       class="w-full border rounded px-3 py-2" />
                @error('school_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-2 mb-4">
                <input type="checkbox" name="needs_educational_support" id="needs_educational_support" value="1" {{ old('needs_educational_support') ? 'checked' : '' }} />
                <label for="needs_educational_support" class="font-semibold">{{ __('adminorphanapplication.needs_educational_support') }}</label>
            </div>

            <div>
                <label for="educational_needs_description" class="block font-semibold mb-1">{{ __('adminorphanapplication.educational_needs_description') }}</label>
                <textarea name="educational_needs_description" id="educational_needs_description" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('educational_needs_description') }}</textarea>
                @error('educational_needs_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- معلومات إضافية -->

            <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.additional_info') }}</h2>

            <div>
                <label for="special_circumstances" class="block font-semibold mb-1">{{ __('adminorphanapplication.special_circumstances') }}</label>
                <textarea name="special_circumstances" id="special_circumstances" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('special_circumstances') }}</textarea>
                @error('special_circumstances')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="additional_notes" class="block font-semibold mb-1">{{ __('adminorphanapplication.additional_notes') }}</label>
                <textarea name="additional_notes" id="additional_notes" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('additional_notes') }}</textarea>
                @error('additional_notes')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="support_needed" class="block font-semibold mb-1">{{ __('adminorphanapplication.support_needed') }} <span class="text-red-600">*</span></label>
                <textarea name="support_needed" id="support_needed" rows="3" required
                          class="w-full border rounded px-3 py-2">{{ old('support_needed') }}</textarea>
                @error('support_needed')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-end mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                    حفظ الطلب
                </button>
            </div>
        </div>
    </form>
</div>
@endsection