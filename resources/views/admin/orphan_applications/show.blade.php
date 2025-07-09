@extends('admin.layout')

@section('content')
<div class="show-box">
    <h1 class="text-2xl font-bold mb-6">عرض طلب كفالة اليتيم</h1>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">معلومات الولي</h2>
        <p><strong>الاسم:</strong> {{ $orphan_application->guardian_name }}</p>
        <p><strong>رقم الهوية:</strong> {{ $orphan_application->guardian_id_number }}</p>
        <p><strong>رقم الهاتف:</strong> {{ $orphan_application->guardian_phone }}</p>
        <p><strong>العنوان:</strong> {{ $orphan_application->guardian_address }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">معلومات اليتيم</h2>
        <p><strong>الاسم:</strong> {{ $orphan_application->orphan_name }}</p>
        <p><strong>تاريخ الميلاد:</strong> {{ $orphan_application->orphan_birth_date }}</p>
        <p><strong>العنوان:</strong> {{ $orphan_application->orphan_address }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">معلومات الأب</h2>
        <p><strong>الاسم:</strong> {{ $orphan_application->father_name }}</p>
        <p><strong>تاريخ الوفاة:</strong> {{ $orphan_application->father_death_date }}</p>
        <p><strong>سبب الوفاة:</strong> {{ $orphan_application->father_death_cause }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">معلومات إضافية</h2>
        <p><strong>الوضع المالي:</strong> {{ $orphan_application->financial_situation_description }}</p>
        <p><strong>نوع السكن:</strong> {{ $orphan_application->housing_type }}</p>
        <p><strong>الحالة الصحية:</strong> {{ $orphan_application->has_health_issues ? 'نعم' : 'لا' }}</p>
        <p><strong>يحتاج إلى دعم تعليمي:</strong> {{ $orphan_application->needs_educational_support ? 'نعم' : 'لا' }}</p>

        <a href="{{ route('admin.orphan_applications.edit', $orphan_application->id) }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            تعديل
        </a>
    </div>
</div>
@endsection
