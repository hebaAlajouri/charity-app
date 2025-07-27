@extends('admin.layout')

@section('content')
@php
    $locale = app()->getLocale();
    $titleField = $locale === 'en' ? 'title_en' : 'title';
    $locationField = $locale === 'en' ? 'location_en' : 'location';
    $descriptionField = $locale === 'en' ? 'description_en' : 'description';
@endphp

<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminjob.edit_title') }}</h1>

<form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" class="edit-form">
    @csrf
    @method('PUT')

    {{-- Locale-aware title input --}}
    <input name="{{ $titleField }}" placeholder="{{ __('adminjob.title') }}"
        value="{{ old($titleField, $job->{$titleField}) }}" class="w-full p-2 border rounded" required>
    @error($titleField) <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Preserve the other title field --}}
    @if ($locale === 'ar')
        <input type="hidden" name="title_en" value="{{ $job->title_en }}">
    @else
        <input type="hidden" name="title" value="{{ $job->title }}">
    @endif

    {{-- Locale-aware location input --}}
    <input name="{{ $locationField }}" placeholder="{{ __('adminjob.location') }}"
        value="{{ old($locationField, $job->{$locationField}) }}" class="w-full p-2 border rounded">
    @error($locationField) <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Preserve the other location field --}}
    @if ($locale === 'ar')
        <input type="hidden" name="location_en" value="{{ $job->location_en }}">
    @else
        <input type="hidden" name="location" value="{{ $job->location }}">
    @endif

    {{-- Locale-aware description input --}}
    <textarea name="{{ $descriptionField }}" placeholder="{{ __('adminjob.description') }}"
        class="w-full p-2 border rounded" required>{{ old($descriptionField, $job->{$descriptionField}) }}</textarea>
    @error($descriptionField) <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Preserve the other description field --}}
    @if ($locale === 'ar')
        <input type="hidden" name="description_en" value="{{ $job->description_en }}">
    @else
        <input type="hidden" name="description" value="{{ $job->description }}">
    @endif

    {{-- Job type --}}
    <select name="type" class="w-full p-2 border rounded" required>
        <option value="" disabled>{{ __('adminjob.type') }}</option>
        <option value="دوام كامل" {{ old('type', $job->type) == 'دوام كامل' ? 'selected' : '' }}>
            {{ __('adminjob.full_time') }}</option>
        <option value="دوام جزئي" {{ old('type', $job->type) == 'دوام جزئي' ? 'selected' : '' }}>
            {{ __('adminjob.part_time') }}</option>
        <option value="متطوع" {{ old('type', $job->type) == 'متطوع' ? 'selected' : '' }}>
            {{ __('adminjob.volunteer') }}</option>
    </select>
    @error('type') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Deadline --}}
    <input type="date" name="deadline"
        value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}"
        class="w-full p-2 border rounded" placeholder="{{ __('adminjob.deadline') }}">
    @error('deadline') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Active status --}}
    <select name="is_active" class="w-full p-2 border rounded" required>
        <option value="1" {{ old('is_active', $job->is_active) == '1' ? 'selected' : '' }}>
            {{ __('adminjob.active') }}</option>
        <option value="0" {{ old('is_active', $job->is_active) == '0' ? 'selected' : '' }}>
            {{ __('adminjob.inactive') }}</option>
    </select>
    @error('is_active') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">{{ __('adminjob.submit') }}</button>
</form>
@endsection