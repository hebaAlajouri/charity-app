<section class="space-y-6" dir="rtl">
    <header>
        <h2 class="text-lg font-medium" style="color: #2c3e50;">
            {{ __('profile.delete_account') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #4f4f4f;">
            {{ __('profile.delete_account_description') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="background-color: #e74c3c; color: white;"
    >
        {{ __('profile.delete_account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6" dir="rtl">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium" style="color: #2c3e50;">
                {{ __('profile.delete_confirmation_title') }}
            </h2>

            <p class="mt-1 text-sm" style="color: #4f4f4f;">
                {{ __('profile.delete_confirmation_description') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" :value="__('profile.password')" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    :placeholder="__('profile.password')"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end" dir="ltr">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('profile.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" style="background-color: #e74c3c; color: white;">
                    {{ __('profile.delete_account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
