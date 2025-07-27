@extends('admin.layout')

@section('content')
<div class="show-box">
    <h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminmessages.show_message') }}</h1>

    <div class="bg-white p-6 shadow rounded space-y-4 text-sm">
        <div><strong>{{ __('adminmessages.name') }}:</strong> {{ $message->name }}</div>
        <div><strong>{{ __('adminmessages.email') }}:</strong> {{ $message->email }}</div>
        
        @if($message->phone)
            <div><strong>{{ __('adminmessages.phone') }}:</strong> {{ $message->phone }}</div>
        @endif
        
        @if($message->subject)
            <div><strong>{{ __('adminmessages.subject') }}:</strong> {{ $message->subject }}</div>
        @endif
        
        <div>
            <strong>{{ __('adminmessages.message') }}:</strong>
            <p class="mt-2 p-2 bg-gray-100 rounded">{{ $message->message }}</p>
        </div>
        
        <a href="{{ route('admin.messages.index') }}" class="btn-login inline-block mt-4">
            {{ __('adminmessages.back') }}
        </a>
    </div>
</div>
@endsection
