<x-layout>


    <!-- Nội dung form liên hệ -->
    <section class="relative h-[400px] bg-cover bg-center bg-[url('{{ asset('asset/img/about/Shoes.jpg') }}')]">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 text-center text-white flex flex-col items-center justify-center h-full space-y-3 px-4">
            <span class="text-4xl md:text-6xl font-bold">Get in touch with us for</span>
            <span class="text-4xl md:text-6xl font-bold">more information</span>
            <span class="text-xl md:text-base">If you need help or have a question, we're here for you</span>
        </div>
    </section>

    <!-- Form và thông tin liên hệ -->
    <div class="w-2/4 max-[431px]:w-full m-auto mt-20 flex max-[431px]:flex-col px-4 md:px-0">
        <form action="{{ route('contact.store') }}" method="POST" class="w-full max-[431px]:w-full max-md:w-2/4">
            @csrf
            <div class="space-y-4 text-gray-500 text-sm">
                <div class="space-y-4 md:space-y-0 md:space-x-4">
                    <input type="text" name="first_name" class="max-[431px]:w-full md:w-60 h-10 p-5 rounded-[4px] border-gray-400 border-2" placeholder="First Name" required>
                    <input type="text" name="last_name" class="max-[431px]:w-full md:w-60 h-10 p-5 rounded-[4px] border-gray-400 border-2" placeholder="Last Name" required>
                </div>
                <div class="space-y-4 md:space-y-0 md:space-x-4">
                    <input type="tel" name="phone_number" class="max-[431px]:w-full md:w-60 h-10 p-5 rounded-[4px] border-gray-400 border-2" placeholder="Telephone" required>
                    <input type="email" name="email" class="max-[431px]:w-full md:w-60 p-5 h-10 rounded-[4px] border-gray-400 border-2" placeholder="Email Address" required>
                </div>
                <div class="flex flex-col space-y-4">
                    <textarea name="message" class="w-80 h-40 p-5 rounded-[4px] border-gray-400 border-2" placeholder="Message"></textarea>
                    <input type="submit" value="SUBMIT" class="h-12 rounded-[4px] w-80 bg-black text-white font-semibold cursor-pointer hover:bg-gray-500 transition ease-out delay-150 hover:border-black hover:border-2">
                </div>
                    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
            </div>
        </form>

    <div class="flex flex-col max-[431px]:w-full w-60 mt-8 md:mt-0 md:ml-14 space-y-3">
        <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16 bg-gray-900  rounded-lg">
            <span class="text-gray-500 text-xs">Phone Number</span> 
            <span class="text-white">0905694164</span>
        </div>
        <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16 bg-black rounded-lg">
            <span class="text-gray-500 text-xs">Email</span>
            <span class="text-white">TienTuyenShoes@gmail.com</span>
        </div>
        <div class="flex flex-col justify-center p-2 w-full md:w-80 h-16  bg-gray-900    rounded-lg">
            <span class="text-gray-500 text-xs">Address</span>
            <span class="text-white">158A Le Loi, Thanh Khe, Da Nang</span>
        </div>
    </div>
</div>

<!-- Khoảng trống giữa GET IN TOUCH và GG MAP -->


<!-- GG MAP -->
<div style="margin-top: 30px;">
<div class="relative w-full min-h-[800px] mt-20 max-[431px] ">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1521.4828350966045!2d108.21968189120025!3d16.070870641224527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218314984c6bd%3A0xb53a043f246ab8cb!2zMTU4YSBMw6ogTOG7o2ksIEjhuqNpIENow6J1IDEsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1717860396738!5m2!1sen!2s" class="relative w-full h-[800px]" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <img src="{{ asset('asset/img/about/address.png') }}" alt="Ảnh địa chỉ" class="absolute top-3 left-3 max-[431px]:hidden">
</div>
</div>
</x-layout>