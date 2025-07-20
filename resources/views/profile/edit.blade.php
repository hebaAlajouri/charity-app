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
        :root {
        --primary-navy: #2C3E50;
        --primary-gold: #C9B458;
        --accent-navy: #7EB6C1;
        --accent-gold: #E3D58A;
        --light-gold: #F5F9FA;
        --dark-navy: #1F2F3A;
        --muted-blue: #A6C1D9;
        --soft-beige: #D4E6E8;
        --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
    }

    body {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
        background-color: var(--soft-beige);
    }

    .main-container {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--accent-navy), var(--light-gold));
        padding: 3rem 1rem;
        position: relative;
    }

    .main-container::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
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
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease-out;
    }

    .section-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 35px 65px rgba(0, 0, 0, 0.15);
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary-navy);
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
        background: var(--gold-gradient);
        border-radius: 2px;
    }

    .section-description {
        font-size: 0.9rem;
        color: var(--primary-navy);
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
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .donation-table th {
        background: var(--gold-gradient);
        color: var(--dark-navy);
        font-weight: 600;
    }

    .donation-table th, .donation-table td {
        padding: 1rem 1.25rem;
        border: none;
        border-bottom: 1px solid var(--light-gold);
    }

    .donation-table tbody tr {
        transition: all 0.3s ease;
    }

    .donation-table tbody tr:hover {
        background: var(--soft-beige);
        transform: scale(1.01);
    }

    .status-success {
        background: #d1fae5;
        color: #065f46;
        font-weight: bold;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        font-size: 0.8rem;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
        font-weight: bold;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        font-size: 0.8rem;
    }

    .sponsorship-section .section-title {
        color: var(--accent-navy);
    }

    .sponsorship-section .section-title::after {
        background: linear-gradient(45deg, var(--accent-navy), var(--muted-blue));
    }

    .donation-section .section-title {
        color: var(--primary-gold);
    }

    .donation-section .section-title::after {
        background: var(--gold-gradient);
    }

    @media (max-width: 768px) {
        .section-box {
            padding: 2rem;
        }

        .donation-table {
            font-size: 0.85rem;
        }

        .donation-table th, .donation-table td {
            padding: 0.75rem 1rem;
        }
    }

    html {
        scroll-behavior: smooth;
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