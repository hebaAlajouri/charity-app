<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#F5F9FA] rtl">
        <div class="bg-white p-8 rounded-xl shadow-xl max-w-2xl w-full border border-[#7EB6C1]">
            <!-- Report Title -->
            <h2 class="text-3xl font-bold text-[#2C3E50] mb-6">
                {{ $report->title }}
            </h2>

            <!-- Report Category -->
            <div class="mb-4 text-right">
                <span class="text-[#C9B458] font-semibold">الفئة:</span>
                <span class="text-[#2C3E50]">{{ $report->category ?? 'غير محددة' }}</span>
            </div>

            <!-- Report Description -->
            <p class="text-gray-700 text-right leading-relaxed mb-6">
                {{ $report->description }}
            </p>

            <!-- View PDF Button -->
            @if($report->file_path)
                <div class="text-center mb-6">
                    <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank"
                       class="inline-block bg-[#7EB6C1] text-white font-semibold px-6 py-2 rounded-full shadow-md hover:bg-[#6AA4B0] transition duration-200">
                        عرض التقرير بصيغة PDF
                    </a>
                </div>
            @endif

            <!-- Back Link -->
            <div class="text-center">
                <a href="{{ route('reports.index') }}"
                   class="inline-block text-[#7EB6C1] font-medium text-sm hover:underline">
                    ← عودة إلى قائمة التقارير
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
