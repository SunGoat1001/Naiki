<x-layout>
    @section('title', 'Account Settings')
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())

                <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="flex flex-row items-center text-2xl text-on-surface-500">

                        <p class="text-sm text-on-surface-600 ml-2">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-primary-500 hover:text-primary-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                    </div>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 px-2 text-sm text-on-surface-500">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </form>

            @endif
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>

            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-layout>
