@extends('admin.layout')

@section('content')
<div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
    <h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminjob.add_new_job') }}</h1>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="edit-form">
        @csrf

        <input 
            name="title" 
            placeholder="{{ __('adminjob.title') }}" 
            value="{{ old('title') }}" 
            class="w-full p-2 border rounded {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}" 
            required>
        @error('title') <p class="text-red-600">{{ $message }}</p> @enderror

        <input 
            name="location" 
            placeholder="{{ __('adminjob.location') }}" 
            value="{{ old('location') }}" 
            class="w-full p-2 border rounded {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
        @error('location') <p class="text-red-600">{{ $message }}</p> @enderror

        <textarea 
            name="description" 
            placeholder="{{ __('adminjob.description') }}" 
            class="w-full p-2 border rounded {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}" 
            required>{{ old('description') }}</textarea>
        @error('description') <p class="text-red-600">{{ $message }}</p> @enderror

        <select name="type" class="w-full p-2 border rounded" required>
            <option value="دوام كامل" {{ old('type') == 'دوام كامل' ? 'selected' : '' }}>{{ __('adminjob.full_time') }}</option>
            <option value="دوام جزئي" {{ old('type') == 'دوام جزئي' ? 'selected' : '' }}>{{ __('adminjob.part_time') }}</option>
            <option value="متطوع" {{ old('type') == 'متطوع' ? 'selected' : '' }}>{{ __('adminjob.volunteer') }}</option>
        </select>
        @error('type') <p class="text-red-600">{{ $message }}</p> @enderror

        <input 
            type="date" 
            name="deadline" 
            value="{{ old('deadline') }}" 
            class="w-full p-2 border rounded">
        @error('deadline') <p class="text-red-600">{{ $message }}</p> @enderror

        <select name="is_active" class="w-full p-2 border rounded" required>
            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>{{ __('adminjob.active') }}</option>
            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ __('adminjob.inactive') }}</option>
        </select>
        @error('is_active') <p class="text-red-600">{{ $message }}</p> @enderror

        <button type="submit" class="btn-login">{{ __('adminjob.submit') }}</button>
    </form>
</div>
@endsection
