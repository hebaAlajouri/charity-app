@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">التقارير</h1>

<a href="{{ route('admin.reports.create') }}" class="btn-login mb-4 inline-block">إضافة تقرير جديد</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">العنوان</th>
            <th class="p-2">الفئة</th>
            <th class="p-2">تاريخ النشر</th>
            <th class="p-2">ملف التقرير</th>
            <th class="p-2">الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $index => $report)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2 text-center">{{ $index + 1 }}</td>
            <td class="p-2">{{ $report->title }}</td>
            <td class="p-2">{{ $report->category ?? '-' }}</td>
            <td class="p-2">{{ $report->published_at ? $report->published_at->format('Y-m-d') : '-' }}</td>
            <td class="p-2 text-center">
                @if($report->file_path)
                    <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="text-blue-600 underline">عرض الملف</a>
                @else
                    -
                @endif
            </td>
            <td class="p-2 text-center">
                <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn-action btn-edit">تعديل</a>
                <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
