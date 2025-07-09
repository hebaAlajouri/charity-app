@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة يتيم جديد</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc rtl list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.orphans.store') }}" method="POST" class="edit-form">
    @csrf

    <input name="name" value="{{ old('name') }}" placeholder="الاسم" class="w-full p-2 border rounded" required>
    
    <input name="guardian_phone" value="{{ old('guardian_phone') }}" placeholder="رقم ولي الأمر" class="w-full p-2 border rounded">
    
    <input name="address" value="{{ old('address') }}" placeholder="العنوان" class="w-full p-2 border rounded">
    
    <input name="age" type="number" value="{{ old('age') }}" placeholder="العمر" class="w-full p-2 border rounded">
    
    <select name="status" class="w-full p-2 border rounded" required>
        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>متاح</option>
        <option value="sponsored" {{ old('status') == 'sponsored' ? 'selected' : '' }}>مكفول</option>
    </select>

    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection

