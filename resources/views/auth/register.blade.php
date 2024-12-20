@vite('resources/css/app.css')

<section class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md px-8 py-6 bg-white rounded-lg shadow-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-2xl">🌊</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            {{ __('Create your account') }}
        </h2>

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="flex flex-col">
                {{-- line attribute --}}
                <div class="pb-2 pt-2">

                    <label>{{ __('Name') }}</label>
                    <x-text-input name="name" value="{{ old('name') }}"
                        placeholder="{{ __('Please input this field') }}" />
                </div>

                {{-- line attribute --}}
                <div class="pb-2 pt-2">

                    <label>{{ __('Email') }}</label>
                    <x-text-input name="email" value="{{ old('email') }}"
                        placeholder="{{ __('Please input this field') }}" />
                </div>

                {{-- line attribute --}}
                <div class="pb-2 pt-2">

                    <label>{{ __('Password') }}</label>
                    <x-text-input type="password" name="password" value="{{ old('password') }}"
                        placeholder="{{ __('Please input this field') }}" />
                </div>

                {{-- line attribute --}}
                <div class="pb-2 pt-2">
                    <label>{{ __('Confirm Password') }}</label>
                    <x-text-input type="password" name="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        placeholder="{{ __('Please input this field') }}" />
                </div>
            </div>

            <div
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <button type="submit" class="text-base font-normal">
                    {{ __('Register') }}
                </button>
            </div>

        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-500">
            {{ __('Already have an account?') }}
            <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">{{ __('Sign in here') }}</a>
        </p>
    </div>
</section>
