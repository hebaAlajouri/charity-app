<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10 text-center">
        <h1 class="text-3xl font-bold mb-6 text-green-700">شكراً لتبرعك!</h1>

        <p class="mb-4 text-gray-700">
            لقد تم تسجيل تبرعك بقيمة <strong>{{ number_format($donation->amount, 2) }} د.أ</strong> لمشروع 
            <strong>{{ $donation->project->name }}</strong>.
        </p>

        


        <a href="{{ route('projects') }}" class="bg-indigo-600 text-white px-6 py-3 rounded font-semibold hover:bg-indigo-700">
            ادعم مشروع آخر
        </a>
    </div>
</x-app-layout>
