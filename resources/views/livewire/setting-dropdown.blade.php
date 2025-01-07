<div class="relative group m-auto">
    <div class="flex items-center cursor-pointer hover:opacity-40">
        @auth
            <span class="p-1 hidden md:block text-sm">{{ __('Hi, ') }}{{ auth()->user()->firstname }}</span>
        @endauth
        <i class='bx bx-user text-2xl'></i>
    </div>

    <div
        class="absolute left-1/2 transform -translate-x-1/2 m-auto w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block">
        <div class="px-4 py-2 text-base font-semibold border-b">Account</div>
        <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Account Settings</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-surface text-on-surface-500 cursor-pointer flex items-center gap-1 w-full rounded px-6 py-2 text-left hover:bg-primary-600 hover:text-on-primary-50 disabled:text-gray-500 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <span class="ml-4">{{ __('Logout') }}</span>
            </button>
        </form>
    </div>
</div>
