<section>
    <header>
        <h2 class="text-lg font-medium" style="color: #2c3e50;">
            {{ __('profile.account_info_title') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #4f4f4f;">
            {{ __('profile.account_info_desc') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- الاسم -->
        <div>
            <x-input-label for="name" :value="__('profile.name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- البريد الإلكتروني -->
        <div>
            <x-input-label for="email" :value="__('profile.email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2" style="color: #e67e22;">
                        {{ __('profile.email_unverified') }}

                        <button form="send-verification" class="underline text-sm hover:text-red-600 transition">
                            {{ __('profile.resend_verification') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('profile.verification_link_sent') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- زر الحفظ -->
        <div class="flex items-center gap-4">
            <x-primary-button>
                {{ __('profile.save_changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >
                    {{ __('profile.saved_successfully') }}
                </p>
            @endif
        </div>
    </form>
</section>
