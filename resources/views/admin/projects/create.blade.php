@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminproject.add_project') }}</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="rtl list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf

    <!-- Arabic Name -->
    <input name="name_ar" placeholder="{{ __('adminproject.name_ar') }}" class="w-full p-2 border rounded" value="{{ old('name_ar') }}" required>

    <!-- English Name -->
    <input name="name_en" placeholder="{{ __('adminproject.name_en') }}" class="w-full p-2 border rounded" value="{{ old('name_en') }}">

    <input name="code" placeholder="{{ __('adminproject.code') }}" class="w-full p-2 border rounded" value="{{ old('code') }}" required>

    <input name="goal_amount" placeholder="{{ __('adminproject.goal_amount') }}" class="w-full p-2 border rounded" value="{{ old('goal_amount') }}" required>

    <input name="raised_amount" placeholder="{{ __('adminproject.raised_amount') }}" class="w-full p-2 border rounded" value="{{ old('raised_amount') }}">

    <input name="icon" placeholder="{{ __('adminproject.icon') }}" class="w-full p-2 border rounded" value="{{ old('icon') }}">

    <input name="image" type="file" class="w-full p-2 border rounded">

    <!-- Arabic Description -->
    <textarea name="description" placeholder="{{ __('adminproject.description') }}" class="w-full p-2 border rounded">{{ old('description') }}</textarea>

    <!-- English Description -->
    <textarea name="description_en" placeholder="{{ __('adminproject.description') }} (EN)" class="w-full p-2 border rounded">{{ old('description_en') }}</textarea>

    <button type="submit" class="btn-login">{{ __('adminproject.save') }}</button>
</form>
@endsection
