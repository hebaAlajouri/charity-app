@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4 text-[#e74c3c]">{{ __('adminreport.title') }}</h1>

<a href="{{ route('admin.reports.create') }}" class="btn-login mb-4 inline-block">{{ __('adminreport.add_new') }}</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white shadow rounded text-sm">
    <thead class="bg-[#e74c3c] text-white">
        <tr>
            <th class="p-2">{{ __('adminreport.table.number') }}</th>
            <th class="p-2">{{ __('adminreport.table.title') }}</th>
            <th class="p-2">{{ __('adminreport.table.category') }}</th>
            <th class="p-2">{{ __('adminreport.table.published_at') }}</th>
            <th class="p-2">{{ __('adminreport.table.file') }}</th>
            <th class="p-2">{{ __('adminreport.table.actions') }}</th>
        </tr>
    </thead>
  <tbody>
    @foreach($reports as $index => $report)
    <tr class="border-t hover:bg-gray-50">
        <td class="p-2 text-center">{{ $index + 1 }}</td>
        <td class="p-2">{{ $report->localized_title }}</td>
        <td class="p-2">{{ $report->localized_category ?? '-' }}</td>
        <td class="p-2">{{ $report->published_at ? $report->published_at->format('Y-m-d') : '-' }}</td>
        <td class="p-2 text-center">
            @if($report->file_path)
                <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="text-blue-600 underline">{{ __('adminreport.table.view_file') }}</a>
            @else
                -
            @endif
        </td>
        <td class="p-2 text-center">
            <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn-action btn-edit">{{ __('adminreport.table.edit') }}</a>
            <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('adminreport.table.delete_confirm') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-action btn-delete">{{ __('adminreport.table.delete') }}</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

</table>
@endsection
