@vite('resources/css/app.css')

<section class="flex items-center justify-center min-h-screen bg-white">
    <div class="w-full max-w-md px-8 py-2 shadow-lg rounded-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <div class="w-10 h-10 bg-gray-900 rounded-full flex items-center justify-center">
                <span class="text-white text-xl">🌊</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-xl font-medium text-center text-gray-900 mb-4">
            {{ __('Create your account') }}
        </h2>

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name Fields -->
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('First name') }}
                    </label>
                    <x-text-input name="firstname" value="{{ old('firstname') }}"
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                        placeholder="{{ __('First name') }}" />
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        {{ __('Last name') }}
                    </label>
                    <x-text-input name="lastname" value="{{ old('lastname') }}"
                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                        placeholder="{{ __('Last name') }}" />
                </div>
            </div>

            <!-- Email Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Email') }}
                </label>
                <x-text-input name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                    placeholder="{{ __('Enter your email') }}" />
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Password') }}
                </label>
                <x-text-input type="password" name="password" value="{{ old('password') }}"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                    placeholder="{{ __('Create a password') }}" />
            </div>

            <!-- Confirm Password Field -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Confirm Password') }}
                </label>
                <x-text-input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                    placeholder="{{ __('Confirm your password') }}" />
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all">
                    {{ __('Create account') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <p class="mt-8 text-center text-sm text-gray-500">
            {{ __('Already have an account?') }}
            <a href="/login" class="text-gray-900 hover:underline transition-colors">
                {{ __('Sign in here') }}
            </a>
        </p>
    </div>
</section>
