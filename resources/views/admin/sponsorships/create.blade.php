@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">
{{ __('adminsponsorship.create_title') }}

</h1>

<form action="{{ route('admin.sponsorships.store') }}" method="POST" class="edit-form">
    @csrf

    <select name="sponsor_id" class="w-full p-2 border rounded" required>
        <option disabled selected> {{ __('adminsponsorship.pick') }}
</option>
        @foreach($sponsors as $sponsor)
            <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
        @endforeach
    </select>

    <select name="orphan_id" class="w-full p-2 border rounded" required>
        <option disabled selected>
{{ __('adminsponsorship.pick_orphan') }}


        </option>
        @foreach($orphans as $orphan)
            <option value="{{ $orphan->id }}">{{ $orphan->name }}</option>
        @endforeach
    </select>

    <input name="sponsorship_type" class="w-full p-2 border rounded" placeholder="{{ __('adminsponsorship.sponsorship_type') }}">
    <input type="date" name="start_date" class="w-full p-2 border rounded">
    <input name="sponsored_for" class="w-full p-2 border rounded" placeholder="{{ __('adminsponsorship.sponsored_for') }}">
    <input type="number" name="number_of_orphans" class="w-full p-2 border rounded" min="1" value="1">

    <select name="status" class="w-full p-2 border rounded" required>
        <option value="active">{{ __('adminsponsorship.active') }}</option>
        <option value="ended">{{ __('adminsponsorship.ended') }}</option>
    </select>

    <button type="submit" class="btn-login">{{ __('adminsponsorship.save') }}</button>
</form>
@endsection
