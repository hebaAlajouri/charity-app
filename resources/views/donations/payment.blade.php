<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;          /* Soft Deep Blue */
            --primary-gold: #C9B458;          /* Soft Muted Gold */
            --accent-navy: #7EB6C1;           /* Baby Blue - Calm */
            --accent-gold: #E3D58A;           /* Soft Warm Gold */
            --light-gold: #F5F9FA;            /* Very Light Blue-Gray */
            --dark-navy: #1F2F3A;             /* Dark Navy */
            --muted-blue: #A6C1D9;            /* Light Dusty Baby Blue */
            --soft-beige: #D4E6E8;            /* Pale Baby Blue Tint */
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        body {
            background-color: var(--soft-beige);
            color: var(--dark-navy);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            color: var(--primary-navy);
        }

        p, label {
            color: var(--primary-navy);
        }

        /* Inputs and radios */
        input[type="radio"] {
            accent-color: var(--primary-gold);
        }

        .cursor-pointer:hover {
            color: var(--primary-gold);
        }

        /* Button */
        button[type="submit"] {
            background: var(--primary-gold);
            color: var(--dark-navy);
            font-weight: 700;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: var(--accent-gold);
        }

        .text-gray-700 {
            color: var(--primary-navy) !important;
        }

        .text-gray-600 {
            color: var(--muted-blue) !important;
        }
    </style>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ __('payment.payment_method_title') }}</h1>

        <p class="mb-6 text-center text-gray-700">
            {{ __('payment.amount_label') }}: <strong>{{ number_format($donation->amount, 2) }} د.أ</strong>
        </p>

        <form method="POST" action="{{ route('donations.processPayment', [$project, $donation]) }}">
            @csrf

            <div class="space-y-4 mb-6">
                @foreach (__('payment.payment_methods') as $key => $label)
                    <label class="block cursor-pointer">
                        <input type="radio" name="payment_type" value="{{ $key }}" required class="mr-2" />
                        {{ $label }}
                    </label>
                @endforeach
            </div>

            <p class="text-sm text-gray-600 mb-6 text-center">{!! __('payment.secure_payment_note') !!}</p>

            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded font-semibold hover:bg-green-700 w-full">
                {{ __('payment.confirm_pay_button') }}
            </button>
        </form>
    </div>
</x-app-layout>