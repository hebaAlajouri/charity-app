@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminuser.edit_title') }}</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST" class="edit-form">
    @csrf
    @method('PUT')
    
    <input name="name" value="{{ $user->name }}" 
           placeholder="{{ __('adminuser.name_edit') }}" 
           class="w-full p-2 border rounded" required>

    <input name="email" type="email" value="{{ $user->email }}" 
           placeholder="{{ __('adminuser.email_edit') }}" 
           class="w-full p-2 border rounded" required>

    <input name="phone" value="{{ $user->phone }}" 
           placeholder="{{ __('adminuser.phone_edit') }}" 
           class="w-full p-2 border rounded">

    <input name="address" value="{{ $user->address }}" 
           placeholder="{{ __('adminuser.address_edit') }}" 
           class="w-full p-2 border rounded">

    <input name="password" type="password" 
           placeholder="{{ __('adminuser.new_password_edit') }}" 
           class="w-full p-2 border rounded">

    <select name="role" class="w-full p-2 border rounded" required>
        <option value="user" @selected($user->role == 'user')>{{ __('adminuser.user_edit') }}</option>
        <option value="admin" @selected($user->role == 'admin')>{{ __('adminuser.admin_edit') }}</option>
    </select>

    <button type="submit" class="btn-login">{{ __('adminuser.update_button') }}</button>
</form>
@endsection
