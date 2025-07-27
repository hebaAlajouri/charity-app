@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminorphan.add_orphan') }}</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <p class="mb-2 font-semibold">{{ __('adminorphan.errors') }}</p>
        <ul class="list-disc rtl list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.orphans.store') }}" method="POST" class="edit-form">
    @csrf

    <input name="name" value="{{ old('name') }}" placeholder="{{ __('adminorphan.name') }}" class="w-full p-2 border rounded" required>
    
    <input name="guardian_phone" value="{{ old('guardian_phone') }}" placeholder="{{ __('adminorphan.guardian_phone') }}" class="w-full p-2 border rounded">
    
    <input name="address" value="{{ old('address') }}" placeholder="{{ __('adminorphan.address') }}" class="w-full p-2 border rounded">
    
    <input name="age" type="number" value="{{ old('age') }}" placeholder="{{ __('adminorphan.age') }}" class="w-full p-2 border rounded">
    
    <select name="status" class="w-full p-2 border rounded" required>
        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>{{ __('adminorphan.available') }}</option>
        <option value="sponsored" {{ old('status') == 'sponsored' ? 'selected' : '' }}>{{ __('adminorphan.sponsored') }}</option>
    </select>

    <button type="submit" class="btn-login">{{ __('adminorphan.save') }}</button>
</form>
@endsection
