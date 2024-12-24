<div class="w-full h-auto flex-col max-[431px]:p-4">
    <a href="/details/{{ $product->id }}">
        <div class="relative w-full h-auto">
            <img src="{{ $product->main_image_url }}" alt="" class="w-full h-auto object-cover">
            <img src="/asset/img/product/Shoes/air-jordan-1-low-shoes-nGLZR9 (4).jpg" alt=""
                class="w-full h-auto object-cover absolute inset-0 opacity-0 hover:opacity-100 transition-opacity duration-300">
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
