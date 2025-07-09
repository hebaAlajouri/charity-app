@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">الأخبار</h1>

<a href="{{ route('admin.news.create') }}" class="btn-login mb-4 inline-block">إضافة خبر</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">العنوان</th>
            <th class="p-2">الصورة</th>
            <th class="p-2">الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $index => $n)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2 text-center">{{ $news->firstItem() + $index }}</td>
            <td class="p-2">{{ $n->title }}</td>
            <td class="p-2">
                @if($n->image)
                    <img src="{{ asset('storage/' . $n->image) }}" class="table-img" alt="news image">
                @else
                    <span>بدون صورة</span>
                @endif
            </td>
            <td class="p-2 text-center">
                <a href="{{ route('admin.news.edit', $n->id) }}" class="btn-action btn-edit">تعديل</a>
                <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
    {{ $news->links() }}
</div>
@endsection
