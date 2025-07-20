<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8" 
         style="background: var(--light-gold);">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-2" style="color: var(--primary-navy);">مرحباً بك</h2>
                <p class="text-sm" style="color: var(--muted-blue);">منصة كفالة الأيتام ودعم حملات الإغاثة</p>
            </div>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow-xl rounded-2xl sm:px-10 border border-var(--soft-beige)" style="border-color: var(--soft-beige);">
                <!-- Session Status -->
                <x-auth-session-status 
                    class="mb-6 p-4 rounded-lg text-sm" 
                    style="background: #d5ead6; border: 1px solid var(--accent-navy); color: var(--accent-navy);" 
                    :status="session('status')" 
                />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label 
                            for="email" 
                            :value="__('البريد الإلكتروني')" 
                            class="block text-sm font-medium mb-2" 
                            style="color: var(--primary-navy);" 
                        />
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" style="color: var(--muted-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <x-text-input 
                                id="email" 
                                class="block w-full pl-10 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200" 
                                style="border-color: var(--muted-blue);"
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="أدخل بريدك الإلكتروني" 
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193, 0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" 
                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label 
                            for="password" 
                            :value="__('كلمة المرور')" 
                            class="block text-sm font-medium mb-2" 
                            style="color: var(--primary-navy);" 
                        />
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" style="color: var(--muted-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <x-text-input 
                                id="password" 
                                class="block w-full pl-10 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200"
                                style="border-color: var(--muted-blue);"
                                type="password"
                                name="password"
                                required 
                                autocomplete="current-password" 
                                placeholder="أدخل كلمة المرور" 
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193, 0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" 
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Remember Me -->
                    <div>
                        <x-primary-button 
                            class="group relative w-full flex justify-center py-3 px-4 border-0 text-sm font-medium rounded-lg text-white transition-all duration-200 transform" 
                            style="background: var(--gold-gradient); box-shadow: 0 5px 15px rgba(201, 180, 88, 0.2);"
                            onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 10px 25px rgba(201, 180, 88, 0.3)'"
                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 5px 15px rgba(201, 180, 88, 0.2)'"
                        >
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 transition-colors duration-200" style="color: rgba(255,255,255,0.7);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                            </span>
                            {{ __('تسجيل الدخول') }}
                        </x-primary-button>
                    </div>

                    <!-- Links for Forget Password & Register -->
                    <div class="flex justify-between mt-4 text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[var(--dark-navy)] hover:text-[#5f8f9f] transition-colors duration-200">
                                نسيت كلمة المرور؟
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-[var(--dark-navy)] hover:text-[#d9c87f] transition-colors duration-200">
                                تسجيل حساب جديد
                            </a>
                        @endif
                    </div>

                    <!-- Additional Information -->
                    <div class="text-center pt-4" style="border-top: 1px solid var(--soft-beige);">
                        <p class="text-xs" style="color: var(--muted-blue);">
                            انضم إلينا في رحلة العطاء ومساعدة الأيتام
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
