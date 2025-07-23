<x-app-layout>
    <div class="form-container py-10 px-4 max-w-5xl mx-auto" style="background-color: var(--light-gold)">
        @if(session('success'))
            <div class="px-4 py-3 rounded mb-6 text-green-900" style="background-color: #E6F4EA;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="px-4 py-3 rounded mb-6 text-red-900" style="background-color: #FCE8E6;">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="px-4 py-3 rounded mb-6 text-red-900" style="background-color: #FCE8E6;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('orphan.store') }}" class="p-6 rounded-lg shadow-lg space-y-6 bg-white">
            @csrf

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.guardian_info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach([
                    'guardian_name',
                    'guardian_phone',
                    'guardian_email',
                    'guardian_id_number',
                    'guardian_relationship',
                    'guardian_address',
                    'guardian_city',
                    'guardian_country'
                ] as $field)
                    <input type="{{ $field === 'guardian_email' ? 'email' : 'text' }}"
                           name="{{ $field }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ __('orphan.' . $field) }}"
                           value="{{ old($field, $field === 'guardian_country' ? __('orphan.guardian_country') : '') }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.orphan_info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="orphan_name" class="form-input" placeholder="{{ __('orphan.orphan_name') }}" value="{{ old('orphan_name') }}" required>
                <input type="date" name="orphan_birth_date" class="form-input" value="{{ old('orphan_birth_date') }}" required>
                <select name="orphan_gender" class="form-select bg-white border border-muted-blue" required>
                    <option value="">{{ __('orphan.orphan_gender') }}</option>
                    <option value="ذكر" {{ old('orphan_gender') == 'ذكر' ? 'selected' : '' }}>{{ __('orphan.male') }}</option>
                    <option value="أنثى" {{ old('orphan_gender') == 'أنثى' ? 'selected' : '' }}>{{ __('orphan.female') }}</option>
                </select>
                @foreach([
                    'orphan_id_number',
                    'orphan_nationality',
                    'orphan_address',
                    'orphan_city'
                ] as $field)
                    <input type="text"
                           name="{{ $field }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ __('orphan.' . $field) }}"
                           value="{{ old($field, $field === 'orphan_nationality' ? __('orphan.saudi') : '') }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.father_info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach([
                    'father_name',
                    'father_death_date',
                    'father_death_cause',
                    'father_id_number',
                    'father_job_before_death'
                ] as $field)
                    <input type="{{ $field === 'father_death_date' ? 'date' : 'text' }}"
                           name="{{ $field }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ __('orphan.' . $field) }}"
                           value="{{ old($field) }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.financial_status') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="number" name="monthly_income" class="form-input" placeholder="{{ __('orphan.monthly_income') }}" value="{{ old('monthly_income') }}" required>
                <input type="text" name="income_source" class="form-input" placeholder="{{ __('orphan.income_source') }}" value="{{ old('income_source') }}">
                <input type="number" name="family_members_count" class="form-input" placeholder="{{ __('orphan.family_members_count') }}" value="{{ old('family_members_count') }}" required>
                <textarea name="financial_situation_description" class="form-input" placeholder="{{ __('orphan.financial_situation_description') }}" required>{{ old('financial_situation_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.housing') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="housing_type" class="form-select bg-white border border-muted-blue" required>
                    <option value="">{{ __('orphan.housing_type') }}</option>
                    @foreach(['ملك', 'إيجار', 'مع الأقارب', 'أخرى'] as $type)
                        <option value="{{ $type }}" {{ old('housing_type') == $type ? 'selected' : '' }}>{{ __('orphan.housing_type_' . $type) }}</option>
                    @endforeach
                </select>
                <input type="number" name="monthly_rent" class="form-input" placeholder="{{ __('orphan.monthly_rent') }}" value="{{ old('monthly_rent') }}">
                <textarea name="housing_description" class="form-input" placeholder="{{ __('orphan.housing_description') }}" required>{{ old('housing_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.health_education') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="has_health_issues" value="1" {{ old('has_health_issues') ? 'checked' : '' }}>
                    {{ __('orphan.has_health_issues') }}
                </label>
                <textarea name="health_issues_description" class="form-input" placeholder="{{ __('orphan.health_issues_description') }}">{{ old('health_issues_description') }}</textarea>

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_medical_care" value="1" {{ old('needs_medical_care') ? 'checked' : '' }}>
                    {{ __('orphan.needs_medical_care') }}
                </label>
                <textarea name="medical_care_description" class="form-input" placeholder="{{ __('orphan.medical_care_description') }}">{{ old('medical_care_description') }}</textarea>

                <input type="text" name="education_level" class="form-input" placeholder="{{ __('orphan.education_level') }}" value="{{ old('education_level') }}" required>
                <input type="text" name="school_name" class="form-input" placeholder="{{ __('orphan.school_name') }}" value="{{ old('school_name') }}">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_educational_support" value="1" {{ old('needs_educational_support') ? 'checked' : '' }}>
                    {{ __('orphan.needs_educational_support') }}
                </label>
                <textarea name="educational_needs_description" class="form-input" placeholder="{{ __('orphan.educational_needs_description') }}">{{ old('educational_needs_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-primary">{{ __('orphan.additional_info') }}</h2>
            <div class="space-y-4">
                <textarea name="special_circumstances" class="form-input" placeholder="{{ __('orphan.special_circumstances') }}">{{ old('special_circumstances') }}</textarea>
                <textarea name="additional_notes" class="form-input" placeholder="{{ __('orphan.additional_notes') }}">{{ old('additional_notes') }}</textarea>
                <textarea name="support_needed" class="form-input" placeholder="{{ __('orphan.support_needed') }}" required>{{ old('support_needed') }}</textarea>
            </div>

            <div class="submit-section pt-6 text-center">
                <button type="submit" class="submit-btn text-white font-bold py-2 px-6 rounded" style="background: var(--gold-gradient);">
                    <i class="fas fa-paper-plane ml-2"></i> {{ __('orphan.submit_request') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
