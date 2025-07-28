<nav class="navbar {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} bg-white shadow-md sticky top-0 z-50" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="nav-container max-w-7xl mx-auto">
        <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0">
                <img src="{{ asset('storage/logo.png') }}" 
                     alt="Logo" 
                     class="h-10 sm:h-12 max-w-full object-contain {{ app()->getLocale() == 'ar' ? 'logo-rtl' : 'logo-ltr' }}">
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex lg:items-center lg:justify-center flex-1 mx-8">
                <ul class="flex items-center space-x-6 rtl:space-x-reverse text-sm font-medium text-gray-700">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="nav-link {{ request()->routeIs('dashboard') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('careers.index') }}" 
                           class="nav-link {{ request()->routeIs('careers.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.jobs') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects') }}" 
                           class="nav-link {{ request()->routeIs('projects') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.projects') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reports.index') }}" 
                           class="nav-link {{ request()->routeIs('reports.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.reports') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.form') }}" 
                           class="nav-link {{ request()->routeIs('contact.form') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.contact') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}" 
                           class="nav-link {{ request()->routeIs('news.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.news') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orphan.create') }}" 
                           class="nav-link {{ request()->routeIs('orphan.create') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                            {{ __('nav.orphan_request') }}
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('admin.dashboard') }}" 
                                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'text-[#e74c3c] font-bold' : 'text-[#e67e22] font-semibold hover:text-[#e74c3c]' }} transition-colors duration-200 py-2 px-1">
                                    {{ __('nav.admin_dashboard') }}
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
     
            <!-- Auth Section & Language Switcher - Desktop -->
            <div class="hidden lg:flex items-center space-x-4 rtl:space-x-reverse flex-shrink-0">
                <!-- Language Switcher -->
                <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm border-r rtl:border-l rtl:border-r-0 border-gray-300 pr-4 rtl:pl-4 rtl:pr-0">
                    <a href="{{ route('lang.switch', 'ar') }}" 
                       class="{{ app()->getLocale() == 'ar' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors duration-200">
                        {{ __('nav.arabic') }}
                    </a>
                    <span class="text-gray-400">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="{{ app()->getLocale() == 'en' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors duration-200">
                        {{ __('nav.english') }}
                    </a>
                </div>

                <!-- Auth Section -->
                <div class="flex items-center">
                    @auth
                        <x-dropdown align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" width="48">
                            <x-slot name="trigger">
                                <button class="btn-login flex items-center space-x-2 rtl:space-x-reverse hover:text-[#e74c3c] transition-colors duration-200">
                                    <i class="fas fa-user-circle text-xl text-[#e74c3c]"></i>
                                    <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('الملف الشخصي') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}" 
                           class="btn-login flex items-center space-x-2 rtl:space-x-reverse hover:text-[#e74c3c] transition-colors duration-200">
                            <i class="fas fa-sign-in-alt text-[#e74c3c]"></i>
                            <span class="text-sm font-medium">تسجيل الدخول</span>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" 
                    class="lg:hidden text-gray-700 hover:text-[#e74c3c] focus:outline-none focus:text-[#e74c3c] transition-colors duration-200 p-2">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden border-t border-gray-200 bg-white">
            <div class="px-4 sm:px-6 py-4 space-y-4">
                <!-- Mobile Navigation Links -->
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('dashboard') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('careers.index') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('careers.index') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.jobs') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('projects') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.projects') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reports.index') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('reports.index') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.reports') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.form') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('contact.form') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.contact') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('news.index') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.news') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orphan.create') }}" 
                           class="mobile-nav-link block {{ request()->routeIs('orphan.create') ? 'text-[#e74c3c] font-bold' : 'text-gray-700 hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                            {{ __('nav.orphan_request') }}
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('admin.dashboard') }}" 
                                   class="mobile-nav-link block {{ request()->routeIs('admin.dashboard') ? 'text-[#e74c3c] font-bold' : 'text-[#e67e22] font-semibold hover:text-[#e74c3c]' }} transition-colors duration-200 py-2">
                                    {{ __('nav.admin_dashboard') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('profile.edit') }}" 
                               class="mobile-nav-link block text-gray-700 hover:text-[#e74c3c] transition-colors duration-200 py-2">
                                {{ __('nav.profile') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="mobile-nav-link block text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} w-full text-gray-700 hover:text-[#e74c3c] transition-colors duration-200 py-2">
                                    {{ __('nav.logout') }}
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" 
                               class="mobile-nav-link block text-gray-700 hover:text-[#e74c3c] transition-colors duration-200 py-2">
                                <i class="fas fa-sign-in-alt text-[#e74c3c] {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                                {{ __('nav.login') }}
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Language Switcher for Mobile -->
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <span class="text-sm font-medium text-gray-500">{{ __('nav.language') }}:</span>
                        <a href="{{ route('lang.switch', 'ar') }}" 
                           class="text-sm {{ app()->getLocale() == 'ar' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors duration-200">
                            {{ __('nav.arabic') }}
                        </a>
                        <span class="text-gray-400">|</span>
                        <a href="{{ route('lang.switch', 'en') }}" 
                           class="text-sm {{ app()->getLocale() == 'en' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors duration-200">
                            {{ __('nav.english') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                
                // Toggle hamburger icon with smooth transition
                const icon = menuToggle.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Close menu when clicking on navigation links (mobile)
            const mobileNavLinks = mobileMenu.querySelectorAll('.mobile-nav-link');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                });
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) { // lg breakpoint
                    mobileMenu.classList.add('hidden');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        }
    });
</script>