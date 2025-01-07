<section class="w-full max-w-md">
    <header class="mb-8">
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('user-profile-information.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- First Name -->
        <div class="space-y-2">
            <x-text-input name="firstname" :label="__('First Name')" :value="old('firstname', $user->firstname)" error-bags="updateProfileInformation"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all" />
        </div>

        <!-- Last Name -->
        <div class="space-y-2">
            <x-text-input name="lastname" :label="__('Last Name')" :value="old('lastname', $user->lastname)" error-bags="updateProfileInformation"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all" />
        </div>

        <!-- Email -->
        <div class="space-y-2">
            <x-text-input name="email" :label="__('Email')" :value="old('email', $user->email)" error-bags="updateProfileInformation"
                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all" />
        </div>

        <div class="flex items-center justify-between pt-4">
            <button type="submit"
                class="px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-information-updated')
                <p id="savedMessage" class="text-sm text-gray-500 opacity-0 transition-opacity duration-300">
                    {{ __('Changes saved') }}</p>

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
