<nav class="navbar rtl bg-white shadow-md">
    <div class="nav-container flex items-center justify-between px-4 py-3">
        <!-- الشعار -->
           <!-- Maximized Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-20 max-w-full object-contain">
            </div>

        <!-- زر القائمة للموبايل -->
        <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- روابط التنقل (سطح المكتب) -->
        <ul id="nav-links" class="hidden md:flex md:items-center gap-6 text-sm font-medium text-gray-700">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-[#e74c3c] font-bold' : '' }}">الرئيسية</a></li>
            <li><a href="{{ route('careers.index') }}">وظائف</a></li>
            <li><a href="{{ route('projects') }}">مشاريعنا</a></li>
            <li><a href="{{ route('reports.index') }}">تقارير</a></li>
            <li><a href="{{ route('contact.form') }}">تواصل</a></li>
            <li><a href="{{ route('news.index') }}">أخبار</a></li>
            <li><a href="{{ route('orphan.create') }}">طلب استفادة</a></li>

            @auth
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="text-[#e67e22] font-semibold">لوحة التحكم</a></li>
                @endif
            @endauth
        </ul>

        <!-- تسجيل الدخول أو القائمة المنسدلة -->
        <div class="nav-auth hidden md:flex items-center gap-3">
            @auth
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="btn-login flex items-center gap-2">
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
                <a href="{{ route('login') }}" class="btn-login flex items-center gap-2">
                    <i class="fas fa-sign-in-alt text-[#e74c3c]"></i>
                    <span>تسجيل الدخول</span>
                </a>
            @endauth
        </div>
    </div>

    <!-- قائمة الموبايل -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
        <ul class="flex flex-col gap-4 text-sm font-medium text-gray-700 mt-2">
            <li><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li><a href="{{ route('careers.index') }}">وظائف</a></li>
            <li><a href="{{ route('projects') }}">مشاريعنا</a></li>
            <li><a href="{{ route('reports.index') }}">تقارير</a></li>
            <li><a href="{{ route('contact.form') }}">تواصل</a></li>
            <li><a href="{{ route('news.index') }}">أخبار</a></li>
            <li><a href="{{ route('orphan.create') }}">طلب استفادة</a></li>

            @auth
                @if(Auth::user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                @endif
                <li><a href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-left w-full">تسجيل الخروج</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
            @endauth
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
