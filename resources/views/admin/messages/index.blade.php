@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">الرسائل الواردة</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">الاسم</th>
            <th class="p-2">البريد</th>
            <th class="p-2">الموضوع</th>
            <th class="p-2">الخيارات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $index => $message)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2 text-center">{{ $index + 1 }}</td>
            <td class="p-2 text-center">{{ $message->name }}</td>
            <td class="p-2 text-center">{{ $message->email }}</td>
            <td class="p-2 text-center">{{ $message->subject ?? '-' }}</td>
            <td class="p-2 text-center">
                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn-action btn-show">عرض</a>
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
