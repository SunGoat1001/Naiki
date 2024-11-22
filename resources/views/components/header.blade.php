<header class="bg-white fixed top-0 w-full z-50 shadow-sm">
    <div class="col flex justify-between items-center h-16">
        <a href="./">
            <div class="bg-[url('./asset/img/LogoNAV.png')] bg-cover h-16 w-16" aria-label="Home"></div>
        </a>
        <nav class="flex text-sm font-bold max-sm:hidden">
            <a href="./women" class="p-5 hover:underline underline-offset-4 focus:underline">WOMAN</a>
            <a href="./man" class="p-5 hover:underline underline-offset-4 focus:underline">MAN</a>
            <a href="./newarrivals" class="p-5 hover:underline underline-offset-4 focus:underline">NEW ARRIVALS</a>
            <a href="./contact" class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
        </nav>

        <!-- CART -->
        <button class="drawer-toggle p-3 text-2xl" onclick="toggleDrawer()">
            <i class="bx bx-shopping-bag"></i>
            <span id="cart-count"
                class="absolute top-1 right-10 bg-black text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">0</span>
        </button>

        <!-- CART DRAWER -->
        <div id="overlay"
            class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-1000 ease-in-out"
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
                    <a href="./contact" class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
                </nav>
            </div>
        </div>

        <!-- Menu Mobile -->
        <button class="sm:hidden" onclick="toggleDrawer()">
            <i class="bx bx-menu max-sm:text-4xl"></i>
        </button>
    </div>
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

<!-- AUTO CALC -->
<script>
    let cartCount = 0;

    function addToCart() {
        // Cập nhât con số trên giỏ hàng
        cartCount++;
        document.getElementById("cart-count").innerText = cartCount;

        // Lấy thông tin sản phẩm
        const productTitle = document.querySelector(".product-title").innerText;
        const productPrice = document
            .querySelector(".price")
            .innerText.split("\n")[1]
            .trim();
        const selectedColorElement =
            document.querySelector(".color.bg-red-500") ||
            document.querySelector(".color-selected");
        const selectedColor = selectedColorElement ?
            selectedColorElement.getAttribute("data-color") :
            "";
        const selectedSizeElement = document.querySelector(
            'input[name="size"]:checked'
        );
        const selectedSize = selectedSizeElement ? selectedSizeElement.value : "";

        // Kiểm tra nếu không chọn màu hoặc kích thước
        if (!selectedColor || !selectedSize) {
            alert("Please select a color and size.");
            return;
        }

        // Tạo phần tử mới cho sản phẩm trong giỏ hàng
        const productContainer = document.getElementById("productContainer");
        const productElement = document.createElement("div");
        productElement.classList.add(
            "relative",
            "flex",
            "w-full",
            "h-[8.25rem]",
            "mt-5",
            "border-b-2",
            "border-gray-200"
        );

        productElement.innerHTML = `
      <img src="https://i.pinimg.com/564x/82/7e/3a/827e3aacabbdc670a6760c1b2fe776e8.jpg" alt="" class="w-[6.5rem] h-[6.5rem] mt-3 object-cover">
      <div class="flex flex-col mt-3 ml-3">
        <span class="font-semibold text-xl">${productTitle}</span>
        <span>Color: ${selectedColor}</span>
        <span>Size: ${selectedSize}</span>
        <button id="deleteProductBtn" class="absolute right-0 top-3 text-2xl" onclick="deleteProduct(this)"><i class='bx bx-x'></i></button>
        <span>Quantity: <input type="number" id="quantity" name="quantity" min="1" max="99" value="1" class="h-7 w-10" onchange="updateTotal()"></span>
        <span class="absolute right-0 bottom-3" id="productPrice">${productPrice}</span>
      </div>
    `;

        // Thêm phần tử mới vào giỏ hàng
        productContainer.appendChild(productElement);

        // Cập nhật tổng giá trị giỏ hàng
        updateTotal();

        // Mở giỏ hàng
        toggleDrawer();
    }

    function deleteProduct(element) {
        // Xóa sản phẩm khỏi giỏ hàng
        const productElement = element.parentElement.parentElement;
        productElement.remove();

        if (cartCount > 0) {
            cartCount--;
            updateCartCount();
        }

        // Cập nhật tổng giá trị giỏ hàng
        updateTotal();
    }

    function updateCartCount() {
        document.getElementById("cart-count").innerText = cartCount;
    }

    function updateTotal() {
        const productElements = document.querySelectorAll(
            "#productContainer > div"
        );
        let totalPrice = 0;

        productElements.forEach((element) => {
            const priceElement = element.querySelector("#productPrice");
            const quantityElement = element.querySelector("#quantity");

            if (priceElement && quantityElement) {
                const price = parseFloat(
                    priceElement.innerText.replace("$", "").trim()
                );
                const quantity = parseInt(quantityElement.value);
                totalPrice += price * quantity;
            }
        });

        // Hiển thị tổng giá trị
        document.getElementById("subtotal").innerText = `$${totalPrice.toFixed(
            2
        )}`;
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

<!-- CHANGE IMAGE WHEN MOVEOVER -->
<script>
    const thumbnails = document.querySelectorAll(".thumbnail img");
    const mainImage = document.querySelector(".main-image img");

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("mouseover", function() {
            mainImage.src = this.src;

            thumbnails.forEach((thumb) => (thumb.style.border = "none"));

            this.style.border = "solid 3px #33ccff";
        });
    });
</script>

<!-- NAV TAB DESCRIBE + REVIEWS -->
<script>
    const tabs = document.querySelectorAll(".tab_btn");
    const all_content = document.querySelectorAll(".content");
    const line = document.querySelector(".line");

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", (e) => {
            tabs.forEach((tab) => {
                tab.classList.remove("active");
            });
            tab.classList.add("active");

            line.style.width = tab.offsetWidth + "px";
            line.style.left = tab.offsetLeft + "px";

            all_content.forEach((content) => {
                content.classList.remove("active");
            });
            all_content[index].classList.add("active");
        });
    });

    window.addEventListener("resize", () => {
        const activeTab = document.querySelector(".tab_btn.active");
        line.style.width = activeTab.offsetWidth + "px";
        line.style.left = activeTab.offsetLeft + "px";
    });

    document.addEventListener("DOMContentLoaded", () => {
        const activeTab = document.querySelector(".tab_btn.active");
        line.style.width = activeTab.offsetWidth + "px";
        line.style.left = activeTab.offsetLeft + "px";
    });
</script>
