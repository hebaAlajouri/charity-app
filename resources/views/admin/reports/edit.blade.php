@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">تعديل التقرير</h1>

<form action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')

    <input name="title" placeholder="عنوان التقرير" value="{{ old('title', $report->title) }}" class="w-full p-2 border rounded" required>
    @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

    <input name="category" placeholder="الفئة" value="{{ old('category', $report->category) }}" class="w-full p-2 border rounded">
    @error('category') <p class="text-red-600">{{ $message }}</p> @enderror

    <textarea name="description" placeholder="الوصف" class="w-full p-2 border rounded">{{ old('description', $report->description) }}</textarea>
    @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

    <div>
        @if($report->file_path)
            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="text-blue-600 underline">ملف التقرير الحالي</a>
        @endif
    </div>

    <input type="file" name="file_path" accept=".pdf,.doc,.docx" class="w-full p-2 border rounded mt-2">
    @error('file_path') <p class="text-red-600">{{ $message }}</p> @enderror

    <input type="date" name="published_at" value="{{ old('published_at', $report->published_at ? $report->published_at->format('Y-m-d') : '') }}" class="w-full p-2 border rounded">
    @error('published_at') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">تحديث</button>
</form>
@endsection
