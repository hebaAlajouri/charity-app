@extends('admin.layout')

@section('content')
<div class="show-box">
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">عرض الرسالة</h1>

<div class="bg-white p-6 shadow rounded space-y-4 text-sm">
    <div><strong>الاسم:</strong> {{ $message->name }}</div>
    <div><strong>البريد الإلكتروني:</strong> {{ $message->email }}</div>
    @if($message->phone)
        <div><strong>رقم الهاتف:</strong> {{ $message->phone }}</div>
    @endif
    @if($message->subject)
        <div><strong>الموضوع:</strong> {{ $message->subject }}</div>
    @endif
    <div><strong>الرسالة:</strong>
        <p class="mt-2 p-2 bg-gray-100 rounded">{{ $message->message }}</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn-login inline-block mt-4">الرجوع</a>
</div>
</div>
@endsection
