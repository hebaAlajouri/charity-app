@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة خبر جديد</h1>

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    <input name="title" placeholder="العنوان" value="{{ old('title') }}" class="w-full p-2 border rounded" required>

    <input type="file" name="image" class="w-full p-2 border rounded">

    <textarea name="content" placeholder="المحتوى" rows="6" class="w-full p-2 border rounded" required>{{ old('content') }}</textarea>

    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection
