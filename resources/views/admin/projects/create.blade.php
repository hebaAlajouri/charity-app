@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة مشروع جديد</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="rtl list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    <input name="name" placeholder="اسم المشروع" class="w-full p-2 border rounded" required>
    <input name="code" placeholder="رمز المشروع" class="w-full p-2 border rounded" required>
    <input name="goal_amount" placeholder="المبلغ المستهدف" class="w-full p-2 border rounded" required>
    <input name="raised_amount" placeholder="المبلغ المحقق" class="w-full p-2 border rounded">
    <input name="icon" placeholder="أيقونة FontAwesome (اختياري)" class="w-full p-2 border rounded">
    <input name="image" type="file" class="w-full p-2 border rounded">
    <textarea name="description" placeholder="وصف المشروع" class="w-full p-2 border rounded"></textarea>
    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection
