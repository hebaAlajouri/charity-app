@extends('admin.layout')

@section('content')
@php
    $isRtl = app()->getLocale() === 'ar';
@endphp
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 mb-4">
            {{ __('adminorphanapplication.title') }}
        </h2>

        <a href="{{ route('admin.orphan_applications.create') }}" class="btn-login mb-4 inline-block">
            {{ __('adminorphanapplication.add_new') }}
        </a>

        <div class="overflow-x-auto w-full">
            <table class="min-w-[900px] w-full text-sm text-right bg-white rounded shadow">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.number') }}</th>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.orphan_name') }}</th>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.guardian_name') }}</th>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.status') }}</th>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.created_at') }}</th>
                        <th class="py-2 px-4 border">{{ __('adminorphanapplication.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $index => $application)
                        <tr class="border-b hover:bg-gray-50 text-center">
                            <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $application->orphan_name }}</td>
                            <td class="py-2 px-4 border">{{ $application->guardian_name }}</td>
                            <td class="py-2 px-4 border">
                                @switch($application->status)
                                    @case('approved')
                                        <span class="text-green-600">{{ __('adminorphanapplication.approved') }}</span>
                                        @break
                                    @case('rejected')
                                        <span class="text-red-600">{{ __('adminorphanapplication.rejected') }}</span>
                                        @break
                                    @case('under_review')
                                        <span class="text-yellow-600">{{ __('adminorphanapplication.under_review') }}</span>
                                        @break
                                    @default
                                        <span class="text-gray-500">{{ __('adminorphanapplication.pending') }}</span>
                                @endswitch
                            </td>
                            <td class="py-2 px-4 border">{{ $application->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border">
                                <div class="flex flex-wrap justify-center gap-2">
                                    <a href="{{ route('admin.orphan_applications.show', $application->id) }}" class="btn-action btn-show">
                                        {{ __('adminorphanapplication.show') }}
                                    </a>
                                    <a href="{{ route('admin.orphan_applications.edit', $application->id) }}" class="btn-action btn-edit">
                                        {{ __('adminorphanapplication.edit') }}
                                    </a>
                                    <form action="{{ route('admin.orphan_applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('{{ __('adminorphanapplication.confirm_delete') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            {{ __('adminorphanapplication.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">
                                {{ __('adminorphanapplication.no_requests') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-action {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.2s;
        display: inline-block;
    }

    .btn-show {
        background-color: #10b981;
        color: white;
    }

    .btn-show:hover {
        background-color: #059669;
    }

    .btn-edit {
        background-color: #3b82f6;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2563eb;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }

    @media (max-width: 640px) {
        h2 {
            font-size: 1.25rem;
        }

        .btn-action {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        table th, table td {
            font-size: 0.75rem;
            padding: 0.5rem;
        }
    }
</style>
@endsection
