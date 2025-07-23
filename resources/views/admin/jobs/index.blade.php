@extends('admin.layout')

@section('content')

<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminjob.title') }}</h1>

<a href="{{ route('admin.jobs.create') }}" class="btn-login mb-4 inline-block">{{ __('adminjob.add_new') }}</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ __('adminjob.success') }}</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded text-sm">
        <thead class="bg-[#e74c3c] text-white">
            <tr>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.id') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.job_title') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.location') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.type') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.deadline') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.status') }}</th>
                <th class="p-2 whitespace-nowrap">{{ __('adminjob.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $index => $job)
            <tr class="border-t hover:bg-gray-50 text-center">
                <td class="p-2">{{ $index + 1 }}</td>
                <td class="p-2">
                    {{ app()->getLocale() === 'ar' ? $job->title : ($job->title_en ?? $job->title) }}
                </td>
                <td class="p-2">
                    {{ app()->getLocale() === 'ar' ? $job->location : ($job->location_en ?? $job->location) }}
                </td>
                <td class="p-2">
                    @php
                        $types = [
                            'دوام كامل' => ['ar' => 'دوام كامل', 'en' => 'Full Time'],
                            'دوام جزئي' => ['ar' => 'دوام جزئي', 'en' => 'Part Time'],
                            'متطوع'     => ['ar' => 'متطوع', 'en' => 'Volunteer'],
                        ];
                    @endphp
                    {{ $types[$job->type][app()->getLocale()] ?? $job->type }}
                </td>
                <td class="p-2">
                    {{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->locale(app()->getLocale())->isoFormat('LL') : '-' }}
                </td>
                <td class="p-2">
                    <span class="px-2 py-1 text-xs rounded {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $job->is_active ? __('adminjob.active') : __('adminjob.inactive') }}
                    </span>
                </td>
                <td class="p-2">
                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn-action btn-edit">{{ __('adminjob.edit') }}</a>
                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('adminjob.confirm_delete') }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">{{ __('adminjob.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .btn-login {
        background-color: #e74c3c;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-login:hover {
        background-color: #c0392b;
    }

    .btn-action {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
        margin: 0.125rem;
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
        h1 {
            font-size: 1.25rem;
        }

        table th,
        table td {
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .btn-login {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
    }
</style>

@endsection
