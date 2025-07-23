<section>
    <header>
        <h2 class="text-lg font-medium" style="color: #2c3e50;">
            {{ __('password.title') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #4f4f4f;">
            {{ __('password.description') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" dir="rtl">
        @csrf
        @method('put')

        <!-- كلمة المرور الحالية -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('password.current_password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- كلمة المرور الجديدة -->
        <div>
            <x-input-label for="update_password_password" :value="__('password.new_password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- تأكيد كلمة المرور -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('password.confirm_password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- زر الحفظ -->
        <div class="flex items-center gap-4">
            <x-primary-button>
                {{ __('password.save_changes') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >
                    {{ __('password.saved_successfully') }}
                </p>
            @endif
        </div>
    </form>
</section>
