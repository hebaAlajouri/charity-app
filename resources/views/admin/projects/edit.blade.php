@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e67e22]">
    {{ __('adminproject.edit_project') }}
</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }} list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')

    <!-- Arabic Name -->
    <input name="name_ar"
           value="{{ old('name_ar', $project->name_ar) }}"
           placeholder="{{ __('adminproject.project_name_ar') }}"
           class="w-full p-2 border rounded mb-2" required>

    <!-- English Name -->
    <input name="name_en"
           value="{{ old('name_en', $project->name_en) }}"
           placeholder="{{ __('adminproject.project_name_en') }}"
           class="w-full p-2 border rounded mb-2">

    <input name="code"
           value="{{ old('code', $project->code) }}"
           placeholder="{{ __('adminproject.project_code') }}"
           class="w-full p-2 border rounded mb-2" required>

    <input name="goal_amount"
           value="{{ old('goal_amount', $project->goal_amount) }}"
           placeholder="{{ __('adminproject.goal_amount') }}"
           class="w-full p-2 border rounded mb-2" required>

    <input name="raised_amount"
           value="{{ old('raised_amount', $project->raised_amount) }}"
           placeholder="{{ __('adminproject.raised_amount') }}"
           class="w-full p-2 border rounded mb-2">

    <input name="icon"
           value="{{ old('icon', $project->icon) }}"
           placeholder="{{ __('adminproject.fontawesome_icon') }}"
           class="w-full p-2 border rounded mb-2">

    <input name="image" type="file" class="w-full p-2 border rounded mb-2"
           aria-label="{{ __('adminproject.project_image') }}">

    <!-- Arabic Description -->
    <textarea name="description"
              placeholder="{{ __('adminproject.project_description_ar') }}"
              class="w-full p-2 border rounded mb-2">{{ old('description', $project->description) }}</textarea>

    <!-- English Description -->
    <textarea name="description_en"
              placeholder="{{ __('adminproject.project_description_en') }}"
              class="w-full p-2 border rounded mb-4">{{ old('description_en', $project->description_en) }}</textarea>

    <button type="submit" class="btn-login">
        {{ __('adminproject.update') }}
    </button>
</form>
@endsection
