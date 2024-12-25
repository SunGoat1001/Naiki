<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/LogoNAV.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>TienTuyenShoes</title>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
    
    body {
        font-family: "Inter", Courier, monospace;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .col {
        width: 95%;
        margin: auto;
    }
</style>

<body class="bg-[#F7F6F3] overflow-x-hidden">
    <!-- NAV -->
    <header class="bg-white fixed top-0 w-full z-50 shadow-sm">
        <div class="col flex justify-between items-center h-16">
            <a href="{{ url('/') }}">
                <div class="bg-[url('{{ asset('asset/img/LogoNAV.png') }}')] bg-cover h-16 w-16" aria-label="Home"></div>
            </a>
            <nav class="flex text-sm font-bold max-sm:hidden">
                <a href="{{ url('/women') }}" class="p-5 hover:underline underline-offset-4 focus:underline">WOMAN</a>
                <a href="{{ url('/men') }}" class="p-5 hover:underline underline-offset-4 focus:underline">MAN</a>
                <a href="{{ url('/newarrivals') }}" class="p-5 hover:underline underline-offset-4 focus:underline">NEW ARRIVALS</a>
                <a href="{{ url('/contact') }}" class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
            </nav>
            <!-- CART -->
            <div id="overlay"
                class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-1000 ease-in-out"
                onclick="toggleDrawer()"></div>
            <div id="drawer"
                class="fixed top-0 right-[-500px] w-[500px] h-full bg-white transition-all duration-500 z-10 max-[431px]:w-[300px]">
                <div class="p-5 flex flex-col justify-center items-center max-sm:hidden">
                    <button class="text-4xl absolute top-2 left-2" onclick="toggleDrawer()"><i class='bx bx-x'></i></button>
                    <h2 class="text-3xl font-semibold mb-2">CART</h2>
                    <p>You're <strong>$49.99</strong> away from free shipping!</p>
                    <div id="productContainer" class="relative flex w-full h-[8.25rem] mt-5 border-b-2 border-gray-200">
                        <img src="https://i.pinimg.com/564x/82/7e/3a/827e3aacabbdc670a6760c1b2fe776e8.jpg" alt=""
                            class="w-[6.5rem] h-[6.5rem] mt-3 object-cover">
                        <div class="flex flex-col mt-3 ml-3">
                            <span class="font-semibold text-xl">Product</span>
                            <span>Color: </span>
                            <span>Size: </span>
                            <button id="deleteProductBtn" class="absolute right-0 top-3 text-2xl"><i class='bx bx-x'
                                    onclick="deleteProduct()"></i></button>
                            <span>Quantity: <input type="number" id="quantity" name="quantity" min="1" max="99"
                                    value="1" class="h-7 w-10" onchange="updateTotal()"></span>
                            <span class="absolute right-0 bottom-3" id="productPrice">$29.99</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0">
                        <div class="flex flex-col justify-between items-center border-t border-gray-300 p-5">
                            <div class="flex justify-between w-full">
                                <span class="text-lg font-semibold">Total</span>
                                <span class="text-lg" id="subtotal">$29.99</span>
                            </div>
                            <div class="flex justify-between w-full">
                                <span class="text-lg font-semibold">Shipping</span>
                                <span class="text-lg" id="shipping">FREE</span>
                            </div>
                        </div>
                        <a href="#"><button
                                class="bg-black hover:bg-opacity-80 text-xl text-white w-full h-[70px]">Order</button></a>
                    </div>
                </div>
                <!-- Responsive Navbar mobile -->
                <div class="p-5 flex flex-col justify-center items-center">
                    <button class="text-4xl absolute top-2 left-2" onclick="toggleDrawer()"><i class='bx bx-x'></i></button>
                    <nav
                        class="flex text-sm font-bold xl:hidden max-sm:flex-col max-sm:text-center max-sm:space-y-3 max-sm:text-xl">
                        <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">HOME</a>
                        <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">WOMAN</a>
                        <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">MAN</a>
                        <a href="#" class="p-5 hover:underline underline-offset-4 focus:underline">NEW ARRIVALS</a>
                        <a href="{{ url('/contact') }}"
                            class="p-5 hover:underline underline-offset-4 focus:underline">CONTACT</a>
                    </nav>
                </div>
            </div>
            <button class="drawer-toggle p-3 text-2xl" onclick="toggleDrawer()"><i class='bx bx-shopping-bag'></i></button>
            <!-- Menu Mobile -->
            <button class="sm:hidden" onclick="toggleDrawer()"><i class='bx bx-menu max-sm:text-4xl'></i></button>
        </div>
    </header>
    <!-- HEADER -->
    <section class="relative h-[600px] bg-cover bg-center bg-[url('{{ asset('asset/img/about/Shoes.jpg') }}')]">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div
            class="relative z-10 text-center text-white flex flex-col items-center justify-center h-full space-y-3 px-4 md:px-0">
            <span class="text-3xl md:text-6xl font-bold">Get in touch with us for</span>
            <span class="text-3xl md:text-6xl font-bold">more information</span>
            <span class="text-sm md:text-base">If you need help or have a question, we're here for you</span>
        </div>
    </section>

    <!-- GET IN TOUCH -->
    <div class="w-2/4 max-[431px]:w-full m-auto mt-20 flex max-[431px]:flex-col px-4 md:px-0">
        <form action="{{ url('/contact/submit') }}" method="POST" class="w-full max-[431px]:w-full max-md:w-2/4">
            @csrf
            <div class="space-y-4 text-gray-500 text-sm">
                <div class="space-y-4 md:space-y-0 md:space-x-4">
                    <input type="text"
                        class="max-[431px]:w-full md:w-60 h-10 p-2 rounded-[4px] border-gray-400 border-2"
                        placeholder="First Name" name="first_name">
                    <input type="text"
                        class="max-[431px]:w-full md:w-60 h-10 p-2 rounded-[4px] border-gray-400 border-2"
                        placeholder="Last Name" name="last_name">
                </div>
                <div class="space-y-4 md:space-y-0 md:space-x-4">
                    <input type="tel" class="max-[431px]:w-full md:w-60 h-10 p-2 rounded-[4px] border-gray-400 border-2"
                        placeholder="Telephone" name="telephone">
                    <input type="email" required
                        class="max-[431px]:w-full md:w-60 p-2 h-10 rounded-[4px] border-gray-400 border-2"
                        placeholder="Email Address" name="email">
                </div>
                <div class="flex flex-col space-y-4">
                    <textarea class="h-40 p-2 rounded-[4px] border-gray-400 border-2" placeholder="Message" name="message"></textarea>
                    <input type="submit" value="SUBMIT"
                        class="h-12 rounded-[4px] bg-black text-white font-semibold cursor-pointer hover:bg-gray-500 transition ease-out delay-150 hover:border-black hover:border-2">
                </div>
            </div>
        </form>
        <div class="flex flex-col max-[431px]:w-full w-1/2 mt-8 md:mt-0 md:ml-14 space-y-3">
            <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16 bg-white rounded-lg">
                <span class="text-gray-500 text-xs">Phone Number</span>
                <span class="">0905694164</span>
            </div>
            <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16 bg-white rounded-lg">
                <span class="text-gray-500 text-xs">Email</span>
                <span class="">TienTuyenShoes@gmail.com</span>
            </div>
            <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16 bg-white rounded-lg">
                <span class="text-gray-500 text-xs">Address</span>
                <span class="">158A Le Loi, Thanh Khe, Da Nang</span>
            </div>
        </div>
    </div>
    <!-- GG MAP -->
    <div class="relative w-full min-h-[800px] mt-20 max-[431px]">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1521.4828350966045!2d108.21968189120025!3d16.070870641224527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218314984c6bd%3A0xb53a043f246ab8cb!2zMTU4YSBMw6ogTOG7o2ksIEjhuqNpIENow6J1IDEsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1717860396738!5m2!1sen!2s"
            class="relative w-full h-[800px]" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <img src="{{ asset('asset/img/about/address.png') }}" alt="Ảnh địa chỉ" class="absolute top-3 left-3 max-[431px]:hidden">
    </div>

    <!-- FOOTER -->
    <footer class="w-full h-96 max-[431px]:h-auto bg-black">
        <div class="col flex max-[431px]:flex-col h-[332px] max-[431px]:h-full ">
            <div class="max-[431px]:w-full w-2/4 mt-10">
                <img src="{{ asset('asset/img/LogoFooter.png') }}" alt="" class="w-28 h-28 max-[431px]:ml-[150px]">
                <ul class="text-[#CFCFCF] space-y-0 mt-1 max-[431px]:text-center ">
                    <li><a href="">158A Le loi, Thanh Khe, Da Nang</a></li>
                    <li><a href="">Company: TienTuyenShoes</a></li>
                    <li><a href="">Tel: + 84 24 3767 4686</a></li>
                    <li><a href="">Email: TienTuyenShoes@vnuk.edu.vn</a></li>
                    <li><a href="">Slogan: 22090003 To VNUK all Top – The world beneath <br> your feet will be a success
                            every
                            step 08/06/2024</a></li>
                </ul>
            </div>
            <div class="w-full flex justify-around mt-10 max-[431px]:flex-wrap">
                <div class="w-[15%] px-4 max-sm:w-[20%] max-sm:text-center max-[431px]:w-[45%] max-[431px]:mb-4">
                    <span class="font-semibold text-white">About Us</span>
                    <ul class="text-[#CFCFCF] space-y-2 mt-4">
                        <li><a href="" class="hover:text-white">Contact</a></li>
                        <li><a href="" class="hover:text-white">FAQs</a></li>
                        <li><a href="" class="hover:text-white">Support</a></li>
                        <li><a href="" class="hover:text-white">Blog</a></li>
                        <li><a href="" class="hover:text-white">Team</a></li>
                    </ul>
                </div>
                <div class="w-[15%] px-4 max-sm:w-[20%] max-sm:text-center max-[431px]:w-[45%] max-[431px]:mb-4">
                    <span class="font-semibold text-white">Services</span>
                    <ul class="text-[#CFCFCF] space-y-2 mt-4">
                        <li><a href="" class="hover:text-white">Pricing</a></li>
                        <li><a href="" class="hover:text-white">Features</a></li>
                        <li><a href="" class="hover:text-white">Demo</a></li>
                        <li><a href="" class="hover:text-white">Get Started</a></li>
                        <li><a href="" class="hover:text-white">Sign Up</a></li>
                        <li><a href="" class="hover:text-white">Tutorials</a></li>
                        <li><a href="" class="hover:text-white">Forum</a></li>
                    </ul>
                </div>
                <div class="w-[15%] px-4 max-sm:w-[20%] max-sm:text-center max-[431px]:w-[45%] max-[431px]:mb-4">
                    <span class="font-semibold text-white">Resources</span>
                    <ul class="text-[#CFCFCF] space-y-2 mt-4">
                        <li><a href="" class="hover:text-white">Documentation</a></li>
                        <li><a href="" class="hover:text-white">Support Center</a></li>
                        <li><a href="" class="hover:text-white">Community</a></li>
                    </ul>
                </div>
                <div class="w-[15%] px-4 max-sm:w-[20%] max-sm:text-center max-[431px]:w-[45%]">
                    <span class="font-semibold text-white">Get Help</span>
                    <ul class="text-[#CFCFCF] space-y-2 mt-4">
                        <li><a href="" class="hover:text-white">Help Center</a></li>
                        <li><a href="" class="hover:text-white">Contact Us</a></li>
                        <li><a href="" class="hover:text-white">Privacy Policy</a></li>
                        <li><a href="" class="hover:text-white">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col border-b-[0.1px] bg-[#C6C6C6] opacity-50"></div>
        <div class="col flex max-[431px]:flex-col justify-between items-center mt-2">
            <div class="text-[#C6C6C6] space-x-4 opacity-40 max-[431px]:text-center">
                <span class=""><i class='bx bx-copyright'></i>2024 SellShoes. All rights reserved</span>
                <span class="underline"><a href="">Privacy Policy</a></span>
                <span class="underline"><a href="">Terms and Conditions</a></span>
                <span class="underline"><a href="">Cookies Policy</a></span>
            </div>
            <div class="text-[#C6C6C6] text-3xl space-x-3 opacity-50 max-[431px]:text-center max-[431px]:mt-4">
                <a href=""><i class='bx bxl-facebook-circle'></i></a>
                <a href=""><i class='bx bxl-instagram'></i></a>
                <a href=""><i class='bx bxl-twitter'></i></a>
                <a href=""><i class='bx bxl-linkedin-square'></i></a>
            </div>
        </div>
    </footer>
    
</body>
<!-- CART -->
<script