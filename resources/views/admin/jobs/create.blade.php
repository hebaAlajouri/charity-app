@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة وظيفة جديدة</h1>

<form action="{{ route('admin.jobs.store') }}" method="POST" class="edit-form">
    @csrf

    <input name="title" placeholder="عنوان الوظيفة" value="{{ old('title') }}" class="w-full p-2 border rounded" required>
    @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

    <input name="location" placeholder="الموقع (اختياري)" value="{{ old('location') }}" class="w-full p-2 border rounded">
    @error('location') <p class="text-red-600">{{ $message }}</p> @enderror

    <textarea name="description" placeholder="وصف الوظيفة" class="w-full p-2 border rounded" required>{{ old('description') }}</textarea>
    @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

    <select name="type" class="w-full p-2 border rounded" required>
        <option value="دوام كامل" {{ old('type') == 'دوام كامل' ? 'selected' : '' }}>دوام كامل</option>
        <option value="دوام جزئي" {{ old('type') == 'دوام جزئي' ? 'selected' : '' }}>دوام جزئي</option>
        <option value="متطوع" {{ old('type') == 'متطوع' ? 'selected' : '' }}>متطوع</option>
    </select>
    @error('type') <p class="text-red-600">{{ $message }}</p> @enderror

    <input type="date" name="deadline" value="{{ old('deadline') }}" class="w-full p-2 border rounded">
    @error('deadline') <p class="text-red-600">{{ $message }}</p> @enderror

    <select name="is_active" class="w-full p-2 border rounded" required>
        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>نشطة</option>
        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>غير نشطة</option>
    </select>
    @error('is_active') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection
