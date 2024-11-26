<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-white text-black px-4">
        <h1 class="text-9xl font-bold mb-4">404</h1>
        <p class="text-2xl mb-8 text-center">Oops! The page you're looking for has run off the field.</p>
        <a href="{{ url('/') }}"
            class="bg-black text-white py-4 px-8 rounded-full text-lg font-bold transition duration-300 ease-in-out hover:bg-indigo-500 hover:scale-105 transform">
            Go Back Home
        </a>
        <div class="mt-16 text-center">
            <p class="text-sm mb-2">Need assistance?</p>
            <a href="{{ url('/help') }}" class="text-sm underline hover:text-gray-600">Visit our help center</a>
        </div>
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <svg class="w-12 h-12 text-black" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z" />
            </svg>
        </div>
    </div>
</x-layout>
