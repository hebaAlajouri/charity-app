<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8" style="background: var(--light-gold);">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold" style="color: var(--primary-navy);">
                {{ __('forgetpass.title') }}
            </h2>
            <p class="mt-2 text-center text-sm" style="color: var(--muted-blue);">
                {{ __('forgetpass.subtitle') }}
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10 border" style="border-color: var(--soft-beige);">

                {{-- Language Switch Button Inside Card --}}
                <div class="flex justify-end mb-4">
                    <a href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                       class="text-xs font-medium px-3 py-1 rounded border"
                       style="border-color: var(--soft-beige); color: var(--primary-navy); background: #f7f7f7;">
                        {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
                    </a>
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm" style="color: #27ae60; background: #d5ead6; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid #27ae60;">
                        {{ __('forgetpass.success_message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1" style="color: var(--primary-navy);">
                            {{ __('forgetpass.email_label') }}
                        </label>
                        <div>
                            <input id="email" name="email" type="email" required autofocus
                                class="w-full px-3 py-3 border rounded-lg text-sm transition-colors duration-200"
                                style="border-color: var(--muted-blue); outline: none;"
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193,0.2)'"
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'"
                                placeholder="{{ __('forgetpass.email_placeholder') }}" />
                        </div>
                        @error('email')
                            <p class="text-sm mt-1" style="color: #e74c3c;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 rounded-lg text-white text-sm font-medium transition-transform duration-200 transform"
                            style="background: var(--dark-navy); box-shadow: 0 5px 15px rgba(201, 180, 88, 0.2); border: none;"
                            onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 10px 25px rgba(201, 180, 88, 0.3)'"
                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 5px 15px rgba(201, 180, 88, 0.2)'"
                        >
                            {{ __('forgetpass.send_button') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
