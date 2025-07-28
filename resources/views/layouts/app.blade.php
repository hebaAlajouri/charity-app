<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-4 sm:py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="pb-10">
            {{ $slot }}
        </main>
    </div>

    <!-- Responsive Footer -->
    <footer class="footer bg-[#2c3e50] text-white py-8 sm:py-10 px-4 text-center">
        <div class="footer-container max-w-7xl mx-auto space-y-8 sm:space-y-10">
            <!-- Footer Content -->
            <div class="footer-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 text-left">
                <!-- About Section -->
                <div class="footer-section">
                    <h3 class="text-base sm:text-lg font-bold text-[#f39c12] mb-3">
                        {{ __('app.about_us') }}
                    </h3>
                    <p class="text-sm text-[#bdc3c7] leading-relaxed">
                        {{ __('app.about_description') }}
                    </p>
                </div>

                <!-- Quick Links Section -->
                <div class="footer-section">
                    <h3 class="text-base sm:text-lg font-bold text-[#f39c12] mb-3">
                        {{ __('app.quick_links') }}
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ route('careers.index') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.jobs') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.projects') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reports.index') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.reports') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact.form') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.contact') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.news') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orphan.create') }}" 
                               class="hover:text-[#f39c12] transition-colors duration-200 block py-1">
                                {{ __('app.orphan_request') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info Section -->
                <div class="footer-section sm:col-span-2 lg:col-span-1">
                    <h3 class="text-base sm:text-lg font-bold text-[#f39c12] mb-3">
                        {{ __('app.contact_us') }}
                    </h3>
                    <div class="text-sm text-[#bdc3c7] leading-relaxed space-y-2">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <i class="fas fa-envelope w-4"></i>
                            <span>{{ __('app.email') }}: info@example.com</span>
                        </div>
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <i class="fas fa-phone w-4"></i>
                            <span>{{ __('app.phone') }}: 0799999999</span>
                        </div>
                        <div class="flex items-start space-x-2 rtl:space-x-reverse">
                            <i class="fas fa-map-marker-alt w-4 mt-1"></i>
                            <span>{{ __('app.address') }}: {{ __('app.location') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Links (Optional) -->
            <div class="flex justify-center space-x-6 rtl:space-x-reverse">
                <a href="#" class="text-[#bdc3c7] hover:text-[#f39c12] transition-colors duration-200">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="text-[#bdc3c7] hover:text-[#f39c12] transition-colors duration-200">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-[#bdc3c7] hover:text-[#f39c12] transition-colors duration-200">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#" class="text-[#bdc3c7] hover:text-[#f39c12] transition-colors duration-200">
                    <i class="fab fa-linkedin-in text-xl"></i>
                </a>
            </div>

            <!-- Bottom Copyright -->
            <div class="footer-bottom border-t border-[#34495e] pt-4 text-xs sm:text-sm text-[#95a5a6]">
                &copy; {{ date('Y') }} {{ __('app.copyright') }}
            </div>
        </div>
    </footer>
</body>
</html>