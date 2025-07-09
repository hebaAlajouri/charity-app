<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">تبرع لمشروع: {{ $project->name }}</h1>

        <form method="POST" action="{{ route('donations.storeDonorInfo', $project) }}">
            @csrf

            @if(!Auth::check())
                <div class="mb-4">
                    <label class="block mb-1">الاسم الكامل *</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required
                        class="w-full border rounded p-2 @error('full_name') border-red-500 @enderror" />
                    @error('full_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded p-2 @error('email') border-red-500 @enderror" />
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">رقم الهاتف</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border rounded p-2 @error('phone') border-red-500 @enderror" />
                    @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            @else
                <p class="mb-4 text-gray-700">مرحباً، {{ auth()->user()->name }}! سيتم استخدام بيانات حسابك.</p>
            @endif

            <div class="mb-4">
                <label class="block mb-1">المبلغ (د.أ) *</label>
                <input type="number" min="1" step="0.01" name="amount" value="{{ old('amount') ?? 10 }}" required
                    class="w-full border rounded p-2 @error('amount') border-red-500 @enderror" />
                @error('amount') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">رسالة (اختياري)</label>
                <textarea name="message" rows="3" class="w-full border rounded p-2">{{ old('message') }}</textarea>
            </div>

           

            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded font-semibold hover:bg-indigo-700 w-full">
                متابعة الدفع
            </button>
        </form>
    </div>
</x-app-layout>
