@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminreport.edit_report') }}</h1>

<form action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')

    <input
        name="title"
        placeholder="{{ __('adminreport.title_edit') }}"
        value="{{ old('title', $report->localized_title) }}"
        class="w-full p-2 border rounded"
        required
    >
    @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

    <input
        name="category"
        placeholder="{{ __('adminreport.category_edit') }}"
        value="{{ old('category', $report->localized_category) }}"
        class="w-full p-2 border rounded"
    >
    @error('category') <p class="text-red-600">{{ $message }}</p> @enderror

    <textarea
        name="description"
        placeholder="{{ __('adminreport.description_edit') }}"
        class="w-full p-2 border rounded"
    >{{ old('description', app()->getLocale() === 'en' && $report->description_en ? $report->description_en : $report->description) }}</textarea>
    @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

    <div>
        @if($report->file_path)
            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="text-blue-600 underline">
                {{ __('adminreport.current_file_edit') }}
            </a>
        @endif
    </div>

    <input
        type="file"
        name="file_path"
        accept=".pdf,.doc,.docx"
        class="w-full p-2 border rounded mt-2"
        placeholder="{{ __('adminreport.choose_file') }}"
    >
    @error('file_path') <p class="text-red-600">{{ $message }}</p> @enderror

    <input
        type="date"
        name="published_at"
        value="{{ old('published_at', $report->published_at ? $report->published_at->format('Y-m-d') : '') }}"
        class="w-full p-2 border rounded"
        placeholder="{{ __('adminreport.published_at') }}"
    >
    @error('published_at') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">{{ __('adminreport.update_edit') }}</button>
</form>
@endsection
