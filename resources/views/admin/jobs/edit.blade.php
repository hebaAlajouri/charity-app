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

    {{-- Title Arabic --}}
    <label>{{ __('adminjob.title') }} (AR)</label>
    <input name="title" placeholder="{{ __('adminjob.title') }}" value="{{ old('title', $job->title) }}" class="w-full p-2 border rounded" required>
    @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Title English --}}
    <label>{{ __('adminjob.title') }} (EN)</label>
    <input name="title_en" placeholder="{{ __('adminjob.title') }} EN" value="{{ old('title_en', $job->title_en) }}" class="w-full p-2 border rounded">
    @error('title_en') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Location Arabic --}}
    <label>{{ __('adminjob.location') }} (AR)</label>
    <input name="location" placeholder="{{ __('adminjob.location') }}" value="{{ old('location', $job->location) }}" class="w-full p-2 border rounded">
    @error('location') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Location English --}}
    <label>{{ __('adminjob.location') }} (EN)</label>
    <input name="location_en" placeholder="{{ __('adminjob.location') }} EN" value="{{ old('location_en', $job->location_en) }}" class="w-full p-2 border rounded">
    @error('location_en') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Description Arabic --}}
    <label>{{ __('adminjob.description') }} (AR)</label>
    <textarea name="description" placeholder="{{ __('adminjob.description') }}" class="w-full p-2 border rounded" required>{{ old('description', $job->description) }}</textarea>
    @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Description English --}}
    <label>{{ __('adminjob.description') }} (EN)</label>
    <textarea name="description_en" placeholder="{{ __('adminjob.description') }} EN" class="w-full p-2 border rounded">{{ old('description_en', $job->description_en) }}</textarea>
    @error('description_en') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Job Type --}}
    <select name="type" class="w-full p-2 border rounded" required>
        <option value="" disabled>{{ __('adminjob.type') }}</option>
        <option value="دوام كامل" {{ old('type', $job->type) == 'دوام كامل' ? 'selected' : '' }}>{{ __('adminjob.full_time') }}</option>
        <option value="دوام جزئي" {{ old('type', $job->type) == 'دوام جزئي' ? 'selected' : '' }}>{{ __('adminjob.part_time') }}</option>
        <option value="متطوع" {{ old('type', $job->type) == 'متطوع' ? 'selected' : '' }}>{{ __('adminjob.volunteer') }}</option>
    </select>
    @error('type') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Deadline --}}
    <input type="date" name="deadline" value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}" class="w-full p-2 border rounded" placeholder="{{ __('adminjob.deadline') }}">
    @error('deadline') <p class="text-red-600">{{ $message }}</p> @enderror

    {{-- Active status --}}
    <select name="is_active" class="w-full p-2 border rounded" required>
        <option value="1" {{ old('is_active', $job->is_active) == '1' ? 'selected' : '' }}>{{ __('adminjob.active') }}</option>
        <option value="0" {{ old('is_active', $job->is_active) == '0' ? 'selected' : '' }}>{{ __('adminjob.inactive') }}</option>
    </select>
    @error('is_active') <p class="text-red-600">{{ $message }}</p> @enderror

    <button type="submit" class="btn-login">{{ __('adminjob.submit') }}</button>
</form>

@endsection