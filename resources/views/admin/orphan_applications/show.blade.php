@extends('admin.layout')

@section('content')
<div class="show-box">
    <h1 class="text-2xl font-bold mb-6">{{ __('adminorphanapplication.showtitle') }}</h1>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">{{ __('adminorphanapplication.guardian_info') }}</h2>
        <p><strong>{{ __('adminorphanapplication.guardian_name') }}:</strong> {{ $orphan_application->guardian_name }}</p>
        <p><strong>{{ __('adminorphanapplication.guardian_id_number') }}:</strong> {{ $orphan_application->guardian_id_number }}</p>
        <p><strong>{{ __('adminorphanapplication.guardian_phone') }}:</strong> {{ $orphan_application->guardian_phone }}</p>
        <p><strong>{{ __('adminorphanapplication.guardian_address') }}:</strong> {{ $orphan_application->guardian_address }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.orphan_info') }}</h2>
        <p><strong>{{ __('adminorphanapplication.orphan_name') }}:</strong> {{ $orphan_application->orphan_name }}</p>
        <p><strong>{{ __('adminorphanapplication.orphan_birth_date') }}:</strong> {{ $orphan_application->orphan_birth_date }}</p>
        <p><strong>{{ __('adminorphanapplication.orphan_address') }}:</strong> {{ $orphan_application->orphan_address }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.father_info') }}</h2>
        <p><strong>{{ __('adminorphanapplication.father_name') }}:</strong> {{ $orphan_application->father_name }}</p>
        <p><strong>{{ __('adminorphanapplication.father_death_date') }}:</strong> {{ $orphan_application->father_death_date }}</p>
        <p><strong>{{ __('adminorphanapplication.father_death_cause') }}:</strong> {{ $orphan_application->father_death_cause }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-4">{{ __('adminorphanapplication.additional_info') }}</h2>
        <p><strong>{{ __('adminorphanapplication.financial_situation_description') }}:</strong> {{ $orphan_application->financial_situation_description }}</p>
        <p><strong>{{ __('adminorphanapplication.housing_type') }}:</strong> {{ $orphan_application->housing_type }}</p>
        <p><strong>{{ __('adminorphanapplication.has_health_issues') }}:</strong> {{ $orphan_application->has_health_issues ? __('yes') : __('no') }}</p>
        <p><strong>{{ __('adminorphanapplication.needs_educational_support') }}:</strong> {{ $orphan_application->needs_educational_support ? __('yes') : __('no') }}</p>

        <a href="{{ route('admin.orphan_applications.edit', $orphan_application->id) }}"
           class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            {{ __('adminorphanapplication.edit_button') }}
        </a>
    </div>
</div>
@endsection
