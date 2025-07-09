@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">قائمة المشاريع</h1>

<a href="{{ route('admin.projects.create') }}" class="btn-login inline-block mb-4">إضافة مشروع جديد</a>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white rounded shadow text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">اسم المشروع</th>
            <th class="p-2">الرمز</th>
            <th class="p-2">المبلغ المستهدف</th>
            <th class="p-2">نسبة التبرع</th>
            <th class="p-2">الأيقونة</th>
            <th class="p-2">الصورة</th>
            <th class="p-2">الخيارات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $index => $project)
            @php
                $percentage = $project->goal_amount > 0
                    ? round(($project->raised_amount / $project->goal_amount) * 100)
                    : 0;
            @endphp
            <tr class="border-t hover:bg-gray-50">
                <td class="p-2 text-center">{{ $index + 1 }}</td>
                <td class="p-2 text-center">{{ $project->name }}</td>
                <td class="p-2 text-center">{{ $project->code }}</td>
                <td class="p-2 text-center">{{ number_format($project->goal_amount, 2) }} د.أ</td>
                <td class="p-2">
                    <div class="w-full bg-gray-200 rounded h-5 overflow-hidden">
                        <div class="@if($percentage < 50) bg-red-500 @elseif($percentage < 80) bg-yellow-500 @else bg-green-600 @endif h-5 text-xs text-white text-center" style="width: {{ $percentage }}%">
                            {{ $percentage }}%
                        </div>
                    </div>
                </td>
                <td class="p-2 text-center">
                    @if ($project->icon)
                        <i class="{{ $project->icon }} text-lg"></i>
                    @else
                        -
                    @endif
                </td>
                <td class="p-2 text-center">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="صورة" class="table-img">
                    @else
                        لا يوجد
                    @endif
                </td>
                <td class="p-2 text-center">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-action btn-edit">تعديل</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
