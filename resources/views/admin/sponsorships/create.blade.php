@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة كفالة جديدة</h1>

<form action="{{ route('admin.sponsorships.store') }}" method="POST" class="edit-form">
    @csrf

    <select name="sponsor_id" class="w-full p-2 border rounded" required>
        <option disabled selected>اختر الكافل</option>
        @foreach($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
        @endforeach
    </select>

    <select name="orphan_id" class="w-full p-2 border rounded" required>
        <option disabled selected>اختر اليتيم</option>
        @foreach($orphans as $orphan)
            <option value="{{ $orphan->id }}">{{ $orphan->name }}</option>
        @endforeach
    </select>

    <input name="sponsorship_type" class="w-full p-2 border rounded" placeholder="نوع الكفالة">
    <input type="date" name="start_date" class="w-full p-2 border rounded">
    <input name="sponsored_for" class="w-full p-2 border rounded" placeholder="مكفول من أجل">
    <input type="number" name="number_of_orphans" class="w-full p-2 border rounded" min="1" value="1">

    <select name="status" class="w-full p-2 border rounded" required>
        <option value="active">نشطة</option>
        <option value="ended">منتهية</option>
    </select>

    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection
