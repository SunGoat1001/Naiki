<div
    class="rounded-xl bg-white border border-gray-200 hover:border-gray-400 shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
    <a href="/details/{{ $product->id }}" class="block">
        <div class="relative aspect-w-1 aspect-h-1 overflow-hidden">
            <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}"
                class="w-full h-full object-cover rounded-t-xl">
        </div>
        <div class="p-4">
            <h2 class="text-lg font-medium text-gray-900 mb-1">{{ $product->name }}</h2>
            <p class="text-sm text-gray-500 mb-2">{{ $product->gender }}'s Shoes</p>
            <p class="underline text-sm text-gray-500 mb-2">More
                color</p>
            <p class="text-md font-semibold text-gray-900">${{ $product->price }}</p>
        </div>
    </a>
</div>
