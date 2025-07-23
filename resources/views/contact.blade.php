<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');

        :root {
            --primary-navy: #2C3E50;
            --primary-gold: #C9B458;
            --accent-navy: #7EB6C1; /* still used subtly */
            --accent-gold: #E3D58A;
            --light-gold: #F5F9FA;
            --dark-navy: #1F2F3A;
            --muted-blue: #A6C1D9;
            --soft-beige: #D4E6E8;
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        * {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
        }

        .main-container {
            background: linear-gradient(135deg, var(--soft-beige), var(--light-gold));
            min-height: 100vh;
            padding: 3rem 1rem;
            position: relative;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid var(--soft-beige);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gold-gradient);
            border-radius: 20px 20px 0 0;
        }

        .form-input, .form-textarea {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid var(--muted-blue);
            border-radius: 12px;
            padding: 1rem;
            color: var(--dark-navy);
            font-size: 1rem;
            width: 100%;
            text-align: right;
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--accent-navy);
            box-shadow: 0 0 0 2px rgba(126, 182, 193, 0.25);
        }

        .gradient-button {
            background: linear-gradient(135deg, var(--primary-gold), var(--accent-gold));
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            color: var(--primary-navy);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 10px 25px rgba(201, 180, 88, 0.3);
        }

        .gradient-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(201, 180, 88, 0.4);
        }

        .main-title {
            color: var(--primary-navy);
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .title-underline {
            width: 100px;
            height: 4px;
            background: var(--gold-gradient);
            margin: 0 auto 3rem;
            border-radius: 2px;
        }

        .form-label {
            color: var(--primary-navy);
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.95rem;
        }

        .success-message {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #22c55e;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>

    <div class="main-container">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="main-title">{{ __('contact.title') }}</h1>
                <div class="title-underline"></div>
            </div>

            <div class="flex justify-center">
                <div class="w-full max-w-xl">
                    <div class="glass-card p-8">
                        @if(session('success'))
                            <div class="success-message">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label">{{ __('contact.name') }}</label>
                                    <input type="text" name="name" class="form-input" placeholder="{{ __('contact.name_placeholder') }}" required>
                                </div>

                                <div>
                                    <label class="form-label">{{ __('contact.email') }}</label>
                                    <input type="email" name="email" class="form-input" placeholder="{{ __('contact.email_placeholder') }}" required>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label">{{ __('contact.subject') }}</label>
                                    <input type="text" name="subject" class="form-input" placeholder="{{ __('contact.subject_placeholder') }}">
                                </div>

                                <div>
                                    <label class="form-label">{{ __('contact.phone') }}</label>
                                    <input type="text" name="phone" class="form-input" placeholder="{{ __('contact.phone_placeholder') }}">
                                </div>
                            </div>

                            <div>
                                <label class="form-label">{{ __('contact.message') }}</label>
                                <textarea name="message" class="form-textarea" placeholder="{{ __('contact.message_placeholder') }}" required></textarea>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="gradient-button">
                                    <span>{{ __('contact.submit') }}</span>
                                    <span>🚀</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
