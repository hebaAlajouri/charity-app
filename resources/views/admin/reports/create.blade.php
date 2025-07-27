@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminreport.add_report_create') }}</h1>

<form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf

    <input name="title" placeholder="{{ __('adminreport.title_create') }}" value="{{ old('title') }}" class="w-full p-2 border rounded" required>
    @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

    <input name="category" placeholder="{{ __('adminreport.category_create') }}" value="{{ old('category') }}" class="w-full p-2 border rounded">
    @error('category') <p class="text-red-600">{{ $message }}</p> @enderror

    <textarea name="description" placeholder="{{ __('adminreport.description_create') }}" class="w-full p-2 border rounded">{{ old('description') }}</textarea>
    @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

    <input type="file" name="file_path" accept=".pdf,.doc,.docx" class="w-full p-2 border rounded" aria-label="{{ __('adminreport.file_path_create') }}">
    @error('file_path') <p class="text-red-600">{{ $message }}</p> @enderror

    <input type="date" name="published_at" value="{{ old('published_at') }}" class="w-full p-2 border rounded" aria-label="{{ __('adminreport.published_at_create') }}">
    @error('published_at') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">{{ __('adminreport.save_create') }}</button>
</form>
@endsection
