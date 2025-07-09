@extends('admin.layout')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">الوظائف</h1>

<a href="{{ route('admin.jobs.create') }}" class="btn-login mb-4 inline-block">إضافة وظيفة جديدة</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">العنوان</th>
            <th class="p-2">الموقع</th>
            <th class="p-2">النوع</th>
            <th class="p-2">الموعد النهائي</th>
            <th class="p-2">الحالة</th>
            <th class="p-2">الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $index => $job)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2 text-center">{{ $jobs->firstItem() + $index }}</td>
            <td class="p-2">{{ $job->title }}</td>
            <td class="p-2">{{ $job->location ?? '-' }}</td>
            <td class="p-2">{{ $job->type }}</td>
            <td class="p-2">{{ $job->deadline ? $job->deadline->format('Y-m-d') : '-' }}</td>
            <td class="p-2">{{ $job->is_active ? 'نشطة' : 'غير نشطة' }}</td>
            <td class="p-2 text-center">
                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn-action btn-edit">تعديل</a>
                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $jobs->links() }}
</div>
@endsection
