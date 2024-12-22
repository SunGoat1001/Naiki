<section class="space-y-6 bg-surface">
    <header>
        <h2 class="text-xl font-medium text-on-surface-600">
            {{ __('Delete Account') }}
        </h2>
    </header>

    <button id="deleteAccountBtn">
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('settings.destroy') }}" class="p-6 bg-white">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-on-surface-600">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-on-surface-500">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-text-input name="password" type="password" class="mt-1" placeholder="{{ __('Password') }}"
                    error-bags="userDeletion" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" id="cancelDeleteBtn">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="ms-3">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteAccountBtn = document.getElementById('deleteAccountBtn');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');

        deleteAccountBtn.addEventListener('click', () => {
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: 'confirm-user-deletion'
            }));
        });

        cancelDeleteBtn.addEventListener('click', () => {
            window.dispatchEvent(new CustomEvent('close'));
        });
    });
</script>
