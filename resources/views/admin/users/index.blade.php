@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">إدارة المستخدمين</h1>

<a href="{{ route('admin.users.create') }}" class="btn-login mb-4 inline-block">+ مستخدم جديد</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="p-2">#</th>
            <th class="p-2">الاسم</th>
            <th class="p-2">البريد</th>
            <th class="p-2">الدور</th>
            <th class="p-2">إجراءات</th>
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
                <a href="{{ route('admin.users.edit', $user) }}" class="btn-action btn-edit">تعديل</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn-action btn-delete" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
