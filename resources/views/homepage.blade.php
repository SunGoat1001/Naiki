<x-layout>
    <style>
        #wrapper {
            animation: slide 16s infinite;
        }

        @keyframes slide {
            0% {
                transform: translateY(0);
            }

            25% {
                transform: translateY(0);
            }

            35% {
                transform: translateY(-100%);
            }

            45% {
                transform: translateY(-100%);
            }

            55% {
                transform: translateY(-200%);
            }

            75% {
                transform: translateY(-200%);
            }

            85% {
                transform: translateY(-100%);
            }

            90% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        .image-list {
            -ms-overflow-style: none
        }

        .image-list::-webkit-scrollbar {
            display: none;
        }
    </style>


    <div class="fixed top-16 z-40 w-full h-7 flex justify-center items-center bg-black">
        <marquee behavior="" direction="" class="space-x-40 text-nowrap">
            <strong class="text-white text-xs">FREE SHIPPING ON ORDERS OVER $50!</strong>
            <strong class="text-white text-xs">EXCITING PROMOTIONS - LIMITED QUANTITIES!</strong>
            <strong class="text-white text-xs">FREE SHIPPING ON ORDERS OVER $50!</strong>
            <strong class="text-white text-xs">EXCITING PROMOTIONS - LIMITED QUANTITIES!</strong>
            <strong class="text-white text-xs">FREE SHIPPING ON ORDERS OVER $50!</strong>
            <strong class="text-white text-xs">EXCITING PROMOTIONS - LIMITED QUANTITIES!</strong>
        </marquee>
    </div>

    <!-- BACKGROUND -->
    <section class="relative w-full" style="height: 927px;">
        <div class="absolute w-full h-full overflow-hidden">
            <div id="wrapper" class="w-full h-full">
                <div class="flex w-full h-full">
                    <img src="/asset/img/homepage/Nike-Air-Jordan-1-Female.jpg" alt=""
                        class="w-1/2 object-cover max-lg:object-cover max-xl:object-cover max-sm:w-full">
                    <img src="/asset/img/homepage/Nike-Air-Jordan-1-Male.jpg" alt=""
                        class="w1/2 max-lg:object-cover max-xl:object-cover max-sm:hidden">
                </div>
                <div class="flex w-full h-full">
                    <img src="/asset/img/homepage/NikeXanh1.jpg" alt=""
                        class="w-1/2 max-lg:object-cover max-xl:object-cover max-sm:w-full">
                    <img src="/asset/img/homepage/NikeXanh2.jpg" alt=""
                        class="w-1/2 max-lg:object-cover max-xl:object-cover max-sm:hidden">
                </div>
                <div class="flex w-full h-full">
                    <img src="/asset/img/homepage/NikeTrang.avif" alt=""
                        class="w-1/2 object-cover max-lg:object-cover max-sm:w-full">
                    <img src="/asset/img/homepage/NikeTrang2.avif" alt=""
                        class="w-1/2 object-cover max-lg:object-cover max-sm:hidden">
                </div>
            </div>
        </div>
        <div class="absolute inset-0 bg-black opacity-15"></div>
        <div class="relative z-10 text-center text-white flex flex-col items-center justify-center h-full space-y-4">
            <p class="text-2xl font-medium">TTS</p>
            <h1 class="text-3xl font-bold max-sm:text-xl">UNLEASH YOUR POTENTIAL WITH EVERY STEP</h1>
            <p class="w-3/5 text-xl">Every world is on your feet</p>
            <div class="absolute bottom-20 flex justify-between w-[250px]">
                <div class="text-2xl underline underline-offset-4">
                    <a href="/women">WOMEN</a>
                </div>
                <div class="px-7 text-2xl underline underline-offset-4">
                    <a href="/men">MEN</a>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCT LIMITED -->
    <section class="w-full flex flex-col items-center h-[40rem] mt-14">
        <span class="font-bold text-3xl">LIMITED IN STOCK</span>
        <div class="flex justify-between mx-auto max-lg:w-full max-xl:w-[90%]">
            <div class="mt-16 max-sm:hidden">
                <div class="w-64 h-40 flex flex-col justify-center items-center mb-20">
                    <span class="text-xl font-semibold mb-2">UPPER</span>
                    <span class="text-center">Cow print fabric in black and white,
                        yellow Nike Swoosh with green outline resembling melting ice cream.</span>
                </div>
                <div class="w-64 h-40 flex flex-col justify-center items-center">
                    <span class="text-xl font-semibold mb-2">MIDSOLE AND OUTSOLE</span>
                    <span class="text-center">White midsole, green outsole for added traction and durability.</span>
                </div>
            </div>
            <img src="/asset/img/homepage/ShoesLIMITED.png" alt=""
                class="w-[35rem] h-[25rem] max-lg:w-[31rem] max-sm:ml-14 max-[431px]:ml-0 max-[431px]:h-[22rem]">
            <div class="mt-16 max-sm:hidden">
                <div class="w-64 h-40 flex flex-col justify-center items-center mb-20">
                    <span class="text-xl font-semibold mb-2">TONGUE AND LINING</span>
                    <span class="text-center">The tongue features the iconic Ben & Jerry's logo,
                        while the rainbow-patterned lining reflects the vibrant colors of their ice cream
                        packaging.</span>
                </div>
                <div class="w-64 h-40 flex flex-col justify-center items-center">
                    <span class="text-xl font-semibold mb-2">HEEL</span>
                    <span class="text-center">White cloud patterns on a blue background, prominent embroidered Nike
                        logo.</span>
                </div>
            </div>
        </div>
        <span class="font-semibold text-xl max-[431px]:text-center">Nike Dunk Low x Ben & Jerry’s “Chunky Dunky”</span>
        <button class="w-44 h-12 bg-black text-white font-semibold rounded-full mt-5 hover:opacity-70">BUY NOW</button>
    </section>

    <!-- PRODUCT -->
    <section class="py-10 col">
        <h2 class="font-bold text-3xl mb-5 text-center">NEW ARRIVALS</h2>
        <div class="container1 container2 mt-5">
            <div class="relative ">
                <button id="prev-slide"
                    class="w-12 h-12 slide-button material-symbols-rounded hidden absolute top-1/2 left-0 transform -translate-y-1/2 bg-black hover:bg-gray-800 text-white rounded-full z-10 transition-colors duration-300 ease-in-out shadow-lg flex items-center justify-center">
                    <span class="sr-only">Previous</span>
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <ul class="image-list flex overflow-x-auto  space-x-4 overflow-hidden">
                    @foreach ($products as $product)
                        <a href="/details/{{ $product->id }}">
                            <li class="flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-2">
                                <div class="relative w-[400px] h-[500px] flex flex-col">
                                    <img src="{{ $product->main_image_url }}" alt=""
                                        class="h-[400px] object-cover">
                                    <span class="font-bold text-xl m-2">{{ $product->name }}</span>
                                    <span class="font-medium ml-2">${{ $product->price }}</span>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
                <button id="next-slide"
                    class="w-12 h-12 slide-button material-symbols-rounded absolute top-1/2 right-0 transform -translate-y-1/2 bg-black hover:bg-gray-800 text-white rounded-full z-10 transition-colors duration-300 ease-in-out shadow-lg flex items-center justify-center">
                    <span class="sr-only">Next</span>
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="mt-4 h-6 relative">
                <div class="absolute inset-0  rounded-full flex items-center">
                    <div class="scrollbar-thumb h-full rounded-full w-1/2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Women, Man -->
    <div class="relative w-full h-[800px]">
        <div class="absolute flex w-full h-full bg-cover">
            <img src="/asset/img/homepage/Women.jpg" alt="" class="w-1/2 object-cover max-sm:hidden">
            <img src="/asset/img/homepage/Men.jpg" alt="" class="w-1/2 object-cover max-sm:w-full">
        </div>
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative z-10 text-center text-white flex flex-col items-center justify-center h-full space-y-4">
            <h1 class="text-5xl font-bold">GET TRAVEL READY</h1>
            <p class="text-center text-lg">Versatile style plus packable design equals <br> shoes that are always good
                to go.</p>
            <div class="absolute bottom-20 flex justify-between w-[250px]">
                <div class="text-2xl underline underline-offset-4">
                    <a href="">WOMEN</a>
                </div>
                <div class="px-7 text-2xl underline underline-offset-4">
                    <a href="">MEN</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FEEBACK -->
    <section class="col h-[30rem] max-sm:h-[65rem]">
        <div class="flex flex-col items-center mt-9">
            <span class="text-center text-3xl font-semibold">WHAT OUR CUSTOMERS SAYS</span>
            <div class="flex space-x-6 mt-5 max-sm:flex-col max-sm:space-x-0">
                <div class="flex flex-col w-80 h-72 bg-white rounded-lg space-y-3 mt-6 shadow-lg max-lg:w-[19rem]">
                    <img src="/asset/img/homepage/People2.jpg" alt=""
                        class="w-16 h-16 rounded-full mt-4 ml-4">
                    <span class="mt-4 ml-4 text-lg font-semibold">Stephen Curry</span>
                    <span class="mt-4 ml-4">Nike's products truly impress me with their quality and unique design. Will
                        definitely continue to support!</span>
                </div>
                <div class="flex flex-col w-80 h-72 bg-white rounded-lg space-y-3 mt-6 shadow-lg max-lg:w-[19rem]">
                    <img src="/asset/img/homepage/People1.jpg" alt=""
                        class="w-16 h-16 rounded-full mt-4 ml-4">
                    <span class="mt-4 ml-4 text-lg font-semibold">Emily Johnson</span>
                    <span class="mt-4 ml-4">Nike's customer service is excellent. Friendly and helpful staff assisted
                        me
                        in finding the perfect pair of shoes.</span>
                </div>
                <div class="flex flex-col w-80 h-72 bg-white rounded-lg space-y-3 mt-6 shadow-lg max-lg:w-[19rem]">
                    <img src="/asset/img/homepage/People3.jpg" alt=""
                        class="w-16 h-16 rounded-full mt-4 ml-4">
                    <span class="mt-4 ml-4 text-lg font-semibold">Alex Parker</span>
                    <span class="mt-4 ml-4">Every time I purchase Nike shoes, it's a fantastic experience.
                        The products are not only stylish but also incredibly comfortable, suitable for all
                        activities.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Email -->
    <div class="w-full h-[40vh] flex flex-col justify-center items-center bg-white">
        <span class="font-bold text-4xl mb-8">Want First Dibs?</span>
        <span class="max-sm:text-center text-lg">Join our email list and be the first to know about new limited edition
            products, material </span>
        <span class="mb-10">innovations, and lots of other fun updates</span>
        <div class="mb-5 ">
            <form action="/action_page.php">
                <input type="email" value="" required
                    class="w-96 p-2 h-12 rounded-[4px] border-black border-b-2 bg-gray-50 max-[431px]:w-full"
                    placeholder="Enter Your Email Address">
                <input type="submit" value="Subscribe"
                    class="h-12 px-5 ml-2 rounded-[4px] bg-black text-white font-semibold cursor-pointer hover:opacity-60 transition ease-out delay-50 max-[431px]:mt-4 max-[431px]:w-full max-[431px]:ml-0">
            </form>
        </div>
        <span class="text-sm max-[431px]:text-center">Note: You can opt-out at any time. See our <strong>Privacy
                Policy</strong> and
            <strong>Terms.</strong></span>
    </div>

    <!-- Slide bar -->
    <script>
        const initSlider = () => {
            const imageList = document.querySelector(".image-list");
            const slideButtons = document.querySelectorAll(".slide-button");
            const sliderScrollbar = document.querySelector(".container1 .relative > div");
            const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
            let startX = 0;
            let thumbPosition = 0;

            scrollbarThumb.addEventListener("dragstart", (e) => {
                startX = e.clientX;
                thumbPosition = scrollbarThumb.offsetLeft;
            });

            scrollbarThumb.addEventListener("drag", (e) => {
                const deltaX = e.clientX - startX;
                const newThumbPosition = thumbPosition + deltaX;
                const maxThumbPosition = sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth;
                const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

                scrollbarThumb.style.left = `${boundedPosition}px`;
                imageList.scrollLeft = scrollPosition;
            });

            scrollbarThumb.addEventListener("dragend", () => {
                startX = 0;
                thumbPosition = 0;
            });

            slideButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction;
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                });
            });

            const handleSlideButtons = () => {
                slideButtons[0].classList.toggle("hidden", imageList.scrollLeft <= 0);
                slideButtons[1].classList.toggle("hidden", imageList.scrollLeft >= maxScrollLeft);
            };

            const updateScrollThumbPosition = () => {
                const scrollPosition = imageList.scrollLeft;
                const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth -
                    scrollbarThumb.offsetWidth);
                scrollbarThumb.style.left = `${thumbPosition}px`;
            };

            imageList.addEventListener("scroll", () => {
                updateScrollThumbPosition();
                handleSlideButtons();
            });

            handleSlideButtons();
        };

        window.addEventListener("resize", initSlider);
        window.addEventListener("load", initSlider);
    </script>
</x-layout>
