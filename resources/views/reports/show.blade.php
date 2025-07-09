<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-gradient-to-br from-gray-50 to-white shadow-xl rounded-2xl border border-gray-200 mt-10">

        <!-- Header with Icon -->
        <div class="flex items-center justify-between mb-6 border-b border-gray-300 pb-4">
            <div class="flex items-center gap-3">
                <i class="fas fa-file-alt text-indigo-600 text-3xl"></i>
                <h1 class="text-3xl font-extrabold text-indigo-700">{{ $report->title }}</h1>
            </div>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <span class="text-sm font-medium text-gray-600">الفئة:</span>
            <span class="ml-2 text-indigo-700 font-semibold">
                {{ $report->category ?? 'غير محددة' }}
            </span>
        </div>

        <!-- Description -->
        <div class="bg-gray-100 rounded-lg p-4 mb-6 border border-gray-200">
            <p class="text-gray-800 leading-relaxed whitespace-pre-line">
                {{ $report->description }}
            </p>
        </div>

        <!-- PDF Download -->
       @if($report->file_path)
    <div class="mb-6">
        <a href="{{ asset('storage/' . $report->file_path) }}"
           target="_blank"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
            <i class="fas fa-file-pdf"></i>
            عرض التقرير بصيغة PDF
        </a>
    </div>
@endif

        <!-- Back Link -->
        <div class="text-right">
            <a href="{{ route('reports.index') }}"
               class="text-indigo-600 hover:text-indigo-800 hover:underline font-medium transition">
               ← عودة إلى قائمة التقارير
            </a>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</x-app-layout>
