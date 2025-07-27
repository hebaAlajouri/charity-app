@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminsponsorship.title') }}</h1>

<a href="{{ route('admin.sponsorships.create') }}" class="btn-login mb-4 inline-block">
    {{ __('adminsponsorship.add_sponsorship') }}
</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">{{ __('adminsponsorship.sponsor') }}</th>
            <th class="p-2">{{ __('adminsponsorship.orphan') }}</th>
            <th class="p-2">{{ __('adminsponsorship.status') }}</th>
            <th class="p-2">{{ __('adminsponsorship.options') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sponsorships as $index => $s)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2 text-center">{{ $index + 1 }}</td>
            <td class="p-2 text-center">{{ $s->sponsor->name }}</td>
            <td class="p-2 text-center">{{ $s->orphan->name }}</td>
            <td class="p-2 text-center">
                {{ $s->status === 'active' ? __('adminsponsorship.active') : __('adminsponsorship.ended') }}
            </td>
            <td class="p-2 text-center">
                <a href="{{ route('admin.sponsorships.edit', $s->id) }}" class="btn-action btn-edit">
                    {{ __('adminsponsorship.edit') }}
                </a>

                <form action="{{ route('admin.sponsorships.destroy', $s->id) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('adminsponsorship.delete_confirm') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">
                        {{ __('adminsponsorship.delete') }}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
