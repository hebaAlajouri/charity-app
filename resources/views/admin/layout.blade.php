<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
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
            background-color: #f8fafc;
            font-size: 16px;
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
        .btn-login {
    background-color: #e74c3c;
    color: white !important;
    padding: 12px 20px;
    border-radius: 6px;
    text-decoration: none !important;
    display: inline-block;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    margin-top: 20px;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(231, 76, 60, 0.2);
}

.btn-login:hover {
    background-color: #c0392b;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
    color: white !important;
}

/* Base Action Button Styles */
.btn-action {
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 500;
    border-radius: 6px;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    transition: all 0.2s ease;
    margin: 2px;
    border: none;
    cursor: pointer;
    min-width: 70px;
    text-align: center;
    line-height: 1.2;
}

    .btn-edit {
        background-color: #3b82f6;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2563eb;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }


        .dashboard-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* === SIDEBAR STYLES === */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            position: fixed;
            height: 100vh;
            top: 0;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.rtl .sidebar {
            right: 0;
            left: auto;
        }

        body.ltr .sidebar {
            left: 0;
            right: auto;
        }

        .sidebar-header {
            padding: 24px 20px;
            background: rgba(0,0,0,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .sidebar-header h2 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            color: #ecf0f1;
            text-align: center;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
            font-weight: 500;
            font-size: 15px;
            position: relative;
        }

        body.rtl .nav-link {
            border-right: 4px solid transparent;
        }

        body.ltr .nav-link {
            border-left: 4px solid transparent;
        }

        .nav-link:hover {
            background: rgba(52, 152, 219, 0.2);
            color: #3498db;
        }

        body.rtl .nav-link:hover {
            border-right-color: #3498db;
            padding-right: 24px;
        }

        body.ltr .nav-link:hover {
            border-left-color: #3498db;
            padding-left: 24px;
        }

        .nav-link.active {
            background: rgba(52, 152, 219, 0.3);
            color: #3498db;
            font-weight: 600;
        }

        body.rtl .nav-link.active {
            border-right-color: #3498db;
        }

        body.ltr .nav-link.active {
            border-left-color: #3498db;
        }

        /* === MAIN CONTENT STYLES === */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: margin 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body.rtl .main-content {
            margin-right: 280px;
            margin-left: 0;
        }

        body.ltr .main-content {
            margin-left: 280px;
            margin-right: 0;
        }

        .main-header {
            background: white;
            padding: 16px 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid #e2e8f0;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #64748b;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: #f1f5f9;
            color: #2c3e50;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-shrink: 0;
        }

        .notification-icon {
            position: relative;
            font-size: 20px;
            text-decoration: none;
            color: #64748b;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .notification-icon:hover {
            background: #f1f5f9;
            color: #e74c3c;
        }

        .notification-icon .counter {
            position: absolute;
            top: 2px;
            background-color: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 6px;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
            line-height: 1.2;
        }

        body.rtl .notification-icon .counter {
            left: 2px;
        }

        body.ltr .notification-icon .counter {
            right: 2px;
        }

        .user-info {
            display: flex;
            align-items: center;
            color: #475569;
            font-weight: 500;
            font-size: 14px;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .lang-links {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            padding: 8px 12px;
            background: #f8fafc;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        .lang-links a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .lang-links a:hover {
            color: #e74c3c;
            background: white;
        }

        .lang-links a.active {
            font-weight: 600;
            color: #e74c3c;
            background: white;
        }

        .lang-links span {
            color: #cbd5e1;
        }

        /* === CONTENT AREA === */
        .content-area {
            flex: 1;
            padding: 24px;
            background: #f8fafc;
            overflow-x: hidden;
        }

        .content-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* === OVERLAY === */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .overlay.active {
            display: block;
            opacity: 1;
        }

        /* === TABLE STYLES === */
        .table-container {
            overflow-x: auto;
            width: 100%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            font-size: 14px;
        }

        table thead tr {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        table th {
            padding: 16px 12px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f1f5f9;
            text-align: center;
            vertical-align: middle;
        }

        table tbody tr:hover {
            background-color: #f8fafc;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        /* === FORM STYLES === */
        .edit-form {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .edit-form input,
        .edit-form select,
        .edit-form textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s ease;
            background: #fafafa;
        }

        .edit-form input:focus,
        .edit-form select:focus,
        .edit-form textarea:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .edit-form button[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .edit-form button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* === SHOW BOX STYLES === */
        .show-box {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            max-width: 1000px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .show-box h2 {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 12px;
            margin: 32px 0 20px 0;
        }

        .show-box h2:first-child {
            margin-top: 0;
        }

        .show-box p {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .show-box strong {
            min-width: 200px;
            color: #4b5563;
            font-weight: 600;
            flex-shrink: 0;
        }

        /* === ACTION BUTTONS === */
        .btn-action {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
            margin: 2px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
        }

        .btn-edit:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-show {
            background: #10b981;
            color: white;
        }

        .btn-show:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        /* === IMAGE STYLES === */
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        img.table-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        img.show-img {
            max-width: 400px;
            margin-top: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* === PAGINATION === */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            flex-wrap: wrap;
            gap: 4px;
            margin-top: 24px;
        }

        .pagination li a,
        .pagination li span {
            padding: 10px 14px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            display: block;
            min-width: 44px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .pagination li.active span {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .pagination li a:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
        }

        /* === SCROLLBAR === */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* === RESPONSIVE DESIGN === */

        /* Mobile First Approach - All mobile styles by default then override for larger screens */
        @media (max-width: 767px) {
    .btn-action {
        padding: 6px 12px;
        font-size: 12px;
        min-width: 60px;
        margin: 1px;
    }
    
    .btn-login {
        padding: 10px 16px;
        font-size: 13px;
        width: 100%;
        text-align: center;
        margin-top: 15px;
    }
    
    .action-buttons {
        gap: 2px;
    }
}

@media (min-width: 768px) and (max-width: 1023px) {
    .btn-action {
        padding: 7px 14px;
        font-size: 12px;
        min-width: 65px;
    }
    
    .btn-login {
        padding: 11px 18px;
        font-size: 13px;
    }
}

/* Override any conflicting Bootstrap or other framework styles */
.btn-action:focus,
.btn-action:active,
.btn-login:focus,
.btn-login:active {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

/* Ensure buttons don't break on small screens */
.btn-action {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Fix for RTL layouts */
body.rtl .btn-action,
body.rtl .btn-login {
    direction: ltr;  /* Keep button text LTR even in RTL layout */
}

/* Additional fixes for table buttons */
table .btn-action {
    margin: 1px 2px;
    vertical-align: middle;
}

/* Hover effects for better UX */
.btn-action:not(:disabled):hover,
.btn-login:not(:disabled):hover {
    text-decoration: none !important;
}

/* Disabled state */
.btn-action:disabled,
.btn-login:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}

.btn-action:disabled:hover,
.btn-login:disabled:hover {
    transform: none !important;
    box-shadow: none !important;
}
        /* For screens smaller than 768px (mobile) */
        @media (max-width: 767px) {
            .sidebar {
                width: 100vw;
                transform: translateX(-100%);
            }

            body.rtl .sidebar {
                transform: translateX(100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin: 0 !important;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .main-header {
                padding: 12px 16px;
                flex-direction: column;
                gap: 12px;
                align-items: stretch;
            }

            .header-left {
                width: 100%;
                justify-content: space-between;
                align-items: center;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 8px;
            }

            .page-title {
                font-size: 18px;
                flex: 1;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                margin: 0 12px;
            }

            .user-info {
                font-size: 12px;
                min-width: 120px;
            }

            .notification-icon {
                font-size: 18px;
                padding: 6px;
            }

            .logout-btn {
                padding: 8px 12px;
                font-size: 12px;
            }

            .lang-links {
                font-size: 12px;
                padding: 6px 8px;
                gap: 4px;
            }

            .content-area {
                padding: 16px 12px;
            }

            .sidebar-header h2 {
                font-size: 18px;
            }

            .nav-link {
                font-size: 14px;
                padding: 14px 16px;
            }

            /* Table Responsiveness */
            .table-container {
                border-radius: 8px;
            }

            table {
                font-size: 12px;
                min-width: 600px; /* Ensure horizontal scroll for table */
            }

            table th,
            table td {
                padding: 10px 8px;
                font-size: 12px;
                white-space: nowrap;
            }

            .btn-action {
                padding: 6px 8px;
                font-size: 10px;
                margin: 1px;
            }

            /* Form Responsiveness */
            .edit-form {
                padding: 20px 16px;
                margin: 0;
                border-radius: 8px;
            }

            .edit-form input,
            .edit-form select,
            .edit-form textarea {
                font-size: 14px;
                padding: 12px;
            }

            /* Show Box Responsiveness */
            .show-box {
                padding: 20px 16px;
                margin: 0;
                border-radius: 8px;
            }

            .show-box p {
                flex-direction: column;
                gap: 4px;
            }

            .show-box strong {
                min-width: auto;
                width: 100%;
                margin-bottom: 4px;
            }

            /* Images */
            img.table-img {
                width: 40px;
                height: 40px;
            }

            img.show-img {
                max-width: 100%;
            }
        }

        /* Tablet styles (768px to 1023px) */
        @media (min-width: 768px) and (max-width: 1023px) {
            .sidebar {
                width: 280px;
                transform: translateX(-100%);
            }

            body.rtl .sidebar {
                transform: translateX(100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin: 0 !important;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .main-header {
                padding: 16px 20px;
            }

            .page-title {
                font-size: 22px;
            }

            .content-area {
                padding: 20px 16px;
            }

            .edit-form {
                padding: 24px 20px;
                max-width: 600px;
            }

            .show-box {
                padding: 24px 20px;
                max-width: 700px;
            }

            .show-box strong {
                min-width: 160px;
            }
        }

        /* Desktop styles (1024px and up) */
        @media (min-width: 1024px) {
            .sidebar {
                transform: translateX(0);
            }

            .main-content {
                width: calc(100% - 280px);
            }

            body.rtl .main-content {
                margin-right: 280px;
                margin-left: 0;
            }

            body.ltr .main-content {
                margin-left: 280px;
                margin-right: 0;
            }

            .menu-toggle {
                display: none;
            }

            .main-header {
                flex-direction: row;
                align-items: center;
            }

            .header-left {
                flex: 1;
            }

            .header-right {
                flex-shrink: 0;
                width: auto;
            }
        }

        /* Large desktop styles (1200px and up) */
        @media (min-width: 1200px) {
            .content-wrapper {
                max-width: 1600px;
            }

            .main-header {
                padding: 20px 32px;
            }

            .content-area {
                padding: 32px;
            }

            .edit-form {
                max-width: 900px;
                padding: 40px;
            }

            .show-box {
                max-width: 1100px;
                padding: 40px;
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
                <div class="nav-item">
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="fas fa-tachometer-alt {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.dashboard') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="fas fa-users {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.users') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/orphans" class="nav-link">
                        <i class="fas fa-child {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.orphans') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/projects" class="nav-link">
                        <i class="fas fa-project-diagram {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.projects') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/jobs" class="nav-link">
                        <i class="fas fa-briefcase {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.jobs') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/sponsorships" class="nav-link">
                        <i class="fas fa-handshake {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.sponsorships') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/reports" class="nav-link">
                        <i class="fas fa-chart-bar {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.reports') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/news" class="nav-link">
                        <i class="fas fa-newspaper {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.news') }}
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/admin/orphan_applications" class="nav-link">
                        <i class="fas fa-file-alt {{ app()->getLocale() == 'ar' ? 'ml-3' : 'mr-3' }}"></i>
                        {{ __('admindashboardlayout.orphan_applications') }}
                    </a>
                </div>
            </div>
        </nav>

        <div class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title">@yield('title', __('admindashboardlayout.dashboard'))</h1>
                </div>
                <div class="header-right">
                    <a href="{{ url('/admin/messages') }}" class="notification-icon" title="{{ __('admindashboardlayout.unread_messages') }}">
                        <i class="fas fa-bell"></i>
                        @if ($unreadCount > 0)
                            <span class="counter">{{ $unreadCount }}</span>
                        @endif
                    </a>

                    <div class="user-info">
                        <i class="fas fa-user-shield {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                        <span>{{ __('admindashboardlayout.welcome_admin') }}</span>
                    </div>

                    <div class="lang-links">
                        <a href="{{ route('lang.switch', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'active' : '' }}">
                            {{ __('nav.arabic') }}
                        </a>
                        <span>|</span>
                        <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">
                            {{ __('nav.english') }}
                        </a>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                            {{ __('admindashboardlayout.logout') }}
                        </button>
                    </form>
                </div>
            </header>

            <main class="content-area">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <div class="overlay" id="overlay"></div>

    <script>
        // DOM Elements
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const body = document.body;

        // Toggle mobile menu
        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            // Update menu icon
            const icon = menuToggle.querySelector('i');
            if (sidebar.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        }

        // Close sidebar
        function closeSidebar() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            
            // Reset menu icon
            const icon = menuToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }

        // Event Listeners
        if (menuToggle) {
            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    closeSidebar();
                }
            }
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });

        // Add active class to current nav item
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });

            // Close mobile menu when nav link is clicked
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        setTimeout(closeSidebar, 150); // Small delay for better UX
                    }
                });
            });
        });

        // Smooth scrolling for better UX
        document.documentElement.style.scrollBehavior = 'smooth';

        // Add loading state to forms
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.style.opacity = '0.7';
                    submitBtn.disabled = true;
                    
                    // Re-enable after 3 seconds to prevent permanent disable
                    setTimeout(() => {
                        submitBtn.style.opacity = '1';
                        submitBtn.disabled = false;
                    }, 3000);
                }
            });
        });

        // Enhanced table interactions
        const tables = document.querySelectorAll('table tbody tr');
        tables.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.transition = 'transform 0.2s ease';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add confirmation for delete buttons
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('هل أنت متأكد من أنك تريد حذف هذا العنصر؟ / Are you sure you want to delete this item?')) {
                    e.preventDefault();
                }
            });
        });

        // Auto-hide success/error messages
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 500);
            }, 5000);
        });

        // Add focus management for accessibility
        document.addEventListener('keydown', function(e) {
            // Close sidebar on Escape key
            if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                closeSidebar();
            }
            
            // Focus management for mobile menu
            if (e.key === 'Tab' && sidebar.classList.contains('active') && window.innerWidth < 1024) {
                const focusableElements = sidebar.querySelectorAll('a, button, input, select, textarea');
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];
                
                if (e.shiftKey && document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                } else if (!e.shiftKey && document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        });

        // Performance optimization: Throttle resize events
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Add any resize-specific optimizations here
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            }, 250);
        });

        // Prevent horizontal scroll on body
        document.body.style.overflowX = 'hidden';
        document.documentElement.style.overflowX = 'hidden';
    </script>
</body>
</html>