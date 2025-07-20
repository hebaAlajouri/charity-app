<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-[var(--soft-beige)] shadow-xl rounded-xl p-6 border border-[var(--muted-blue)]">

            <!-- Title -->
            <h2 class="text-2xl font-bold mb-6 text-[var(--primary-navy)] text-center">تفاصيل المشروع</h2>

            <!-- Project Image -->
            @if($project->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="rounded-lg w-full h-64 object-cover border border-[var(--muted-blue)]">
                </div>
            @endif

            <!-- Project Info -->
            <div class="mb-4">
                <strong class="text-[var(--primary-gold)]">اسم المشروع:</strong>
                <p class="text-[var(--primary-navy)]">{{ $project->name }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-[var(--primary-gold)]">الكود:</strong>
                <p class="text-[var(--primary-navy)]">{{ $project->code }}</p>
            </div>

            <div class="mb-4">
                <strong class="text-[var(--primary-gold)]">الوصف:</strong>
                <p class="text-[var(--primary-navy)] leading-relaxed">{{ $project->description }}</p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div class="bg-[var(--light-gold)] p-4 rounded border text-center border-[var(--muted-blue)]">
                    <strong class="block text-sm text-[var(--primary-gold)] mb-1">المبلغ المطلوب</strong>
                    <span class="text-lg text-[var(--primary-navy)] font-semibold">{{ number_format($project->goal_amount, 2) }} د.أ</span>
                </div>
                <div class="bg-[#fef2f2] p-4 rounded border border-[#fecaca] text-center">
                    <strong class="block text-sm text-[var(--primary-gold)] mb-1">المبلغ المتبرع به</strong>
                    <span class="text-lg text-[#dc2626] font-semibold">{{ number_format($project->raised_amount, 2) }} د.أ</span>
                </div>
            </div>

            <!-- Progress -->
            @php
                $percentage = $project->goal_amount > 0
                    ? min(100, round(($project->raised_amount / $project->goal_amount) * 100, 2))
                    : 0;
            @endphp

            <div class="mb-6">
                <div class="w-full bg-[var(--muted-blue)] rounded-full h-3 overflow-hidden">
                    <div class="bg-[var(--accent-navy)] h-full rounded-full transition-all duration-300"
                         style="width: {{ $percentage }}%"></div>
                </div>
                <div class="mt-2 text-sm text-[var(--primary-gold)] text-center">
                    نسبة الإنجاز: <span class="font-semibold text-[var(--primary-navy)]">{{ $percentage }}%</span>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('projects') }}" class="inline-block px-4 py-2 rounded bg-[var(--primary-gold)] text-[var(--dark-navy)] hover:bg-[var(--accent-gold)] transition">
                    ⬅ العودة إلى المشاريع
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
