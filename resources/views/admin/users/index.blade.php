@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminuser.title') }}</h1>

<a href="{{ route('admin.users.create') }}" class="btn-login mb-4 inline-block">{{ __('adminuser.new_user') }}</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
        {{ __('adminuser.success') }}
    </div>
@endif

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="p-2">{{ __('adminuser.table.id') }}</th>
            <th class="p-2">{{ __('adminuser.table.name') }}</th>
            <th class="p-2">{{ __('adminuser.table.email') }}</th>
            <th class="p-2">{{ __('adminuser.table.role') }}</th>
            <th class="p-2">{{ __('adminuser.table.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-t text-center">
            <td class="p-2">{{ $loop->iteration }}</td>
            <td class="p-2">{{ $user->name }}</td>
            <td class="p-2">{{ $user->email }}</td>
            <td class="p-2">{{ $user->role }}</td>
            <td class="p-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn-action btn-edit">
                    {{ __('adminuser.table.edit') }}
                </a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn-action btn-delete" onclick="return confirm('{{ __('adminuser.table.confirm_delete') }}')">
                        {{ __('adminuser.table.delete') }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
