@vite('resources/css/app.css')

<section class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md px-8 py-6 bg-white rounded-lg shadow-md">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center">
                <!-- Replace with your logo icon -->
                <span class="text-white font-bold text-2xl">🌊</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center text-gray-800">
            {{ __('Sign in to your account') }}
        </h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="flex flex-col">
                {{-- line attribute --}}
                <div class="buttonpb-6 pt-6 items-center border-b border-on-surface-900">
                    <div class="col-span-1 text-on-surface-500 font-bold">
                        <label>{{ __('Email') }}</label>
                    </div>
                    <div class="col-span-4 text-on-surface-600">
                        <x-text-input name="email" value="{{ old('email') }}"
                            placeholder="{{ __('Please input this field') }}" />
                    </div>
                </div>

                {{-- line attribute --}}
                <div class="buttonpb-6 pt-6 items-center border-b border-on-surface-900">
                    <div class="col-span-1 text-on-surface-500 font-bold">
                        <label>{{ __('Password') }}</label>
                    </div>
                    <div class="col-span-4 text-on-surface-600">
                        <x-text-input type="password" name="password" value="{{ old('password') }}"
                            placeholder="{{ __('Please input this field') }}" />
                    </div>
                </div>
            </div>

            <div class="flex flex-row justify-end mt-10">
                <button href="{{ route('password.request') }}" target="_self"
                    class="flex active:translate-y-1 rounded-lg lg:rounded-2xl px-2 py-2 w-auto items-center justify-center">
                    {{ __('Forget password') }}
                </button>

                <button type="submit"
                    class="flex bg-indigo-600 hover:bg-indigo-400 active:translate-y-1 rounded-lg lg:rounded-2xl px-2 py-2 w-auto items-center justify-center">
                    {{ __('Login') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-500">
            {{ __('Not a member?') }}
            <a href="/register" class="text-indigo-600 hover:underline">{{ __('Register here') }}</a>
        </p>
    </div>
</section>
