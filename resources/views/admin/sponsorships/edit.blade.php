@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]"
>{{ __('adminsponsorship.edit_title') }}</h1>

<form action="{{ route('admin.sponsorships.update', $sponsorship->id) }}" method="POST" class="edit-form">
    @csrf
    @method('PUT')

    <select name="sponsor_id" class="w-full p-2 border rounded" required>
        @foreach($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}" {{ $sponsorship->sponsor_id == $sponsor->id ? 'selected' : '' }}>
                {{ $sponsor->name }}
            </option>
        @endforeach
    </select>

    <select name="orphan_id" class="w-full p-2 border rounded" required>
        @foreach($orphans as $orphan)
            <option value="{{ $orphan->id }}" {{ $sponsorship->orphan_id == $orphan->id ? 'selected' : '' }}>
                {{ $orphan->name }}
            </option>
        @endforeach
    </select>

    <input name="sponsorship_type" class="w-full p-2 border rounded" value="{{ $sponsorship->sponsorship_type }}">
    <input type="date" name="start_date" class="w-full p-2 border rounded" value="{{ $sponsorship->start_date }}">
    <input name="sponsored_for" class="w-full p-2 border rounded" value="{{ $sponsorship->sponsored_for }}">
    <input type="number" name="number_of_orphans" class="w-full p-2 border rounded" min="1" value="{{ $sponsorship->number_of_orphans }}">

    <select name="status" class="w-full p-2 border rounded" required>
        <option value="active" {{ $sponsorship->status === 'active' ? 'selected' : '' }}>{{ __('adminsponsorship.active') }}</option>
        <option value="ended" {{ $sponsorship->status === 'ended' ? 'selected' : '' }}>{{ __('adminsponsorship.ended') }}</option>
    </select>

    <button type="submit" class="btn-login">{{ __('adminsponsorship.update') }}</button>
</form>
@endsection
