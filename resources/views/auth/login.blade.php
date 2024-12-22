@vite('resources/css/app.css')

<section class="flex items-center justify-center min-h-screen bg-white">
    <div class="w-full max-w-md px-8 py-12 shadow-lg rounded-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <div class="w-10 h-10 bg-gray-900 rounded-full flex items-center justify-center">
                <span class="text-white text-xl">🌊</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-xl font-medium text-center text-gray-900 mb-8">
            {{ __('Sign in to your account') }}
        </h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Email') }}
                </label>
                <x-text-input name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                    placeholder="{{ __('Enter your email') }}" />
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">
                    {{ __('Password') }}
                </label>
                <x-text-input type="password" name="password" value="{{ old('password') }}"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all"
                    placeholder="{{ __('Enter your password') }}" />
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('password.request') }}"
                    class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                    {{ __('Forgot password?') }}
                </a>

                <button type="submit"
                    class="px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all">
                    {{ __('Sign in') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <p class="mt-8 text-center text-sm text-gray-500">
            {{ __('Not a member?') }}
            <a href="/register" class="text-gray-900 hover:underline transition-colors">
                {{ __('Register here') }}
            </a>
        </p>
    </div>
</section>
