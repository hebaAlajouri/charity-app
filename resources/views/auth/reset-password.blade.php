<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center" 
         style="background: var(--light-gold); padding: 3rem 1rem;">
        <div class="max-w-md w-full p-8 rounded-xl shadow-lg" 
             style="background: white; border: 2px solid var(--primary-gold);">

            <h2 class="text-center text-2xl font-bold mb-6" 
                style="color: var(--primary-navy);">
                🔐 إعادة تعيين كلمة المرور
            </h2>

            @if (session('status'))
                <div class="mb-4 font-semibold text-sm text-center" 
                     style="color: var(--accent-navy);">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('البريد الإلكتروني')" 
                        style="color: var(--primary-navy);" />
                    <x-text-input id="email" class="mt-1 w-full border border-gray-300 rounded" 
                        type="email" name="email" :value="old('email', $request->email)" 
                        required autofocus style="color: var(--dark-navy);" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('كلمة المرور الجديدة')" 
                        style="color: var(--primary-navy);" />
                    <x-text-input id="password" class="mt-1 w-full border border-gray-300 rounded" 
                        type="password" name="password" required autocomplete="new-password" 
                        style="color: var(--dark-navy);" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" 
                        style="color: var(--primary-navy);" />
                    <x-text-input id="password_confirmation" class="mt-1 w-full border border-gray-300 rounded" 
                        type="password" name="password_confirmation" required autocomplete="new-password" 
                        style="color: var(--dark-navy);" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button class="w-full justify-center py-3" 
                        style="background: var(--gold-gradient); border: none; color: var(--primary-navy); font-weight: 700;">
                        {{ __('إعادة تعيين') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
