<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @php
    $unreadCount = \App\Models\Message::where('is_read', false)->count();
@endphp


    <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    max-width: 100%;
    overflow-x: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    direction: rtl;
}

.dashboard-container,
.main-content,
.content-area,
.content-wrapper {
    max-width: 100%;
    overflow-x: hidden;
}

/* Sidebar Styles */
.sidebar {
    width: 250px;
    background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
    color: white;
    position: fixed;
    height: 100vh;
    right: 0;
    top: 0;
    z-index: 1000;
    overflow-y: auto;
    box-shadow: -2px 0 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    transform: translateX(0);
}

.sidebar-header {
    padding: 20px;
    background: rgba(0,0,0,0.1);
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.sidebar-header h2 {
    font-size: 18px;
    font-weight: 600;
}

.sidebar-nav {
    padding: 20px 0;
}

.nav-item {
    margin-bottom: 5px;
}

.nav-link {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    border-right: 3px solid transparent;
    word-break: break-word;
}

.nav-link:hover {
    background: rgba(255,255,255,0.1);
    border-right-color: #3498db;
    padding-right: 25px;
}

.nav-link.active {
    background: rgba(52, 152, 219, 0.2);
    border-right-color: #3498db;
}

/* Main Content Styles */
.main-content {
    flex: 1;
    margin-right: 250px;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    width: calc(100% - 250px);
    overflow-x: hidden;
}

.main-header {
    background: white;
    padding: 15px 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
    min-height: 60px;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.menu-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #2c3e50;
    padding: 5px;
}

.page-title {
    font-size: 24px;
    font-weight: 600;
    color: #2c3e50;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #2c3e50;
}

.logout-btn {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    white-space: nowrap;
}

.logout-btn:hover {
    background: #c0392b;
}

.content-area {
    flex: 1;
    padding: 30px;
    background: #f8f9fa;
    width: 100%;
    overflow-x: hidden;
}

.content-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    overflow-x: hidden;
}

.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 999;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.overlay.active {
    display: block;
    opacity: 1;
}

/* Table Styles */
.table-container {
    overflow-x: auto;
    width: 100%;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
    border-radius: 8px;
    overflow: hidden;
    font-size: 14px;
    direction: rtl;
    /* min-width removed to prevent horizontal overflow */
}

table thead tr {
    background-color: #3498db;
    color: white;
    text-align: center;
    font-weight: 600;
    font-size: 15px;
}

table th, table td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    text-align: center;
    vertical-align: middle;
}

table tbody tr:hover {
    background-color: #f1f8ff;
    cursor: pointer;
}

/* Button Styles */
.btn-login {
    display: inline-block;
    background-color: #e74c3c;
    color: white;
    padding: 10px 18px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.btn-login:hover {
    background-color: #c0392b;
}

/* Links and buttons */
a.text-blue-600 {
    color: #2980b9;
    font-weight: 600;
    text-decoration: none;
}

a.text-blue-600:hover {
    text-decoration: underline;
}

button.text-red-600 {
    background: none;
    border: none;
    color: #e74c3c;
    font-weight: 600;
    cursor: pointer;
}

button.text-red-600:hover {
    text-decoration: underline;
}

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 20px;
}

.pagination li {
    margin: 0 2px;
}

.pagination li a,
.pagination li span {
    padding: 8px 12px;
    border-radius: 5px;
    border: 1px solid #ddd;
    color: #3498db;
    text-decoration: none;
    font-weight: 500;
    display: block;
    min-width: 40px;
    text-align: center;
}

.pagination li.active span {
    background-color: #3498db;
    color: white;
    border-color: #3498db;
}

.pagination li a:hover {
    background-color: #2980b9;
    color: white;
    border-color: #2980b9;
}

/* Form Styles */
form.edit-form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    max-width: 700px;
    margin: 0 auto;
    width: 100%;
}

form.edit-form input,
form.edit-form select,
form.edit-form textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    transition: border-color 0.3s;
}

form.edit-form input:focus,
form.edit-form select:focus,
form.edit-form textarea:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
}

form.edit-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
}

form.edit-form .form-group {
    margin-bottom: 20px;
}

form.edit-form button[type="submit"] {
    background-color: #e74c3c;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

form.edit-form button[type="submit"]:hover {
    background-color: #c0392b;
}

/* Show Box Styles */
.show-box {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    max-width: 900px;
    margin: 0 auto;
    font-size: 15px;
    line-height: 1.8;
    color: #2c3e50;
    width: 100%;
}

.show-box h2 {
    font-size: 18px;
    font-weight: 700;
    color: #34495e;
    border-bottom: 1px solid #eee;
    padding-bottom: 8px;
    margin-top: 30px;
    margin-bottom: 16px;
}

.show-box p {
    margin-bottom: 8px;
    word-wrap: break-word;
}

.show-box strong {
    display: inline-block;
    width: 180px;
    color: #555;
}

.show-box .btn-edit {
    display: inline-block;
    margin-top: 25px;
    background-color: #3498db;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.show-box .btn-edit:hover {
    background-color: #2980b9;
}

/* Action Buttons */
.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin: 2px;
    white-space: nowrap;
}

.btn-edit {
    background-color: #3498db;
    color: white;
}

.btn-edit:hover {
    background-color: #2980b9;
}

.btn-delete {
    background-color: #e74c3c;
    color: white;
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: #c0392b;
}

.btn-show {
    background-color: #2ecc71;
    color: white;
}

.btn-show:hover {
    background-color: #27ae60;
}

/* Image Styles */
img {
    max-width: 100%;
    height: auto;
    display: block;
    border-radius: 6px;
    object-fit: cover;
}

img.table-img {
    width: 60px;
    height: 60px;
    border-radius: 6px;
    object-fit: cover;
}

img.show-img {
    max-width: 300px;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Scrollbar Styles */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
    background: #4f46e5;
    border-radius: 4px;
}
.notification-icon {
    position: relative;
    margin-left: 20px;
    font-size: 24px;
    text-decoration: none;
    color: #333;
}

.notification-icon .counter {
    position: absolute;
    top: -5px;
    right: -10px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
}

   body.rtl {
        direction: rtl;
        text-align: right;
        font-family: 'Cairo', sans-serif;
    }

    body.ltr {
        direction: ltr;
        text-align: left;
        font-family: 'Roboto', sans-serif;
    }

    .rtl .text-left {
        text-align: right !important;
    }

    .ltr .text-right {
        text-align: left !important;
    }

    /* Optional: flip margins and paddings */
    .rtl .ml-auto {
        margin-left: 0 !important;
        margin-right: auto !important;
    }

    .rtl .mr-auto {
        margin-right: 0 !important;
        margin-left: auto !important;
    }

    .rtl .pl-4 {
        padding-left: 0 !important;
        padding-right: 1rem !important;
    }

    .rtl .pr-4 {
        padding-right: 0 !important;
        padding-left: 1rem !important;
    }
     body.rtl {
            direction: rtl;
            text-align: right;
            font-family: 'Cairo', sans-serif;
        }

        body.ltr {
            direction: ltr;
            text-align: left;
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
    right: 0;
}
body.rtl .sidebar {
    right: 0;
    left: auto;
}

body.ltr .sidebar {
    left: 0;
    right: auto;
}
.main-content {
    margin-right: 250px;
}
body.rtl .main-content {
    margin-right: 250px;
    margin-left: 0;
}

body.ltr .main-content {
    margin-left: 250px;
    margin-right: 0;
}
.lang-switcher {
    padding-top: 10px;
    border-top: 1px solid #e5e5e5;
}

.lang-links {
    display: flex;
    gap: 8px;
    font-size: 14px;
}

.lang-links.ar {
    justify-content: flex-start;
    direction: rtl;
}

.lang-links.en {
    justify-content: flex-start;
    direction: ltr;
}

.lang-links a {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.lang-links a:hover {
    color: #e74c3c;
}

.lang-links a.active {
    font-weight: bold;
    color: #e74c3c;
}

.lang-links span {
    color: #aaa;
}

/* === RESPONSIVE DESIGN === */

/* Mobile First Approach - Extra Small Devices (Portrait phones, less than 576px) */
@media (max-width: 575.98px) {
    .sidebar {
        width: 100%;
        transform: translateX(100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .main-content {
        margin-right: 0;
        width: 100%;
    }

    .menu-toggle {
        display: block;
    }

    .main-header {
        padding: 10px 15px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .header-left {
        width: 100%;
        justify-content: space-between;
    }

    .header-right {
        width: 100%;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .page-title {
        font-size: 18px;
        max-width: 200px;
    }

    .user-info {
        font-size: 14px;
        flex-wrap: wrap;
        gap: 5px;
    }

    .logout-btn {
        padding: 6px 12px;
        font-size: 12px;
    }

    .content-area {
        padding: 10px;
    }

    .sidebar-header h2 {
        font-size: 16px;
    }

    .nav-link {
        font-size: 14px;
        padding: 10px 15px;
    }

    /* Table Responsiveness */
    table {
        font-size: 12px;
        /* min-width removed */
    }

    table th,
    table td {
        padding: 8px 5px;
        font-size: 12px;
    }

    .btn-action {
        padding: 4px 8px;
        font-size: 12px;
        margin: 1px;
    }

    /* Form Responsiveness */
    form.edit-form {
        padding: 15px;
        margin: 0 5px;
    }

    form.edit-form input,
    form.edit-form select,
    form.edit-form textarea {
        font-size: 14px;
        padding: 10px 12px;
    }

    form.edit-form button[type="submit"] {
        padding: 10px 20px;
        font-size: 14px;
    }

    /* Show Box Responsiveness */
    .show-box {
        padding: 15px;
        margin: 0 5px;
        font-size: 14px;
    }

    .show-box strong {
        width: 100%;
        font-size: 13px;
        display: block;
        margin-bottom: 5px;
    }

    .show-box p {
        margin-bottom: 15px;
    }

    /* Pagination Responsiveness */
    .pagination li a,
    .pagination li span {
        padding: 6px 8px;
        font-size: 12px;
        min-width: 30px;
    }

    /* Images */
    img.table-img {
        width: 40px;
        height: 40px;
    }

    img.show-img {
        max-width: 100%;
    }

    .content-wrapper {
        max-width: 100%;
    }
}

/* Small Devices (Landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.98px) {
    .sidebar {
        width: 280px;
        transform: translateX(100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .main-content {
        margin-right: 0;
        width: 100%;
    }

    .menu-toggle {
        display: block;
    }

    .main-header {
        padding: 12px 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .page-title {
        font-size: 20px;
    }

    .content-area {
        padding: 15px;
    }

    .nav-link {
        font-size: 15px;
    }

    .logout-btn {
        padding: 7px 14px;
        font-size: 13px;
    }

    table {
        /* min-width removed */
        min-width: unset;
        font-size: 13px;
    }

    table th,
    table td {
        padding: 10px 8px;
        font-size: 13px;
    }

    form.edit-form {
        padding: 20px;
        margin: 0 10px;
    }

    .show-box {
        padding: 20px;
        margin: 0 10px;
    }

    .show-box strong {
        width: 120px;
    }

    .content-wrapper {
        max-width: 100%;
    }
}

/* Medium Devices (Tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {
    .sidebar {
        transform: translateX(100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .main-content {
        margin-right: 0;
        width: 100%;
    }

    .menu-toggle {
        display: block;
    }

    .main-header {
        padding: 15px 25px;
    }

    .page-title {
        font-size: 22px;
    }

    .content-area {
        padding: 20px;
    }

    .content-wrapper {
        max-width: 100%;
    }

    .logout-btn {
        padding: 8px 16px;
    }

    table {
        /* min-width removed */
        min-width: unset;
        font-size: 14px;
    }

    table th,
    table td {
        padding: 12px 10px;
    }

    form.edit-form {
        max-width: 600px;
    }

    .show-box {
        max-width: 700px;
    }

    .show-box strong {
        width: 150px;
    }
}

/* Large Devices (Desktops, 992px and up) */
@media (min-width: 992px) {
    .sidebar {
        transform: translateX(0);
    }

    .main-content {
        margin-right: 250px;
        width: calc(100% - 250px);
    }

    .menu-toggle {
        display: none;
    }

    .content-wrapper {
        max-width: 1200px;
    }
    @media (max-width: 991.98px) {
    .main-content {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    body.rtl .sidebar {
        right: 0;
        left: auto;
    }

    body.ltr .sidebar {
        left: 0;
        right: auto;
    }
}

}
</style>
</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<div class="dashboard-container">
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>{{ __('admindashboardlayout.admin_system') }}</h2>
        </div>
        <div class="sidebar-nav">
            <div class="nav-item"><a href="/admin/dashboard" class="nav-link">{{ __('admindashboardlayout.dashboard') }}</a></div>
            <div class="nav-item"><a href="/admin/users" class="nav-link">{{ __('admindashboardlayout.users') }}</a></div>
            <div class="nav-item"><a href="/admin/orphans" class="nav-link">{{ __('admindashboardlayout.orphans') }}</a></div>
            <div class="nav-item"><a href="/admin/projects" class="nav-link">{{ __('admindashboardlayout.projects') }}</a></div>
            <div class="nav-item"><a href="/admin/jobs" class="nav-link">{{ __('admindashboardlayout.jobs') }}</a></div>
            <div class="nav-item"><a href="/admin/sponsorships" class="nav-link">{{ __('admindashboardlayout.sponsorships') }}</a></div>
            <div class="nav-item"><a href="/admin/reports" class="nav-link">{{ __('admindashboardlayout.reports') }}</a></div>
            <div class="nav-item"><a href="/admin/news" class="nav-link">{{ __('admindashboardlayout.news') }}</a></div>
            <div class="nav-item"><a href="/admin/orphan_applications" class="nav-link">{{ __('admindashboardlayout.orphan_applications') }}</a></div>
        </div>
    </nav>

    <div class="main-content">
        <header class="main-header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle">☰</button>
                <h1 class="page-title">@yield('title', __('admindashboardlayout.dashboard'))</h1>
            </div>
            <div class="header-right">
                <a href="{{ url('/admin/messages') }}" class="notification-icon" title="{{ __('admindashboardlayout.unread_messages') }}">
                    <span class="icon">🔔</span>
                    @if ($unreadCount > 0)
                        <span class="counter">{{ $unreadCount }}</span>
                    @endif
                </a>

                <div class="user-info">
                    <span>{{ __('admindashboardlayout.welcome_admin') }}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">{{ __('admindashboardlayout.logout') }}</button>
                </form>

                <!-- Language Switcher -->
               
    <div class="lang-links {{ app()->getLocale() == 'ar' ? 'ar' : 'en' }}">
        <a href="{{ route('lang.switch', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'active' : '' }}">
            {{ __('nav.arabic') }}
        </a>
        <span>|</span>
        <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
            {{ __('nav.english') }}
        </a>
    </div>


            </div>
        </header>

        <main class="content-area">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>
</div>
</div>

<div class="overlay" id="overlay"></div>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });

    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 991) {
            if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 991) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    });
</script>
</body>
</html>