@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminnews.edit_news') }}</h1>

<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @csrf
    @method('PUT')

    <input 
        name="title" 
        placeholder="{{ __('adminnews.title_placeholder') }}" 
        value="{{ old('title', app()->getLocale() === 'en' ? $news->title_en : $news->title) }}" 
        class="w-full p-2 border rounded" 
        required
    >

    @if($news->image)
        <div>
            <img src="{{ asset('storage/' . $news->image) }}" class="w-32 h-32 object-cover mb-2" alt="{{ __('adminnews.edit_news') }}">
        </div>
    @endif

    <input type="file" name="image" class="w-full p-2 border rounded">

    <textarea 
        name="content" 
        placeholder="{{ __('adminnews.content_placeholder') }}" 
        rows="6" 
        class="w-full p-2 border rounded" 
        required
    >{{ old('content', app()->getLocale() === 'en' ? $news->content_en : $news->content) }}</textarea>

    <button type="submit" class="btn-login">{{ __('adminnews.update_button') }}</button>
</form>
@endsection
