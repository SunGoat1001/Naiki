<div>
    <style>
        .loader {
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="col h-14 flex justify-between pb-3 mt-5">
        <!-- FILTER -->
        <div id="filterContainer" class="h-full flex items-center font-medium cursor-pointer">
            <button><i class='bx bx-filter text-2xl'></i></button>
            <strong id="filterText" class="text-sm">SHOW FILTERS</strong>
        </div>

        <form wire:submit.prevent="handleSearch" class="flex">
            <!-- SEARCH BAR -->
            <div class="h-full flex items-center space-x-2">
                <x-text-input wire:model="search" id="searchInput" name="search" placeholder="Search..."
                    class="w-[450px] border rounded p-3 text-sm max-[431px]:hidden" />
                <button type="submit" id="searchButton">
                    <i class='bx bx-search p-3 rounded-full text-white text-center bg-black'></i>
                </button>
            </div>
        </form>

        <!-- SORT BY -->
        <select wire:model.live="sortBy" class="h-full flex items-center font-bold">
            <option value="relevance">SORT BY</option>
            <option value="lowestPrice">LOWEST PRICE</option>
            <option value="highestPrice">HIGHEST PRICE</option>
            <option value="lastest">NEWEST FIRST</option>
        </select>
    </div>

    {{-- FILTER PANEL --}}
    <section class="col h-full m-auto p-2 flex max-[431px]:m-0">
        <div id="filterPanel" class="w-60 h-full max-[431px]:hidden hidden pr-4">

            <!-- FILTER BY CATEGORY -->
            <div class="w-full flex flex-col border-y-[1.5px] border-black">
                <div class="toggle-button flex justify-between cursor-pointer">
                    <span class="text-xl font-medium my-3">Shoes</span>
                    <i class='bx bx-chevron-up text-3xl my-2'></i>
                </div>
                <div class="w-full h-auto flex flex-col text-lg font-medium mb-2 hidden">
                    @foreach ($categories as $category)
                        <a wire:click="selectCategory({{ $category->id }})"
                            class="cursor-pointer {{ $selectedCategory == $category->id ? 'font-bold' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- FILTER BY GENDER -->
            <div class="w-full flex flex-col border-b-[1.5px] border-black">
                <div class="toggle-button flex justify-between cursor-pointer">
                    <span class="text-xl font-medium my-3">Gender</span>
                    <i class='bx bx-chevron-up text-3xl my-2'></i>
                </div>
                <div class="w-full h-auto text-lg font-medium mb-2">
                    <input type="checkbox" id="men" name="men" value="Men"
                        wire:model.live="selectedGenders" class="h-6 w-6">
                    <label for="men"> Men</label><br>
                    <input type="checkbox" id="women" name="women" value="Women"
                        wire:model.live="selectedGenders" class="h-6 w-6">
                    <label for="women"> Women</label><br>
                    <input type="checkbox" id="unisex" name="unisex" value="Unisex" class="h-6 w-6">
                    <label for="unisex"> Unisex</label><br>
                </div>
            </div>

            <!-- FILTER BY SIZE -->
            <div class="w-full flex flex-col border-b-[1.5px] border-black">
                <div class="toggle-button flex justify-between cursor-pointer">
                    <span class="text-xl font-medium my-3">Size</span>
                    <i class='bx bx-chevron-up text-3xl my-2'></i>
                </div>
                <ul class="w-full h-auto flex flex-wrap gap-2 text-lg font-medium mb-2 hidden">
                    @foreach ([37.5, 38, 38.5, 39, 40, 40.5, 41, 42, 42.5, 43] as $size)
                        <li>
                            <input type="checkbox" id="{{ $size }}" value="{{ $size }}"
                                wire:model.live="selectedSizes" class="hidden peer" required="">
                            <label for="{{ $size }}"
                                class="flex items-center justify-center w-14 h-14 border-[1.5px] border-black hover:border-2 rounded-md focus:bg-black focus:text-white peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 cursor-pointer">
                                <div class="text-center">
                                    {{ $size }}</div>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- FILTER BY COLOR -->
            <div class="w-full flex flex-col border-b-[1.5px] border-black">
                <div class="toggle-button flex justify-between cursor-pointer">
                    <span class="text-xl font-medium my-3">Color</span>
                    <i class='bx bx-chevron-up text-3xl my-2'></i>
                </div>
                <div class="w-full h-auto text-lg font-medium mb-2 hidden">
                    @foreach (['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow'] as $color)
                        <input type="checkbox" id="{{ $color }}" name="{{ $color }}"
                            value="{{ $color }}" wire:model.live="selectedColors" class="h-6 w-6">
                        <label for="{{ $color }}"> {{ $color }}</label><br>
                    @endforeach
                </div>
            </div>

            <!-- FILTER BY PRICE -->
            <div class="w-full flex flex-col border-b-[1.5px] border-black">
                <div class="toggle-button flex justify-between cursor-pointer">
                    <span class="text-xl font-medium my-3">Price</span>
                    <i class='bx bx-chevron-up text-3xl my-2'></i>
                </div>
                <div class="w-full h-auto text-lg font-medium mb-2 hidden">
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="selectedPriceRanges" value="under100"
                                class="h-5 w-5">
                            <span>Under $100</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="selectedPriceRanges" value="between100and200"
                                class="h-5 w-5">
                            <span>$100 - $200</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="selectedPriceRanges" value="over200"
                                class="h-5 w-5">
                            <span>Over $200</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div wire:loading.class="blur-overlay"></div>
        <div wire:loading.delay class="loader"></div>
        <!-- Product -->
        <div id="productContainer"
            class="w-full h-full mb-20 max-[431px]:m-0 max-[431px]:ml-3 grid grid-cols-4 gap-8 max-[431px]:grid-cols-1"
            wire:loading.class="opacity-50">
            @foreach ($products as $product)
                <x-product-card-items :product="$product" />
            @endforeach
        </div>
    </section>
    <div class="flex justify-center mb-4">
        {{ $products->links() }}
    </div>

    <!-- Filter hidden -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterContainer = document.getElementById('filterContainer');
            const filterPanel = document.getElementById('filterPanel');
            const filterText = document.getElementById('filterText');

            filterContainer.addEventListener('click', function() {
                if (filterPanel.style.display === 'none') {
                    filterPanel.style.display = 'block';
                    filterText.textContent = 'HIDE FILTERS';
                } else {
                    filterPanel.style.display = 'none';
                    filterText.textContent = 'SHOW FILTERS';
                }
            });
        });

        document.addEventListener('livewire:loading', () => {
            const container = document.querySelector('#productContainer');
            if (container) {
                container.classList.add('opacity-50');
            }
        });
        document.addEventListener('livewire:loaded', () => {
            const container = document.querySelector('#productContainer');
            if (container) {
                container.classList.remove('opacity-50');
            }
        });
    </script>

    <!-- Accordion hidden -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-button');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    content.classList.toggle('hidden');
                });
            });
        });
    </script>
</div>
