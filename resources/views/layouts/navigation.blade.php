<nav class="navbar {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} bg-white shadow-md" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="nav-container flex items-center {{ app()->getLocale() == 'ar' ? 'justify-between' : 'justify-between' }} px-4 py-3">
        <!-- Logo - Now First -->
        <div class="flex items-center {{ app()->getLocale() == 'ar' ? 'order-1' : 'order-1' }}">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-12 max-w-full object-contain {{ app()->getLocale() == 'ar' ? 'logo-rtl' : 'logo-ltr' }}">
        </div>

        <!-- Desktop Navigation Links -->
        <ul id="nav-links" class="hidden md:flex md:items-center gap-6 text-sm font-medium text-gray-700 {{ app()->getLocale() == 'ar' ? 'order-2' : 'order-2' }}">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.home') }}</a></li>
            <li><a href="{{ route('careers.index') }}" class="{{ request()->routeIs('careers.index') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.jobs') }}</a></li>
            <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.projects') }}</a></li>
            <li><a href="{{ route('reports.index') }}" class="{{ request()->routeIs('reports.index') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.reports') }}</a></li>
            <li><a href="{{ route('contact.form') }}" class="{{ request()->routeIs('contact.form') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.contact') }}</a></li>
            <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.index') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.news') }}</a></li>
            <li><a href="{{ route('orphan.create') }}" class="{{ request()->routeIs('orphan.create') ? 'text-[#e74c3c] font-bold' : '' }}">{{ __('nav.orphan_request') }}</a></li>

            @auth
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-[#e74c3c] font-bold' : 'text-[#e67e22] font-semibold' }}">{{ __('nav.admin_dashboard') }}</a></li>
                @endif
            @endauth
        </ul>
     
        <!-- Auth Section & Language Switcher -->
        <div class="nav-auth hidden md:flex items-center gap-4 {{ app()->getLocale() == 'ar' ? 'order-3' : 'order-3' }}">
            <!-- Language Switcher -->
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('lang.switch', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.arabic') }}</a>
                <span class="text-gray-400">|</span>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.english') }}</a>
            </div>

            <!-- Auth Section -->
            @auth
                <x-dropdown align="{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" width="48">
                    <x-slot name="trigger">
                        <button class="btn-login flex items-center gap-2 hover:text-[#e74c3c] transition-colors">
                            <i class="fas fa-user-circle text-xl text-[#e74c3c]"></i>
                            <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 {{ app()->getLocale() == 'ar' ? 'rotate-180' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('nav.profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('nav.logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="btn-login flex items-center gap-2 hover:text-[#e74c3c] transition-colors">
                    <i class="fas fa-sign-in-alt text-[#e74c3c] {{ app()->getLocale() == 'ar' ? 'order-2' : 'order-1' }}"></i>
                    <span class="{{ app()->getLocale() == 'ar' ? 'order-1' : 'order-2' }}">{{ __('nav.login') }}</span>
                </a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none {{ app()->getLocale() == 'ar' ? 'order-2' : 'order-4' }}">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 border-t border-gray-200">
        <ul class="flex flex-col gap-4 text-sm font-medium text-gray-700 mt-4">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.home') }}</a></li>
            <li><a href="{{ route('careers.index') }}" class="{{ request()->routeIs('careers.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.jobs') }}</a></li>
            <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.projects') }}</a></li>
            <li><a href="{{ route('reports.index') }}" class="{{ request()->routeIs('reports.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.reports') }}</a></li>
            <li><a href="{{ route('contact.form') }}" class="{{ request()->routeIs('contact.form') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.contact') }}</a></li>
            <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.index') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.news') }}</a></li>
            <li><a href="{{ route('orphan.create') }}" class="{{ request()->routeIs('orphan.create') ? 'text-[#e74c3c] font-bold' : 'hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.orphan_request') }}</a></li>

            @auth
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-[#e74c3c] font-bold' : 'text-[#e67e22] font-semibold hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.admin_dashboard') }}</a></li>
                @endif
                <li><a href="{{ route('profile.edit') }}" class="hover:text-[#e74c3c] transition-colors">{{ __('nav.profile') }}</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} w-full hover:text-[#e74c3c] transition-colors">{{ __('nav.logout') }}</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="hover:text-[#e74c3c] transition-colors">{{ __('nav.login') }}</a></li>
            @endauth

            <!-- Language Switcher for Mobile -->
            <li class="pt-2 border-t border-gray-200">
                <div class="flex gap-2 text-sm {{ app()->getLocale() == 'ar' ? 'justify-start' : 'justify-start' }}">
                    <a href="{{ route('lang.switch', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.arabic') }}</a>
                    <span class="text-gray-400">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'font-bold text-[#e74c3c]' : 'text-gray-600 hover:text-[#e74c3c]' }} transition-colors">{{ __('nav.english') }}</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
                
                // Toggle hamburger icon
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
        }
    });
</script>