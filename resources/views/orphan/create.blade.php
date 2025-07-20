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

        <form method="POST" action="{{ route('orphan.store') }}" class="p-6 rounded-lg shadow-lg space-y-6" style="background-color: white;">
            @csrf

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">بيانات ولي الأمر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach([
                    'guardian_name' => 'اسم ولي الأمر',
                    'guardian_phone' => 'رقم الهاتف',
                    'guardian_email' => 'البريد الإلكتروني',
                    'guardian_id_number' => 'رقم الهوية',
                    'guardian_relationship' => 'صلة القرابة',
                    'guardian_address' => 'العنوان الكامل',
                    'guardian_city' => 'المدينة',
                    'guardian_country' => 'الدولة'
                ] as $name => $placeholder)
                    <input type="{{ $name === 'guardian_email' ? 'email' : 'text' }}"
                           name="{{ $name }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ $placeholder }}"
                           value="{{ old($name, $name === 'guardian_country' ? 'السعودية' : '') }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">بيانات اليتيم</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="orphan_name" class="form-input" placeholder="اسم اليتيم" value="{{ old('orphan_name') }}" required>
                <input type="date" name="orphan_birth_date" class="form-input" value="{{ old('orphan_birth_date') }}" required>
                <select name="orphan_gender" class="form-select bg-white border border-muted-blue" required>
                    <option value="">الجنس</option>
                    <option value="ذكر" {{ old('orphan_gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                    <option value="أنثى" {{ old('orphan_gender') == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                </select>
                @foreach([
                    'orphan_id_number' => 'رقم الهوية (إن وجد)',
                    'orphan_nationality' => 'الجنسية',
                    'orphan_address' => 'العنوان',
                    'orphan_city' => 'المدينة'
                ] as $name => $placeholder)
                    <input type="text"
                           name="{{ $name }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ $placeholder }}"
                           value="{{ old($name, $name === 'orphan_nationality' ? 'سعودي' : '') }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">بيانات الأب</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach([
                    'father_name' => 'اسم الأب',
                    'father_death_date' => 'تاريخ الوفاة',
                    'father_death_cause' => 'سبب الوفاة',
                    'father_id_number' => 'رقم الهوية',
                    'father_job_before_death' => 'وظيفته قبل الوفاة'
                ] as $name => $placeholder)
                    <input type="{{ $name === 'father_death_date' ? 'date' : 'text' }}"
                           name="{{ $name }}"
                           class="form-input"
                           style="border-color: var(--muted-blue); background-color: var(--soft-beige);"
                           placeholder="{{ $placeholder }}"
                           value="{{ old($name) }}"
                           required>
                @endforeach
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">الوضع المالي</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="number" name="monthly_income" class="form-input" placeholder="الدخل الشهري" value="{{ old('monthly_income') }}" required>
                <input type="text" name="income_source" class="form-input" placeholder="مصدر الدخل" value="{{ old('income_source') }}">
                <input type="number" name="family_members_count" class="form-input" placeholder="عدد أفراد الأسرة" value="{{ old('family_members_count') }}" required>
                <textarea name="financial_situation_description" class="form-input" placeholder="وصف الحالة المالية" required>{{ old('financial_situation_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">السكن</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="housing_type" class="form-select bg-white border border-muted-blue" required>
                    <option value="">نوع السكن</option>
                    @foreach(['ملك', 'إيجار', 'مع الأقارب', 'أخرى'] as $type)
                        <option value="{{ $type }}" {{ old('housing_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                <input type="number" name="monthly_rent" class="form-input" placeholder="الإيجار الشهري (إن وجد)" value="{{ old('monthly_rent') }}">
                <textarea name="housing_description" class="form-input" placeholder="وصف السكن" required>{{ old('housing_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">الصحة والتعليم</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="has_health_issues" value="1" {{ old('has_health_issues') ? 'checked' : '' }}>
                    يعاني من مشاكل صحية؟
                </label>
                <textarea name="health_issues_description" class="form-input">{{ old('health_issues_description') }}</textarea>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_medical_care" value="1" {{ old('needs_medical_care') ? 'checked' : '' }}>
                    يحتاج إلى رعاية طبية؟
                </label>
                <textarea name="medical_care_description" class="form-input">{{ old('medical_care_description') }}</textarea>
                <input type="text" name="education_level" class="form-input" placeholder="المرحلة الدراسية" value="{{ old('education_level') }}" required>
                <input type="text" name="school_name" class="form-input" placeholder="اسم المدرسة (إن وجد)" value="{{ old('school_name') }}">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_educational_support" value="1" {{ old('needs_educational_support') ? 'checked' : '' }}>
                    يحتاج إلى دعم تعليمي؟
                </label>
                <textarea name="educational_needs_description" class="form-input">{{ old('educational_needs_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold" style="color: var(--primary-gold)">معلومات إضافية</h2>
            <div class="space-y-4">
                <textarea name="special_circumstances" class="form-input">{{ old('special_circumstances') }}</textarea>
                <textarea name="additional_notes" class="form-input">{{ old('additional_notes') }}</textarea>
                <textarea name="support_needed" class="form-input" required>{{ old('support_needed') }}</textarea>
            </div>

            <div class="submit-section pt-6 text-center">
                <button type="submit" class="submit-btn text-white font-bold py-2 px-6 rounded" style="background: var(--gold-gradient);">
                    <i class="fas fa-paper-plane ml-2"></i> إرسال الطلب
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
