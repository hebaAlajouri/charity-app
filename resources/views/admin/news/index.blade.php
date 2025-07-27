@extends('admin.layout')

@section('content')
@php
    $dir = app()->getLocale() === 'ar' ? 'rtl' : 'ltr';
    $align = app()->getLocale() === 'ar' ? 'text-right' : 'text-left';
@endphp

<div dir="{{ $dir }}" class="{{ $align }}">
    <h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminnews.title') }}</h1>

    <a href="{{ route('admin.news.create') }}" class="btn-login mb-4 inline-block">
        {{ __('adminnews.add_news') }}
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ __('adminnews.success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow rounded text-sm">
        <thead class="bg-[#e74c3c] text-white">
            <tr>
                <th class="p-2">{{ __('adminnews.id') }}</th>
                <th class="p-2">{{ __('adminnews.news_title') }}</th>
                <th class="p-2">{{ __('adminnews.image') }}</th>
                <th class="p-2">{{ __('adminnews.actions') }}</th>
            </tr>
        </thead>
        <tbody>
    @foreach($news as $index => $n)
    <tr class="border-t hover:bg-gray-50">
        <td class="p-2 text-center">{{ $index + 1 }}</td>
        <td class="p-2">
            {{ app()->getLocale() === 'en' && $n->title_en ? $n->title_en : $n->title }}
        </td>
        <td class="p-2">
            @if($n->image)
                <img src="{{ asset('storage/' . $n->image) }}" class="table-img" alt="news image">
            @else
                <span>{{ __('adminnews.no_image') }}</span>
            @endif
        </td>
        <td class="p-2 text-center">
            <a href="{{ route('admin.news.edit', $n->id) }}" class="btn-action btn-edit">{{ __('adminnews.edit') }}</a>
            <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="inline-block"
                  onsubmit="return confirm('{{ __('adminnews.confirm_delete') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-action btn-delete">{{ __('adminnews.delete') }}</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
