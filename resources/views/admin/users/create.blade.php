@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminuser.title_create') }}</h1>

<form action="{{ route('admin.users.store') }}" method="POST" class="edit-form">
    @csrf
    <input name="name" placeholder="{{ __('adminuser.name') }}" class="w-full p-2 border rounded" required>
    <input name="email" type="email" placeholder="{{ __('adminuser.email') }}" class="w-full p-2 border rounded" required>
    <input name="phone" placeholder="{{ __('adminuser.phone') }}" class="w-full p-2 border rounded">
    <input name="address" placeholder="{{ __('adminuser.address') }}" class="w-full p-2 border rounded">
    <input name="password" type="password" placeholder="{{ __('adminuser.password') }}" class="w-full p-2 border rounded" required>

    <select name="role" class="w-full p-2 border rounded" required>
        <option value="user">{{ __('adminuser.role_user') }}</option>
        <option value="admin">{{ __('adminuser.role_admin') }}</option>
    </select>

    <button type="submit" class="btn-login">{{ __('adminuser.save') }}</button>
</form>
@endsection
