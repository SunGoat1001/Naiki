<div
    class="rounded-xl bg-white border border-gray-200 hover:border-gray-400 shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
    <a href="/details/{{ $product->id }}" class="block">
        <div class="relative aspect-w-1 aspect-h-1 overflow-hidden">
            <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}"
                class="w-full h-full object-cover rounded-t-xl">
        </div>
        <div class="flex flex-col">
            <span class="text-xl font-bold mt-2">{{ $product->name }}</span>
            <span class="text-gray-500">{{ $product->gender }}'s Shoes</span>
            <span class="underline text-gray-500">More
                color</span>
            <span class="font-semibold text-lg mt-3">${{ $product->price }}</span>
        </div>
    </a>
</div>
