<x-app-layout>
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

    <div class="min-h-screen flex items-center justify-center {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="apply-container">
      <h1 class="text-3xl font-bold mb-4">
    {{ app()->getLocale() === 'en' ? $job->title_en : $job->title }}
</h1>

            <p>{{ __('careersapply.apply_instruction') }}</p>
            <div class="email-box">📧 {{ $hrEmail }}</div>
            <p class="note">{{ __('careersapply.apply_note') }}</p>

            <a href="{{ route('careers.show', $job) }}" class="back-link">
                {{ __('careersapply.back_to_job') }}
            </a>
        </div>
    </div>
</x-app-layout>
