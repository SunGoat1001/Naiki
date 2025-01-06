<x-layout>
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">

    <div class="flex gap-4 pt-6">
        <!-- IMAGE GALLERY -->
        <div class="flex flex-col gap-2 px-2 ml-[2px]">
            @foreach ($product_images as $product_image)
                <div
                    class="thumbnail w-20 h-20 cursor-pointer hover:border-4 hover:rounded-xl hover:border-blue-400 hover:scale-105 hover:transform hover:duration-100">
                    <img src="{{ $product_image->image_url }}" alt="{{ $product->name }}"
                        class="w-full h-full rounded-lg" />
                </div>
            @endforeach
        </div>

        <!-- MAIN IMAGE -->
        <div class="main-image w-full max-w-[535px] h-[580px] max-[431px]:p-4">
            <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}"
                class="w-full h-full object-cover aspect-square rounded-lg" />
        </div>

        <!-- PRODUCT DETAILS -->
        <div class="w-full max-w-[455px] ml-4 max-[431px]:p-4">
            <div class="px-[2px] py-0">
                <i class="bx bxs-star text-yellow-400"></i>
                <i class="bx bxs-star text-yellow-400"></i>
                <i class="bx bxs-star text-yellow-400"></i>
                <i class="bx bxs-star text-yellow-400"></i>
                <i class="bx bxs-star-half text-yellow-400"></i>
            </div>
            <h1 class="product-name mb-[10px] text-4xl font-bold">{{ $product->name }}</h1>
            <div class="product-price font-bold text-neutral-950 mx-3 my-0 text-lg">
                <strong>Price</strong><br />
                <label for="">
                    {{ $product->price }}$
                </label>
            </div>
            <hr />



            <div id="product-options">

<!-- COLORS -->
<div id="colors">
    <h3 class="text-xl font-semibold">Available Colors:</h3>
    <div class="flex gap-2 mt-2">
        @foreach ($colors as $color)
            <div
                class="color w-8 h-8 cursor-pointer rounded-full" 
                style="background-color: {{ strtolower($color->name) }};" 
                data-color="{{ $color->name }}" 
                title="{{ $color->name }}" 
                onclick="selectColor(this)">
            </div>
        @endforeach
    </div>
</div>

<!-- SIZES -->
<div id="sizes" class="mt-4">
    <h3 class="text-xl font-semibold">Available Sizes:</h3>
    <div class="flex flex-wrap gap-2 mt-2">
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
    </div>
</div>
</div>
            <!-- ADD TO CART BUTTON -->
            <button
                class="w-full p-4 mt-6 bg-black text-white font-bold rounded-lg transition ease-in-out delay-150 hover:bg-indigo-500 duration-300"
                onclick="addToCart()">
                Add to Cart
            </button>
        </div>
    </div>

    <!-- PRODUCT DESCRIPTION & REVIEWS -->
    <div class="w-[1280px] m-auto max-[431px]:container pt-8">
        <div class="tabs flex justify-evenly relative font-bold text-lg p-4 max-[431px]:flex-row">
            <button
                class="tab_btn relative text-indigo-500 cursor-pointer px-[10px] py-[15px] transition-colors duration-300"
                data-target="description">Description</button>
            <button
                class="tab_btn relative text-gray-500 cursor-pointer px-[10px] py-[15px] transition-colors duration-300"
                data-target="reviews">Reviews</button>
            <div
                class="line absolute top-14 left-0 h-1 bg-indigo-500 rounded-lg w-24 transition-all duration-300 ease-in-out">
            </div>
        </div>
        <div id="description" class="content active block shadow-lg rounded-lg mx-6 my-0 p-6">
            <p class="mb-4">
                <b class="text-xl font-bold">ALWAYS FRESH.</b>
            </p>
            <p class="mb-4">
                Inspired by the original that debuted in 1985, the Air Jordan 1 Low
                offers a clean, classic look that's familiar yet always fresh. With
                an iconic design that pairs perfectly with any 'fit, these kicks
                ensure you'll always be on point.
            </p>
            <p class="mb-4">
                <b class="text-xl font-bold">Benefits</b>
            </p>
            <ul class="list-disc pl-5 mb-4">
                <li class="mb-2">
                    Encapsulated Air-Sole unit provides lightweight cushioning.
                </li>
                <li class="mb-2">
                    Solid rubber outsole enhances traction on a variety of surfaces.
                </li>
                <li class="mb-2">Colour Shown: White/Varsity Red/White/Black</li>
                <li class="mb-2">Style: 553558-161</li>
                <li class="mb-2">Country/Region of Origin: Vietnam, Indonesia</li>
            </ul>
        </div>
        <div id="reviews" class="content active hidden shadow-lg rounded-lg mx-6 my-0">
            <article class="p-4 mb-6 border-b border-gray-200 last:border-b-0">
                <div class="text-yellow-300 mb-2">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                </div>
                <h4 class="text-lg font-semibold mb-2">
                    This is the greatest online shop that I've ever ordered!
                </h4>
                <span class="italic text-gray-400 mb-4 block"><span class="font-medium">Son Goku</span> no
                    <span class="font-medium">Jun 15, 2024</span></span>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius
                    tempore maiores id, illum sit sapiente a eum consectetur cum natus
                    ipsum officiis dolor praesentium non minima. Eius tempore
                    consequatur nobis, unde blanditiis, vel, deserunt cum facere
                    excepturi ratione reiciendis iste!
                </p>
            </article>
        </div>
    </div>


    <div class="max-w-[1160px] mx-auto p-12">
        <h4 class="text-3xl font-semibold mb-3">You also might like</h4>
        <section class="py-10">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list flex">
                        <li class="splide__slide mx-2 mb-8 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/i1-7b457df1-d698-455e-ba39-694868991933/air-jordan-1-low-shoes-nGLZR9.png"
                                    alt="Image 1" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low</h4>
                                <h4 class="font-medium text-lg">$80.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/1fcccc5c-b4ee-4765-9ba1-d2a9a6c08bc6/air-jordan-1-low-shoes-459b4T.png"
                                    alt="Image 2" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low</h4>
                                <h4 class="font-medium text-lg">$80.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/b587cf81-b49a-4200-9a7c-8daa033ed393/air-jordan-1-low-shoes-459b4T.png"
                                    alt="Image 3" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low</h4>
                                <h4 class="font-medium text-lg">$80.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/13580661-54fd-4a68-8e2f-c8207e3026eb/air-jordan-1-low-shoes-ZHhKk2.png"
                                    alt="Image 4" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low</h4>
                                <h4 class="font-medium text-lg">$80.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/b95033d3-2b18-4e8e-b386-56e4209b3352/air-jordan-1-low-shoes-zTWr01.png"
                                    alt="Image 5" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low</h4>
                                <h4 class="font-medium text-lg">$80.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/36a0198b-3c7b-4013-87fd-69ae4f35975f/air-jordan-1-low-se-shoes-xmgzfl.png"
                                    alt="Image 6" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">Air Jordan 1 Low SE</h4>
                                <h4 class="font-medium text-lg">$90.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/8e2656f4-79b6-4d37-93c1-ea558a1c6a6d/air-jordan-1-low-g-nrg-golf-shoes-bf4r0T.png"
                                    alt="Image 7" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">
                                    Air Jordan 1 Low G NRG
                                </h4>
                                <h4 class="font-medium text-lg">$120.3</h4>
                            </div>
                        </li>
                        <li class="splide__slide mx-2 flex-shrink-0">
                            <div>
                                <img class="w-full h-auto object-cover rounded-lg"
                                    src="https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/73d20ad4-26ef-49d7-b79c-80042b084b5b/air-jordan-1-low-older-shoes-xLzJc6.png"
                                    alt="Image 8" />
                            </div>
                            <div class="mt-2">
                                <h4 class="font-semibold text-lg">
                                    Air Jordan 1 Low Older
                                </h4>
                                <h4 class="font-medium text-lg">$70.3</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- CHANGE MAIN IMAGE WHEN MOUSE OVER ON THUMBNAL -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const thumbnails = document.querySelectorAll(".thumbnail img");
            const mainImage = document.querySelector(".main-image img");

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener("mouseover", () => {
                    mainImage.src = thumbnail.src;
                });
            });
        });
    </script>

    <!-- AUTO CALC -->
    <script>
        let cartCount = 0;
        function selectColor(element) {
    // Loại bỏ lớp được chọn trước đó
     document.querySelectorAll(".color").forEach(color => {

        
        color.classList.remove("bg-red-500", "color-selected");
    });

    // Thêm lớp vào màu được chọn
    element.classList.add("bg-red-500", "color-selected");
}

        function addToCart() {
    // Lấy thông tin sản phẩm
    const productImage = document.querySelector(".main-image img")?.src || "";
    const productName = document.querySelector(".product-name")?.innerText || "";
    const productPrice = document.querySelector(".product-price")?.innerText.split("\n")[1]?.trim() || "";

    // Lấy phần tử màu sắc được chọn
    const selectedColorElement = document.querySelector(".color.bg-red-500") || 
                                  document.querySelector(".color.color-selected");
    const selectedColor = selectedColorElement
        ? selectedColorElement.getAttribute("data-color")
        : null;

    // Kiểm tra nếu không có màu sắc được chọn
    if (!selectedColor) {
        alert("Please select a color.");
        return;
    }

    // Lấy kích thước đã chọn
    const selectedSizeElement = document.querySelector('input[name="size"]:checked');
    const selectedSize = selectedSizeElement ? selectedSizeElement.value : null;

    // Kiểm tra nếu không có kích thước được chọn
    if (!selectedSize) {
        alert("Please select a size.");
        return;
    }

    // Cập nhật giỏ hàng
    cartCount++;
    document.getElementById("cart-count").innerText = cartCount;

    console.log("Product added to cart:", {
        productImage,
        productName,
        productPrice,
        selectedColor,
        selectedSize,
    });


   
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
      <img src="${productImage}" alt="" class="w-[6.5rem] h-[6.5rem] mt-3 object-cover">
      <div class="flex flex-col mt-3 ml-3">
        <span class="font-semibold text-xl">${productName}</span>
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

    <!-- NAV TAB DESCRIBE + REVIEWS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".tab_btn");
            const all_content = document.querySelectorAll(".content");
            const line = document.querySelector(".line");

            function updateLinePosition() {
                const activeTab = document.querySelector(".tab_btn.active");
                line.style.width = activeTab.offsetWidth + "px";
                line.style.left = activeTab.offsetLeft + "px";
            }

            tabs.forEach((tab, index) => {
                tab.addEventListener("click", () => {
                    tabs.forEach((tab) => {
                        tab.classList.remove("active");
                    });
                    tab.classList.add("active");

                    all_content.forEach((content) => {
                        content.classList.remove("block");
                        content.classList.add("hidden");
                    });
                    all_content[index].classList.remove("hidden");
                    all_content[index].classList.add("block");

                    updateLinePosition();
                });
            });

            window.addEventListener("resize", updateLinePosition);

            // Initialize the line position on page load
            updateLinePosition();
        });
    </script>

    <!-- Slide bar -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var splide = new Splide(".splide", {
                perPage: 4,
                focus: 0,
                omitEnd: true,
                gap: "1rem",
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    768: {
                        perPage: 2,
                    },
                    1024: {
                        perPage: 3,
                    },
                }
            });

            splide.mount();
        });
    </script>
</x-layout>
