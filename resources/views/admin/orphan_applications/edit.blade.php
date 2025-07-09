@extends('admin.layout')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">تعديل طلب كفالة اليتيم</h1>

    <form action="{{ route('admin.orphan_applications.update', $orphan_application->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-semibold mb-2">الحالة</label>
            <select name="status" id="status" class="w-full border rounded px-3 py-2">
                <option value="pending" {{ old('status', $orphan_application->status) == 'pending' ? 'selected' : '' }}>بانتظار</option>
                <option value="under_review" {{ old('status', $orphan_application->status) == 'under_review' ? 'selected' : '' }}>قيد المراجعة</option>
                <option value="approved" {{ old('status', $orphan_application->status) == 'approved' ? 'selected' : '' }}>مقبول</option>
                <option value="rejected" {{ old('status', $orphan_application->status) == 'rejected' ? 'selected' : '' }}>مرفوض</option>
            </select>
            @error('status')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="admin_notes" class="block text-gray-700 font-semibold mb-2">ملاحظات المشرف</label>
            <textarea name="admin_notes" id="admin_notes" rows="4" class="w-full border rounded px-3 py-2">{{ old('admin_notes', $orphan_application->admin_notes) }}</textarea>
            @error('admin_notes')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            حفظ التغييرات
        </button>
    </form>
</div>
@endsection
