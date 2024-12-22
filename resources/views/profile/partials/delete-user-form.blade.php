<section class="w-full max-w-md">
    <header class="mb-8">
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
    </header>

    <div>
        <button id="deleteAccountBtn"
            class="px-4 py-2 bg-white text-red-600 text-sm font-medium rounded-lg border border-red-200 hover:bg-red-50 transition-all">
            {{ __('Delete Account') }}
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('settings.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <div class="space-y-2">
                <x-text-input type="password" name="password"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                    placeholder="{{ __('Enter your password to confirm') }}" error-bags="userDeletion" />
            </div>

            <div class="mt-6 flex items-center justify-end space-x-4">
                <button type="button" id="cancelDeleteBtn"
                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                    {{ __('Cancel') }}
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-all">
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
