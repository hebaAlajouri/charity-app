<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
         <link rel="stylesheet" href="{{ route('css.app') }}">

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
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="footer bg-[#2c3e50] text-white py-10 px-4 text-center">
    <div class="footer-container max-w-7xl mx-auto space-y-10">
        <!-- Footer Content -->
        <div class="footer-content grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <!-- About -->
            <div class="footer-section">
                <h3 class="text-lg font-bold text-[#f39c12] mb-3">من نحن</h3>
                <p class="text-sm text-[#bdc3c7] leading-relaxed">
                    جمعية فرسان الريادة هي جمعية خيرية تهدف لرعاية الأيتام ودعم المشاريع الإنسانية.             </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3 class="text-lg font-bold text-[#f39c12] mb-3">روابط سريعة</h3>
                <ul class="space-y-2 text-sm">
                 

                       <li><a href="{{ route('careers.index') }}" class="hover:text-[#f39c12]">وظائف</a></li>
            <li><a href="{{ route('projects') }}" class="hover:text-[#f39c12]">مشاريعنا</a></li>
            <li><a href="{{ route('reports.index') }}" class="hover:text-[#f39c12]">تقارير</a></li>
            <li><a href="{{ route('contact.form') }}" class="hover:text-[#f39c12]">تواصل</a></li>
            <li><a href="{{ route('news.index') }}"class="hover:text-[#f39c12]">أخبار</a></li>
            <li><a href="{{ route('orphan.create') }}" class="hover:text-[#f39c12]">طلب استفادة</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h3 class="text-lg font-bold text-[#f39c12] mb-3">تواصل معنا</h3>
                <p class="text-sm text-[#bdc3c7] leading-relaxed">
                    البريد الإلكتروني: info@example.com<br>
                    الهاتف: 0799999999<br>
                    العنوان: عمان - الأردن
                </p>
            </div>
        </div>

        <!-- Bottom -->
        <div class="footer-bottom border-t border-[#34495e] pt-4 text-sm text-[#95a5a6]">
            &copy; {{ date('Y') }} جميع الحقوق محفوظة لجمعية فرسان الريادة.
        </div>
    </div>
</footer>

    </body>
</html>
