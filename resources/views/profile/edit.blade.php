<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-center text-white mb-6">
            {{ __('إدارة الحساب') }}
        </h2>
        <p class="text-center text-sm text-white/90">
            قم بتحديث بياناتك الشخصية، كلمة المرور، أو حذف حسابك.
        </p>
    </x-slot>

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
        }

        .main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 1rem;
            position: relative;
        }

        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .wrapper {
            max-width: 768px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .section-box {
            background-color: white;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            border-radius: 1.5rem;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15), 
                        0 0 0 1px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .section-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 65px rgba(0, 0, 0, 0.2), 
                        0 0 0 1px rgba(255, 255, 255, 0.15);
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 0.75rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .section-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1.75rem;
            line-height: 1.6;
        }

        .text-danger {
            color: #e74c3c !important;
        }

        .text-danger::after {
            background: #e74c3c !important;
        }

        /* Donation Table */
        .donation-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            text-align: right;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .donation-table th,
        .donation-table td {
            padding: 1rem 1.25rem;
            border: none;
            border-bottom: 1px solid #f1f5f9;
        }

        .donation-table th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .donation-table tbody tr {
            transition: all 0.3s ease;
        }

        .donation-table tbody tr:hover {
            background: linear-gradient(135deg, #667eea10 0%, #764ba210 100%);
            transform: scale(1.02);
        }

        .donation-table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-success {
            color: #16a34a;
            font-weight: bold;
            background: #16a34a20;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .status-pending {
            color: #f59e0b;
            font-weight: bold;
            background: #f59e0b20;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        /* Special styling for sponsorship section */
        .sponsorship-section .section-title {
            color: #0c4a6e;
        }

        .sponsorship-section .section-title::after {
            background: linear-gradient(135deg, #0c4a6e 0%, #0369a1 100%);
        }

        .donation-section .section-title {
            color: #15803d;
        }

        .donation-section .section-title::after {
            background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
        }

        /* Responsive enhancements */
        @media (max-width: 768px) {
            .section-box {
                padding: 2rem;
                margin-bottom: 2rem;
            }
            
            .main-container {
                padding: 2rem 1rem;
            }
            
            .donation-table {
                font-size: 0.8rem;
            }
            
            .donation-table th,
            .donation-table td {
                padding: 0.75rem 1rem;
            }
        }

        /* Smooth scrolling enhancement */
        html {
            scroll-behavior: smooth;
        }

        /* Add subtle animation to the page load */
        .section-box {
            animation: fadeInUp 0.6s ease-out;
        }

        .section-box:nth-child(2) {
            animation-delay: 0.1s;
        }

        .section-box:nth-child(3) {
            animation-delay: 0.2s;
        }

        .section-box:nth-child(4) {
            animation-delay: 0.3s;
        }

        .section-box:nth-child(5) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="main-container">
        <div class="wrapper">

            <!-- Profile Info -->
            <div class="section-box">
                <h3 class="section-title">تحديث المعلومات الشخصية</h3>
                <p class="section-description">قم بتعديل اسمك، بريدك الإلكتروني أو أي معلومات أخرى مرتبطة بالحساب.</p>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password -->
            <div class="section-box">
                <h3 class="section-title">تغيير كلمة المرور</h3>
                <p class="section-description">ننصحك باختيار كلمة مرور قوية لضمان أمان حسابك.</p>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="section-box">
                <h3 class="section-title text-danger">حذف الحساب</h3>
                <p class="section-description">يرجى الانتباه: حذف الحساب هو إجراء دائم ولا يمكن التراجع عنه.</p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Donation History -->
            <div class="section-box donation-section">
                <h3 class="section-title">سجل التبرعات</h3>

                @if($donations->isEmpty())
                    <p class="section-description">لا توجد تبرعات حتى الآن.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="donation-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المشروع</th>
                                    <th>المبلغ</th>
                                    <th>طريقة الدفع</th>
                                    <th>الحالة</th>
                                    <th>تاريخ التبرع</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donations as $index => $donation)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $donation->project?->name ?? 'غير محدد' }}</td>
                                        <td>{{ number_format($donation->amount, 2) }} د.أ</td>
                                        <td>{{ $donation->payment_type ?? '-' }}</td>
                                        <td>
                                            <span class="{{ $donation->status == 'success' ? 'status-success' : 'status-pending' }}">
                                                {{ $donation->status == 'success' ? 'ناجح' : 'قيد المعالجة' }}
                                            </span>
                                        </td>
                                        <td>{{ $donation->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Sponsorship History Section -->
            <div class="section-box sponsorship-section">
                <h3 class="section-title">سجل الكفالات</h3>

                @if($sponsorships->isEmpty())
                    <p class="section-description">لا توجد كفالات حتى الآن.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="donation-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اليتيم</th>
                                    <th>نوع الكفالة</th>
                                    <th>منذ</th>
                                    <th>عدد الأيتام</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sponsorships as $index => $sponsorship)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sponsorship->orphan?->name ?? 'غير معروف' }}</td>
                                        <td>{{ $sponsorship->sponsorship_type ?? '-' }}</td>
                                        <td>{{ $sponsorship->start_date ?? '-' }}</td>
                                        <td>{{ $sponsorship->number_of_orphans }}</td>
                                        <td>
                                            <span class="{{ $sponsorship->status == 'active' ? 'status-success' : 'status-pending' }}">
                                                {{ $sponsorship->status == 'active' ? 'نشطة' : 'منتهية' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>