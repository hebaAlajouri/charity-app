@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إضافة مستخدم جديد</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="edit-form">
    @csrf
    <input name="name" placeholder="الاسم" class="w-full p-2 border rounded" required>
    <input name="email" type="email" placeholder="البريد الإلكتروني" class="w-full p-2 border rounded" required>
    <input name="phone" placeholder="رقم الهاتف" class="w-full p-2 border rounded">
    <input name="address" placeholder="العنوان" class="w-full p-2 border rounded">
    <input name="password" type="password" placeholder="كلمة المرور" class="w-full p-2 border rounded" required>

    <select name="role" class="w-full p-2 border rounded" required>
        <option value="user">مستخدم</option>
        <option value="admin">مشرف</option>
    </select>

    <button type="submit" class="btn-login">حفظ</button>
</form>
@endsection
