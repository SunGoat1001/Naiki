<section class="w-full max-w-md">
    <header class="mb-8">
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('user-password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="space-y-2">
            <x-text-input type="password" name="current_password" :label="__('Current Password')" error-bags="updatePassword"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                placeholder="{{ __('Enter current password') }}" />
        </div>

        <!-- New Password -->
        <div class="space-y-2">
            <x-text-input type="password" name="password" :label="__('New Password')" error-bags="updatePassword"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                placeholder="{{ __('Enter new password') }}" />
        </div>

        <!-- Confirm New Password -->
        <div class="space-y-2">
            <x-text-input type="password" name="password_confirmation" :label="__('Confirm Password')" error-bags="updatePassword"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                placeholder="{{ __('Confirm new password') }}" />
        </div>

        <div class="flex items-center justify-between pt-4">
            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'profile-information-updated')
                <p id="savedMessage" class="text-sm text-gray-500 opacity-0 transition-opacity duration-300">
                    {{ __('Password updated') }}</p>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const message = document.getElementById('savedMessage');
                        message.classList.remove('opacity-0');

                        setTimeout(() => {
                            message.classList.add('opacity-0');
                            setTimeout(() => message.remove(), 300);
                        }, 2000);
                    });
                </script>
            @endif
        </div>
    </form>
</section>
