@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">الرسائل الواردة</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<!-- ✅ لف الجدول في ديف يسمح بالتمرير -->
<div class="overflow-x-auto">
    <table class="min-w-[700px] w-full bg-white shadow rounded text-sm">
        <thead class="bg-[#e74c3c] text-white">
            <tr>
                <th class="p-2 whitespace-nowrap">#</th>
                <th class="p-2 whitespace-nowrap">الاسم</th>
                <th class="p-2 whitespace-nowrap">البريد</th>
                <th class="p-2 whitespace-nowrap">الموضوع</th>
                <th class="p-2 whitespace-nowrap">الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $index => $message)
            <tr class="border-t hover:bg-gray-50 text-center">
                <td class="p-2">{{ $index + 1 }}</td>
                <td class="p-2">{{ $message->name }}</td>
                <td class="p-2">{{ $message->email }}</td>
                <td class="p-2">{{ $message->subject ?? '-' }}</td>
                <td class="p-2">
                    <div class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('admin.messages.show', $message->id) }}" class="btn-action btn-show">عرض</a>
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">حذف</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
