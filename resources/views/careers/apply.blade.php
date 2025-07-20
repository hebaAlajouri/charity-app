<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;           /* Soft Deep Blue */
            --primary-gold: #C9B458;           /* Soft Muted Gold */
            --accent-navy: #7EB6C1;            /* Baby Blue - Calm */
            --accent-gold: #E3D58A;            /* Soft Warm Gold */
            --light-gold: #F5F9FA;             /* Very Light Blue-Gray */
            --dark-navy: #1F2F3A;              /* Dark Navy */
            --muted-blue: #A6C1D9;             /* Light Dusty Baby Blue */
            --soft-beige: #D4E6E8;             /* Pale Baby Blue Tint */
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        .rtl {
            direction: rtl;
        }

        body, .min-h-screen {
            background: var(--light-gold);
        }

        .apply-container {
            background: white;
            padding: 2rem 3rem;
            border-radius: 1rem;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 12px 25px rgba(46, 61, 73, 0.12);
            text-align: center;
            color: var(--primary-navy);
        }

        .apply-container h2 {
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--primary-navy);
            margin-bottom: 1.25rem;
            text-shadow: 1px 1px 2px rgba(31, 47, 58, 0.1);
        }

        .apply-container p {
            color: var(--dark-navy);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .email-box {
            background: var(--soft-beige);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-gold);
            box-shadow: 0 0 12px rgba(201, 180, 88, 0.3);
            user-select: text;
        }

        .note {
            font-size: 0.875rem;
            color: var(--muted-blue);
            margin-top: 1rem;
        }

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: var(--accent-navy);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--primary-gold);
            text-decoration: underline;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center rtl">
        <div class="apply-container">
            <h2>التقديم على وظيفة: {{ $job->title }}</h2>
            <p>للتقديم على هذه الوظيفة، يرجى إرسال سيرتك الذاتية إلى البريد الإلكتروني التالي:</p>
            <div class="email-box">📧 {{ $hrEmail }}</div>
            <p class="note">يُرجى ذكر اسم الوظيفة في عنوان الرسالة (Subject) عند الإرسال.</p>

            <a href="{{ route('careers.show', $job) }}" class="back-link">
                ← العودة إلى تفاصيل الوظيفة
            </a>
        </div>
    </div>
</x-app-layout>
