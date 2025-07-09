@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">تعديل بيانات المستخدم</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST"  class="edit-form">
    @csrf
    @method('PUT')
    <input name="name" value="{{ $user->name }}" class="w-full p-2 border rounded" required>
    <input name="email" type="email" value="{{ $user->email }}" class="w-full p-2 border rounded" required>
    <input name="phone" value="{{ $user->phone }}" class="w-full p-2 border rounded">
    <input name="address" value="{{ $user->address }}" class="w-full p-2 border rounded">
    <input name="password" type="password" placeholder="كلمة مرور جديدة (اختياري)" class="w-full p-2 border rounded">

    <select name="role" class="w-full p-2 border rounded" required>
        <option value="user" @selected($user->role == 'user')>مستخدم</option>
        <option value="admin" @selected($user->role == 'admin')>مشرف</option>
    </select>

    <button type="submit" class="btn-login">تحديث</button>
</form>
@endsection
