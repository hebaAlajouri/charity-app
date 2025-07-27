@extends('admin.layout')

@section('content')
@php
    $dir = app()->getLocale() === 'ar' ? 'rtl' : 'ltr';
    $textAlign = $dir === 'rtl' ? 'text-right' : 'text-left';
@endphp

<div class="{{ $textAlign }}" dir="{{ $dir }}">
    <h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminmessages.title') }}</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ __('adminmessages.success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-[700px] w-full bg-white shadow rounded text-sm">
            <thead class="bg-[#e74c3c] text-white">
                <tr>
                    <th class="p-2 whitespace-nowrap">{{ __('adminmessages.index') }}</th>
                    <th class="p-2 whitespace-nowrap">{{ __('adminmessages.name') }}</th>
                    <th class="p-2 whitespace-nowrap">{{ __('adminmessages.email') }}</th>
                    <th class="p-2 whitespace-nowrap">{{ __('adminmessages.subject') }}</th>
                    <th class="p-2 whitespace-nowrap">{{ __('adminmessages.options') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $index => $message)
                <tr class="border-t hover:bg-gray-50 text-center">
                    <td class="p-2">{{ $index + 1 }}</td>
                    <td class="p-2">{{ $message->name }}</td>
                    <td class="p-2">{{ $message->email }}</td>
                    <td class="p-2">{{ $message->subject ?? __('adminmessages.empty_subject') }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap justify-center gap-2">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn-action btn-show">
                                {{ __('adminmessages.view') }}
                            </a>
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('{{ __('adminmessages.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    {{ __('adminmessages.delete') }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
