<section>
    <header>
        <h2 class="text-xl font-medium text-on-surface-600">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('user-profile-information.update') }}" class="grid grid-cols-1 gap-6">
        @csrf
        @method('put')

        <x-text-input name="firstname" :label="__('First Name')" :value="old('firstname', $user->firstname)" error-bags="updateProfileInformation" />

        <x-text-input name="lastname" :label="__('Last Name')" :value="old('lastname', $user->lastname)" error-bags="updateProfileInformation" />

        <x-text-input name="email" :label="__('Email')" :value="old('email', $user->email)" error-bags="updateProfileInformation" />

        <div class="flex items-center gap-4">
            <button type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'profile-information-updated')
                <p id="savedMessage"
                    class="text-sm text-gray-600 dark:text-gray-400 opacity-0 transition-opacity duration-300">
                    {{ __('Saved.') }}</p>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const message = document.getElementById('savedMessage');
                        message.classList.remove('opacity-0');

                        setTimeout(() => {
                            message.classList.add('opacity-0');
                            // Remove element after fade out
                            setTimeout(() => message.remove(), 300);
                        }, 2000);
                    });
                </script>
            @endif
        </div>
    </form>
</section>
