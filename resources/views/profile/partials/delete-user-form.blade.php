<section class="space-y-6" dir="rtl">
    <header>
        <h2 class="text-lg font-medium" style="color: #2c3e50;">
            حذف الحساب
        </h2>

        <p class="mt-1 text-sm" style="color: #4f4f4f;">
            بعد حذف حسابك، سيتم حذف جميع بياناتك ومواردك بشكل دائم. قبل حذف الحساب، يُرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="background-color: #e74c3c; color: white;"
    >
        حذف الحساب
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6" dir="rtl">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium" style="color: #2c3e50;">
                هل أنت متأكد من رغبتك في حذف حسابك؟
            </h2>

            <p class="mt-1 text-sm" style="color: #4f4f4f;">
                بعد حذف حسابك، سيتم حذف جميع بياناتك ومواردك بشكل دائم. يرجى إدخال كلمة المرور لتأكيد رغبتك في حذف الحساب نهائيًا.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="كلمة المرور" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="كلمة المرور"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end" dir="ltr">
                <x-secondary-button x-on:click="$dispatch('close')">
                    إلغاء
                </x-secondary-button>

                <x-danger-button class="ms-3" style="background-color: #e74c3c; color: white;">
                    حذف الحساب
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
