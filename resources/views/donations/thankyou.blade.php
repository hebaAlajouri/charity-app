<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10 text-center">
        <h1 class="text-3xl font-bold mb-6 text-green-700">{{ __('thankyou.thanks_title') }}</h1>

        <p class="mb-4 text-gray-700">
            {{ __('thankyou.thanks_message', ['amount' => number_format($donation->amount, 2), 'project' => $donation->project->name]) }}
        </p>

        <a href="{{ route('projects') }}" class="bg-indigo-600 text-white px-6 py-3 rounded font-semibold hover:bg-indigo-700">
            {{ __('thankyou.support_another') }}
        </a>
    </div>
</x-app-layout>
