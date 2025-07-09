<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 rtl">
        <div class="bg-white p-8 rounded-xl shadow-lg max-w-xl w-full text-center">
            <h2 class="text-2xl font-bold text-indigo-700 mb-4">التقديم على وظيفة: {{ $job->title }}</h2>
            <p class="text-gray-700 mb-6">
                للتقديم على هذه الوظيفة، يرجى إرسال سيرتك الذاتية إلى البريد الإلكتروني التالي:
            </p>
            <div class="bg-gray-100 p-4 rounded-lg text-lg font-semibold text-indigo-600">
                📧 {{ $hrEmail }}
            </div>
            <p class="text-sm text-gray-500 mt-4">
                يُرجى ذكر اسم الوظيفة في عنوان الرسالة (Subject) عند الإرسال.
            </p>

            <a href="{{ route('careers.show', $job) }}" class="mt-6 inline-block text-sm text-indigo-500 hover:underline">
                ← العودة إلى تفاصيل الوظيفة
            </a>
        </div>
    </div>
</x-app-layout>
