@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">طلبات كفالة الأيتام</h2>
            <a href="{{ route('orphan_applications.create') }}" class="btn-login mb-4 inline-block">إضافة طلب جديد</a>
       

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-right border">
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
                        <tr class="border-b">
                            <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $application->orphan_name }}</td>
                            <td class="py-2 px-4 border">{{ $application->guardian_name }}</td>
                            <td class="py-2 px-4 border">
                                @if($application->status == 'approved')
                                    <span class="text-green-600">مقبول</span>
                                @elseif($application->status == 'rejected')
                                    <span class="text-red-600">مرفوض</span>
                                @elseif($application->status == 'under_review')
                                    <span class="text-yellow-600">قيد المراجعة</span>
                                @else
                                    <span class="text-gray-500">بانتظار</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border">{{ $application->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border">
                                <a href="{{ route('orphan_applications.show', $application->id) }}" class="btn-action btn-show">عرض</a>
                                |
                                <a href="{{ route('orphan_applications.edit', $application->id) }}" class="btn-action btn-edit">تعديل</a>
                                |
                                <form action="{{ route('orphan_applications.destroy', $application->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">حذف</button>
                                </form>
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
@endsection
