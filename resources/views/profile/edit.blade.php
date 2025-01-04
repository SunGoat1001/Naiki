<x-layout>
    @section('title', 'Account Settings')

    <div class="min-h-screen bg-white py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Email Verification Alert -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mb-8 rounded-lg bg-yellow-50 p-4">
                    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="flex items-center">
                            <p class="text-sm text-yellow-800">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification"
                                    class="ml-1 text-sm font-medium text-yellow-800 underline hover:text-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 rounded-md">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm text-yellow-700">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </form>
                </div>
            @endif

            <!-- Settings Sections -->
            <div class="space-y-10">
                <!-- Profile Information -->
                <section class="border-b border-gray-200 pb-10">
                    @include('profile.partials.update-profile-information-form')
                </section>

                <!-- Password Update -->
                <section class="border-b border-gray-200 pb-10">
                    @include('profile.partials.update-password-form')
                </section>

                <!-- Delete Account -->
                <section class="pb-10">
                    @include('profile.partials.delete-user-form')
                </section>
            </div>
        </div>
    </div>
</x-layout>
