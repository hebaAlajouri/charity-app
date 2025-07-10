@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 mb-4">طلبات كفالة الأيتام</h2>
        <a href="{{ route('orphan_applications.create') }}" class="btn-login mb-4 inline-block">إضافة طلب جديد</a>

        <!-- ✅ overflow for responsiveness -->
        <div class="overflow-x-auto w-full">
            <table class="min-w-[900px] w-full text-sm text-right bg-white rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 border">#</th>
                        <th class="py-2 px-4 border">اسم اليتيم</th>
                        <th class="py-2 px-4 border">اسم الوصي</th>
                        <th class="py-2 px-4 border">الحالة</th>
                        <th class="py-2 px-4 border">تاريخ التقديم</th>
                        <th class="py-2 px-4 border">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $index => $application)
                        <tr class="border-b hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $application->orphan_name }}</td>
                            <td class="py-2 px-4 border">{{ $application->guardian_name }}</td>
                            <td class="py-2 px-4 border">
                                @switch($application->status)
                                    @case('approved')
                                        <span class="text-green-600">مقبول</span>
                                        @break
                                    @case('rejected')
                                        <span class="text-red-600">مرفوض</span>
                                        @break
                                    @case('under_review')
                                        <span class="text-yellow-600">قيد المراجعة</span>
                                        @break
                                    @default
                                        <span class="text-gray-500">بانتظار</span>
                                @endswitch
                            </td>
                            <td class="py-2 px-4 border">{{ $application->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border">
                                <!-- ✅ wrap buttons properly -->
                                <div class="flex flex-wrap justify-center gap-2">
                                    <a href="{{ route('orphan_applications.show', $application->id) }}" class="btn-action btn-show">عرض</a>
                                    <a href="{{ route('orphan_applications.edit', $application->id) }}" class="btn-action btn-edit">تعديل</a>
                                    <form action="{{ route('orphan_applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">لا توجد طلبات حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-action {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.2s;
        display: inline-block;
    }

    .btn-show {
        background-color: #10b981;
        color: white;
    }

    .btn-show:hover {
        background-color: #059669;
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

    @media (max-width: 640px) {
        h2 {
            font-size: 1.25rem;
        }

        .btn-action {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        table th, table td {
            font-size: 0.75rem;
            padding: 0.5rem;
        }
    }
</style>
@endsection
