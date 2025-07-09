@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e67e22]">تعديل المشروع</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="rtl list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')
    <input name="name" value="{{ old('name', $project->name) }}" placeholder="اسم المشروع" class="w-full p-2 border rounded" required>
    <input name="code" value="{{ old('code', $project->code) }}" placeholder="رمز المشروع" class="w-full p-2 border rounded" required>
    <input name="goal_amount" value="{{ old('goal_amount', $project->goal_amount) }}" placeholder="المبلغ المستهدف" class="w-full p-2 border rounded" required>
    <input name="raised_amount" value="{{ old('raised_amount', $project->raised_amount) }}" placeholder="المبلغ المحقق" class="w-full p-2 border rounded">
    <input name="icon" value="{{ old('icon', $project->icon) }}" placeholder="أيقونة FontAwesome (اختياري)" class="w-full p-2 border rounded">
    <input name="image" type="file" class="w-full p-2 border rounded">
    <textarea name="description" placeholder="وصف المشروع" class="w-full p-2 border rounded">{{ old('description', $project->description) }}</textarea>
    <button type="submit" class="btn-login">تحديث</button>
</form>
@endsection
