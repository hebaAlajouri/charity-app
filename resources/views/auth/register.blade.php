<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8" style="background: var(--light-gold);">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-2" style="color: var(--primary-navy);">إنشاء حساب جديد</h2>
                <p class="text-sm" style="color: var(--muted-blue);">انضم إلى منصة كفالة الأيتام ودعم حملات الإغاثة</p>
            </div>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow-xl rounded-2xl sm:px-10 border" style="border-color: var(--soft-beige);">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('الاسم الكامل')" class="block text-sm font-medium mb-2" style="color: var(--primary-navy);" />
                        <div class="relative rounded-md shadow-sm">
                            <x-text-input id="name" 
                                class="block w-full pl-3 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200" 
                                style="border-color: var(--muted-blue);" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required autofocus 
                                autocomplete="name"
                                placeholder="أدخل اسمك الكامل"
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193,0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('البريد الإلكتروني')" class="block text-sm font-medium mb-2" style="color: var(--primary-navy);" />
                        <div class="relative rounded-md shadow-sm">
                            <x-text-input id="email" 
                                class="block w-full pl-3 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200" 
                                style="border-color: var(--muted-blue);" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username"
                                placeholder="أدخل بريدك الإلكتروني"
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193,0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('كلمة المرور')" class="block text-sm font-medium mb-2" style="color: var(--primary-navy);" />
                        <div class="relative rounded-md shadow-sm">
                            <x-text-input id="password" 
                                class="block w-full pl-3 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200"
                                style="border-color: var(--muted-blue);" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="أدخل كلمة المرور"
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193,0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" class="block text-sm font-medium mb-2" style="color: var(--primary-navy);" />
                        <div class="relative rounded-md shadow-sm">
                            <x-text-input id="password_confirmation" 
                                class="block w-full pl-3 pr-3 py-3 border rounded-lg text-sm transition-colors duration-200"
                                style="border-color: var(--muted-blue);" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="أعد كتابة كلمة المرور"
                                onfocus="this.style.borderColor='var(--accent-navy)'; this.style.boxShadow='0 0 0 2px rgba(126,182,193,0.2)'" 
                                onblur="this.style.borderColor='var(--muted-blue)'; this.style.boxShadow='none'" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm" style="color: #e74c3c;" />
                    </div>

                    <!-- Register Button -->
                    <div>
                        <x-primary-button 
                            class="group relative w-full flex justify-center py-3 px-4 border-0 text-sm font-medium rounded-lg text-white transition-all duration-200 transform" 
                            style="background: var(--gold-gradient); box-shadow: 0 5px 15px rgba(201, 180, 88, 0.2);"
                            onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 10px 25px rgba(201, 180, 88, 0.3)'"
                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 5px 15px rgba(201, 180, 88, 0.2)'"
                        >
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 transition-colors duration-200" style="color: rgba(255,255,255,0.7);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2m16 0a4 4 0 01-4-4H5a4 4 0 01-4 4m16 0v-6a4 4 0 00-4-4H9a4 4 0 00-4 4v6"></path>
                                </svg>
                            </span>
                            {{ __('تسجيل') }}
                        </x-primary-button>
                    </div>

                    <div class="text-center pt-4" style="border-top: 1px solid var(--soft-beige);">
                        <p class="text-sm" style="color: var(--muted-blue);">
                            هل لديك حساب؟ 
                            <a href="{{ route('login') }}" class="font-medium" style="color: var(--primary-gold); hover:underline;">
                                تسجيل الدخول
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
