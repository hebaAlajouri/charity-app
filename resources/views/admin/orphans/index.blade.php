@extends('admin.layout')

@section('content')
<h1 class="text-2xl mb-4 text-[#e74c3c]">{{ __('adminorphan.title') }}</h1>

<a href="{{ route('admin.orphans.create') }}" class="btn-login">
    {{ __('adminorphan.add_orphan') }}
</a>

@if (session('success'))
    <div class="text-green-600 mt-4">{{ __('adminorphan.success') }}</div>
@endif

<div class="overflow-x-auto mt-4">
    <table class="w-full bg-white shadow rounded text-right min-w-[600px]">
        <thead>
            <tr>
                <th class="p-2">{{ __('adminorphan.name') }}</th>
                <th class="p-2">{{ __('adminorphan.age') }}</th>
                <th class="p-2">{{ __('adminorphan.phone') }}</th>
                <th class="p-2">{{ __('adminorphan.address') }}</th>
                <th class="p-2">{{ __('adminorphan.status') }}</th>
                <th class="p-2">{{ __('adminorphan.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orphans as $orphan)
                <tr class="border-t">
                    <td class="p-2">{{ $orphan->name }}</td>
                    <td class="p-2">{{ $orphan->age }}</td>
                    <td class="p-2">{{ $orphan->guardian_phone }}</td>
                    <td class="p-2">{{ $orphan->address }}</td>
                    <td class="p-2">{{ $orphan->status }}</td>
                    <td class="p-2 whitespace-nowrap">
                        <a href="{{ route('admin.orphans.edit', $orphan) }}" class="btn-action btn-edit">
                            {{ __('adminorphan.edit') }}
                        </a>
                        <form action="{{ route('admin.orphans.destroy', $orphan) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="btn-action btn-delete" onclick="return confirm('{{ __('adminorphan.confirm_delete') }}')">
                                {{ __('adminorphan.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
