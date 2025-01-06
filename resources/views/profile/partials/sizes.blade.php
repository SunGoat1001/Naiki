@foreach ($allSizes as $size)
    @php
        $isAvailable = in_array($size, $availableSizes->toArray());
    @endphp
    <label class="flex items-center cursor-pointer">
        <input 
            class="hidden peer" 
            type="radio" 
            id="size" 
            name="size" 
            value="{{ $size }}" 
            {{ $isAvailable ? '' : 'disabled' }} 
        />
        <span class="flex justify-center items-center w-20 h-10 border-2 rounded-lg 
            {{ $isAvailable ? 'peer-checked:bg-black peer-checked:text-white hover:border-black' : 'bg-gray-200 text-gray-400 cursor-not-allowed' }} 
            transition-colors duration-200">
            {{ $size }}
        </span>
    </label>
@endforeach