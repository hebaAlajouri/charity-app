@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminproject.project_list') }}</h1>

<a href="{{ route('admin.projects.create') }}" class="btn-login inline-block mb-4">{{ __('adminproject.add_project') }}</a>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ __('adminproject.success') }}
    </div>
@endif

<table class="min-w-full bg-white rounded shadow text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">{{ __('adminproject.table.index') }}</th>
            <th class="p-2">{{ __('adminproject.table.name') }}</th>
            <th class="p-2">{{ __('adminproject.table.code') }}</th>
            <th class="p-2">{{ __('adminproject.table.goal_amount') }}</th>
            <th class="p-2">{{ __('adminproject.table.donation_percentage') }}</th>
            <th class="p-2">{{ __('adminproject.table.icon') }}</th>
            <th class="p-2">{{ __('adminproject.table.image') }}</th>
            <th class="p-2">{{ __('adminproject.table.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $index => $project)
            @php
                $percentage = $project->goal_amount > 0
                    ? round(($project->raised_amount / $project->goal_amount) * 100)
                    : 0;
            @endphp
            <tr class="border-t hover:bg-gray-50">
                <td class="p-2 text-center">{{ $index + 1 }}</td>
           <td class="p-2 text-center">
    {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
</td>

                <td class="p-2 text-center">{{ $project->code }}</td>
                <td class="p-2 text-center">{{ number_format($project->goal_amount, 2) }} د.أ</td>
                <td class="p-2">
                    <div class="w-full bg-gray-200 rounded h-5 overflow-hidden">
                        <div class="@if($percentage < 50) bg-red-500 @elseif($percentage < 80) bg-yellow-500 @else bg-green-600 @endif h-5 text-xs text-white text-center" style="width: {{ $percentage }}%">
                            {{ $percentage }}%
                        </div>
                    </div>
                </td>
                <td class="p-2 text-center">
                    @if ($project->icon)
                        <i class="{{ $project->icon }} text-lg"></i>
                    @else
                        -
                    @endif
                </td>
                <td class="p-2 text-center">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ __('adminproject.table.image') }}" class="table-img">
                    @else
                        {{ __('adminproject.table.no_image') }}
                    @endif
                </td>
                <td class="p-2 text-center">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-action btn-edit">{{ __('adminproject.edit') }}</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('adminproject.table.delete_confirm') }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">{{ __('adminproject.delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
