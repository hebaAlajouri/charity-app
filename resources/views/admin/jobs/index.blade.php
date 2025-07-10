@extends('admin.layout')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">الوظائف</h1>

<a href="{{ route('admin.jobs.create') }}" class="btn-login mb-4 inline-block">إضافة وظيفة جديدة</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded text-sm">
        <thead class="bg-[#e74c3c] text-white">
            <tr>
                <th class="p-2 whitespace-nowrap">#</th>
                <th class="p-2 whitespace-nowrap">العنوان</th>
                <th class="p-2 whitespace-nowrap">الموقع</th>
                <th class="p-2 whitespace-nowrap">النوع</th>
                <th class="p-2 whitespace-nowrap">الموعد النهائي</th>
                <th class="p-2 whitespace-nowrap">الحالة</th>
                <th class="p-2 whitespace-nowrap">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $index => $job)
            <tr class="border-t hover:bg-gray-50 text-center">
                <td class="p-2">{{ $index + 1 }}</td>
                <td class="p-2">{{ $job->title }}</td>
                <td class="p-2">{{ $job->location ?? '-' }}</td>
                <td class="p-2">{{ $job->type }}</td>
                <td class="p-2">{{ $job->deadline ? $job->deadline->format('Y-m-d') : '-' }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 text-xs rounded {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $job->is_active ? 'نشطة' : 'غير نشطة' }}
                    </span>
                </td>
                <td class="p-2">
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
</div>

<style>
    .btn-login {
        background-color: #e74c3c;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-login:hover {
        background-color: #c0392b;
    }

    .btn-action {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
        margin: 0.125rem;
    }

    .btn-edit {
        background-color: #3b82f6;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2563eb;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }

    /* Responsive text size (optional) */
    @media (max-width: 640px) {
        h1 {
            font-size: 1.25rem;
        }

        table th,
        table td {
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .btn-login {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
    }
</style>

@endsection
