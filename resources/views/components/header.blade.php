<header class="bg-white fixed top-0 w-full z-50 shadow-sm">
    <div class="col flex justify-between items-center h-16">
        <div>
            <a href="/">
                <div class="h-16 w-16" aria-label="Home">
                    <img src="{{ asset('/asset/img/LogoNAV.png') }}" alt="Home" class="h-full w-full object-cover">
                </div>
            </a>
        </div>

        <div>
            <nav class="flex text-sm font-bold max-sm:hidden">
                <a href="/women?selectedGenders[]=Women" class="p-5 hover:underline underline-offset-4 focus:underline">WOMEN</a>
                <a href="/man?selectedGenders[]=Men" class="p-5 hover:underline underline-offset-4 focus:underline">MAN</a>
                <a href="/newarrivals" class="p-5 hover:underline underline-offset-4 focus:underline">NEW ARRIVALS</a>
                <a href="/contact" class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
            </nav>
        </div>

        <div class="flex">
            <!-- SIGN IN -->
            @guest
                <a href="/login" class="p-3 text-sm font-bold hover:underline underline-offset-4">
                    SIGN IN
                </a>
            @else
                <livewire:setting-dropdown />
            @endguest

            <!-- CART -->
            <button class="drawer-toggle p-3 text-2xl" onclick="toggleDrawer()">
                <i class="bx bx-shopping-bag"></i>
                <span id="cart-count"
                    class="absolute top-1 right-10 bg-black text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">0</span>
            </button>
        </div>
    </div>

    <!-- CART DRAWER -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-1000 ease-in-out"
        onclick="toggleDrawer()"></div>
    <div id="drawer"
        class="fixed top-0 right-[-500px] w-[500px] h-full bg-white transition-all duration-500 z-10 max-[431px]:w-[300px]">
        <div class="p-5 flex flex-col justify-center items-center max-sm:hidden">
            <button class="text-4xl absolute top-2 left-2" onclick="toggleDrawer()">
                <i class="bx bx-x"></i>
            </button>
            <h2 class="text-3xl font-semibold mb-2">CART</h2>
            <p>You're <strong>$0</strong> away from free shipping!</p>
            <div id="productContainer" class="relative grid-cols-1 w-full h-[8.25rem] mt-5"></div>
            <div class="absolute bottom-0 left-0 right-0">
                <div class="flex flex-col justify-between items-center border-t border-gray-300 p-5">
                    <div class="flex justify-between w-full">
                        <span class="text-lg font-semibold">Total</span>
                        <span class="text-lg" id="subtotal">$0</span>
                    </div>
                    <div class="flex justify-between w-full">
                        <span class="text-lg font-semibold">Shipping</span>
                        <span class="text-lg" id="shipping">FREE</span>
                    </div>
                </div>
                <a href="#">
                    <button class="bg-black hover:bg-opacity-80 text-xl text-white w-full h-[70px]">
                        Order
                    </button>
                </a>
            </div>
        </div>

        <!-- Responsive Navbar mobile -->
        <div class="p-5 flex flex-col justify-center items-center">
            <button class="text-4xl absolute top-2 left-2" onclick="toggleDrawer()">
                <i class="bx bx-x"></i>
            </button>
            <nav
                class="flex text-sm font-bold xl:hidden max-sm:flex-col max-sm:text-center max-sm:space-y-3 max-sm:text-xl">
                <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">HOME</a>
                <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">WOMAN</a>
                <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">MAN</a>
                <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">NEW ARRIVALS</a>
                <a href="/contact" class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
            </nav>
        </div>
    </div>

    <!-- Menu Mobile -->
    <button class="sm:hidden" onclick="toggleDrawer()">
        <i class="bx bx-menu max-sm:text-4xl"></i>
    </button>
</header>

<!-- OPEN CART -->
<script>
    function toggleDrawer() {
        const drawer = document.getElementById("drawer");
        const overlay = document.getElementById("overlay");
        drawer.classList.toggle("right-0");
        drawer.classList.toggle("right-[-500px]");
        overlay.classList.toggle("hidden");
        overlay.classList.toggle("opacity-0");
        overlay.classList.toggle("opacity-100");
    }
</script>

<!-- REMOVE PRODUCT FROM CART -->
<script>
    var deleteButton = document.getElementById("deleteProductBtn");
    deleteButton.addEventListener("click", function() {
        var productContainer = document.getElementById("productContainer");
        productContainer.remove();
    });
</script>
