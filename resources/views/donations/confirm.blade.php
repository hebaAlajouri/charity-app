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

        /* تطبيقات الألوان */
        body {
            background-color: var(--soft-beige);
            color: var(--dark-navy);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            color: var(--primary-navy);
        }

        label {
            color: var(--primary-navy);
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            border-color: var(--muted-blue);
            background-color: white;
            color: var(--dark-navy);
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: var(--primary-gold);
            outline: none;
            box-shadow: 0 0 5px var(--primary-gold);
        }

        .border-red-500 {
            border-color: #e53e3e !important; /* لون الخطأ */
        }

        button[type="submit"] {
            background: var(--primary-gold);
            color: var(--dark-navy);
            font-weight: 700;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: var(--accent-gold);
        }

        p.text-gray-700 {
            color: var(--primary-navy);
        }

        p.text-red-600 {
            color: #e53e3e; /* نفس لون الخطأ */
        }
    </style>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">
            {{ __('donation.donate_to_project') }} {{ $project->name }}
        </h1>

        <form method="POST" action="{{ route('donations.storeDonorInfo', $project) }}">
            @csrf

            @if(!Auth::check())
                <div class="mb-4">
                    <label class="block mb-1">{{ __('donation.full_name') }}</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required
                        class="w-full border rounded p-2 @error('full_name') border-red-500 @enderror" />
                    @error('full_name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">{{ __('donation.email') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded p-2 @error('email') border-red-500 @enderror" />
                    @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">{{ __('donation.phone') }}</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border rounded p-2 @error('phone') border-red-500 @enderror" />
                    @error('phone') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            @else
                <p class="mb-4 text-gray-700">
                    {{ __('donation.welcome_logged_in', ['name' => auth()->user()->name]) }}
                </p>
            @endif

            <div class="mb-4">
                <label class="block mb-1">{{ __('donation.amount') }}</label>
                <input type="number" min="1" step="0.01" name="amount" value="{{ old('amount') ?? 10 }}" required
                    class="w-full border rounded p-2 @error('amount') border-red-500 @enderror" />
                @error('amount') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">{{ __('donation.message_optional') }}</label>
                <textarea name="message" rows="3" class="w-full border rounded p-2">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="w-full px-6 py-3 rounded font-semibold hover:bg-indigo-700">
                {{ __('donation.submit_button') }}
            </button>
        </form>
    </div>
</x-app-layout>
