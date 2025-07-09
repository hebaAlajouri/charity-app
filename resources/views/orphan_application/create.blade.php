<x-app-layout>
    <div class="form-container py-10 px-4 max-w-5xl mx-auto">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('orphan_applications.store') }}" class="bg-white p-6 rounded-lg shadow-lg space-y-6">
            @csrf

            <h2 class="text-2xl font-bold text-red-600">بيانات ولي الأمر</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="guardian_name" class="form-input" placeholder="اسم ولي الأمر" value="{{ old('guardian_name') }}" required>
                <input type="text" name="guardian_phone" class="form-input" placeholder="رقم الهاتف" value="{{ old('guardian_phone') }}" required>
                <input type="email" name="guardian_email" class="form-input" placeholder="البريد الإلكتروني" value="{{ old('guardian_email') }}">
                <input type="text" name="guardian_id_number" class="form-input" placeholder="رقم الهوية" value="{{ old('guardian_id_number') }}" required>
                <input type="text" name="guardian_relationship" class="form-input" placeholder="صلة القرابة" value="{{ old('guardian_relationship') }}" required>
                <input type="text" name="guardian_address" class="form-input" placeholder="العنوان الكامل" value="{{ old('guardian_address') }}" required>
                <input type="text" name="guardian_city" class="form-input" placeholder="المدينة" value="{{ old('guardian_city') }}" required>
                <input type="text" name="guardian_country" class="form-input" placeholder="الدولة" value="{{ old('guardian_country', 'السعودية') }}">
            </div>

            <h2 class="text-2xl font-bold text-red-600">بيانات اليتيم</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="orphan_name" class="form-input" placeholder="اسم اليتيم" value="{{ old('orphan_name') }}" required>
                <input type="date" name="orphan_birth_date" class="form-input" value="{{ old('orphan_birth_date') }}" required>
                <select name="orphan_gender" class="form-select" required>
                    <option value="">الجنس</option>
                    <option value="ذكر" {{ old('orphan_gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                    <option value="أنثى" {{ old('orphan_gender') == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                </select>
                <input type="text" name="orphan_id_number" class="form-input" placeholder="رقم الهوية (إن وجد)" value="{{ old('orphan_id_number') }}">
                <input type="text" name="orphan_nationality" class="form-input" placeholder="الجنسية" value="{{ old('orphan_nationality', 'سعودي') }}">
                <input type="text" name="orphan_address" class="form-input" placeholder="العنوان" value="{{ old('orphan_address') }}" required>
                <input type="text" name="orphan_city" class="form-input" placeholder="المدينة" value="{{ old('orphan_city') }}" required>
            </div>

            <h2 class="text-2xl font-bold text-red-600">بيانات الأب</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="father_name" class="form-input" placeholder="اسم الأب" value="{{ old('father_name') }}" required>
                <input type="date" name="father_death_date" class="form-input" value="{{ old('father_death_date') }}" required>
                <input type="text" name="father_death_cause" class="form-input" placeholder="سبب الوفاة" value="{{ old('father_death_cause') }}" required>
                <input type="text" name="father_id_number" class="form-input" placeholder="رقم الهوية" value="{{ old('father_id_number') }}" required>
                <input type="text" name="father_job_before_death" class="form-input" placeholder="وظيفته قبل الوفاة" value="{{ old('father_job_before_death') }}">
            </div>

            <h2 class="text-2xl font-bold text-red-600">الوضع المالي</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="number" name="monthly_income" class="form-input" placeholder="الدخل الشهري" value="{{ old('monthly_income') }}" required>
                <input type="text" name="income_source" class="form-input" placeholder="مصدر الدخل" value="{{ old('income_source') }}">
                <input type="number" name="family_members_count" class="form-input" placeholder="عدد أفراد الأسرة" value="{{ old('family_members_count') }}" required>
                <textarea name="financial_situation_description" class="form-input" placeholder="وصف الحالة المالية" required>{{ old('financial_situation_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-red-600">السكن</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="housing_type" class="form-select" required>
                    <option value="">نوع السكن</option>
                    <option value="ملك" {{ old('housing_type') == 'ملك' ? 'selected' : '' }}>ملك</option>
                    <option value="إيجار" {{ old('housing_type') == 'إيجار' ? 'selected' : '' }}>إيجار</option>
                    <option value="مع الأقارب" {{ old('housing_type') == 'مع الأقارب' ? 'selected' : '' }}>مع الأقارب</option>
                    <option value="أخرى" {{ old('housing_type') == 'أخرى' ? 'selected' : '' }}>أخرى</option>
                </select>
                <input type="number" name="monthly_rent" class="form-input" placeholder="الإيجار الشهري (إن وجد)" value="{{ old('monthly_rent') }}">
                <textarea name="housing_description" class="form-input" placeholder="وصف السكن" required>{{ old('housing_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-red-600">الصحة والتعليم</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="has_health_issues" value="1" {{ old('has_health_issues') ? 'checked' : '' }}> يعاني من مشاكل صحية؟
                </label>
                <textarea name="health_issues_description" class="form-input" placeholder="وصف المشاكل الصحية">{{ old('health_issues_description') }}</textarea>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_medical_care" value="1" {{ old('needs_medical_care') ? 'checked' : '' }}> يحتاج إلى رعاية طبية؟
                </label>
                <textarea name="medical_care_description" class="form-input" placeholder="تفاصيل الرعاية الطبية المطلوبة">{{ old('medical_care_description') }}</textarea>
                <input type="text" name="education_level" class="form-input" placeholder="المرحلة الدراسية" value="{{ old('education_level') }}" required>
                <input type="text" name="school_name" class="form-input" placeholder="اسم المدرسة (إن وجد)" value="{{ old('school_name') }}">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="needs_educational_support" value="1" {{ old('needs_educational_support') ? 'checked' : '' }}> يحتاج إلى دعم تعليمي؟
                </label>
                <textarea name="educational_needs_description" class="form-input" placeholder="وصف الاحتياجات التعليمية">{{ old('educational_needs_description') }}</textarea>
            </div>

            <h2 class="text-2xl font-bold text-red-600">معلومات إضافية</h2>
            <div class="space-y-4">
                <textarea name="special_circumstances" class="form-input" placeholder="ظروف خاصة (إن وجدت)">{{ old('special_circumstances') }}</textarea>
                <textarea name="additional_notes" class="form-input" placeholder="ملاحظات إضافية">{{ old('additional_notes') }}</textarea>
                <textarea name="support_needed" class="form-input" placeholder="نوع الدعم المطلوب" required>{{ old('support_needed') }}</textarea>
            </div>

            <div class="submit-section pt-6 text-center">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane ml-2"></i> إرسال الطلب
                </button>
            </div>
        </form>
    </div>
</x-app-layout>