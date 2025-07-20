@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-[#e74c3c]">إعدادات الثيم</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.theme.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    @foreach($settings as $category => $group)
        <h2 class="text-xl font-semibold mb-2 mt-6">{{ ucfirst($category) }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            @foreach($group as $setting)
                <div>
                    <label for="{{ $setting->key }}" class="block font-medium text-gray-700 mb-1">
                        {{ $setting->label }}
                    </label>
                    
                    @if ($setting->type === 'color')
                        <input type="color" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}"
                               value="{{ old("settings.{$setting->key}", $setting->value) }}"
                               class="w-16 h-10 p-0 border-2 border-gray-300 rounded cursor-pointer">
                    @elseif ($setting->type === 'text')
                        <input type="text" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}"
                               value="{{ old("settings.{$setting->key}", $setting->value) }}"
                               class="w-full border-gray-300 rounded px-3 py-2">
                    @elseif ($setting->type === 'number')
                        <input type="number" name="settings[{{ $setting->key }}]" id="{{ $setting->key }}"
                               value="{{ old("settings.{$setting->key}", $setting->value) }}"
                               class="w-full border-gray-300 rounded px-3 py-2">
                    @endif
                    
                    @if ($setting->description)
                        <p class="text-sm text-gray-500 mt-1">{{ $setting->description }}</p>
                    @endif
                    
                    @error("settings.{$setting->key}")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>
    @endforeach
    
    <button type="submit" class="bg-[#e74c3c] text-white px-6 py-2 rounded hover:bg-red-600 transition">
        حفظ التغييرات
    </button>
</form>

<form method="POST" action="{{ route('admin.theme.reset') }}">
    @csrf
    <button type="submit" class="text-sm text-gray-500 hover:underline mt-6">
        استعادة الإعدادات الافتراضية
    </button>
</form>
@endsection