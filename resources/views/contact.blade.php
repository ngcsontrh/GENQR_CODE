<x-user-layout>
    <x-slot name="title">
        Liên hệ
    </x-slot>

    <!-- Breadcrumb -->
    <ol class="flex items-center whitespace-nowrap lg:px-12 mx-4 mt-10 text-md">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="flex items-center text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500">
                <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Trang chủ
            </a>
            <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-amber-700 truncate dark:text-neutral-200" aria-current="page">
            Liên hệ
        </li>
    </ol>

    <!-- Tiêu đề -->
    <h2 class="mx-auto text-center font-bold text-3xl text-green-600 mt-6 lg:mt-8 uppercase">
        Liên hệ
    </h2>

    <!-- Nội dung chính -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6 lg:mx-48">
        <!-- Form liên hệ -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-green-600 mb-4">Gửi thư cho chúng tôi</h2>
            <form action="/send-contact" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Tên liên hệ" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <input type="email" name="email" placeholder="Email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <input type="tel" name="phone" placeholder="Số điện thoại" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <input type="text" name="user_id" value="{{ auth()->id() }}" hidden>
                <textarea name="message" placeholder="Nội dung" required class="w-full min-h-36 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Gửi</button>
            </form>
        </div>

        <!-- Thông tin công ty -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-green-600 mb-4">MY QR</h2>
            <p class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 mr-2" fill="green">
                    <path d="M429.6 92.1c4.9-11.9 2.1-25.6-7-34.7s-22.8-11.9-34.7-7l-352 144c-14.2 5.8-22.2 20.8-19.3 35.8s16.1 25.8 31.4 25.8l176 0 0 176c0 15.3 10.8 28.4 25.8 31.4s30-5.1 35.8-19.3l144-352z"/></svg>
                Địa Chỉ: Triều Khúc, Hà Đông, Hà Nội.
            </p>
            <p class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 mr-2" fill="green">
                    <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm90.7 96.7c9.7-2.6 19.9 2.3 23.7 11.6l20 48c3.4 8.2 1 17.6-5.8 23.2L168 231.7c16.6 35.2 45.1 63.7 80.3 80.3l20.2-24.7c5.6-6.8 15-9.2 23.2-5.8l48 20c9.3 3.9 14.2 14 11.6 23.7l-12 44C336.9 378 329 384 320 384C196.3 384 96 283.7 96 160c0-9 6-16.9 14.7-19.3l44-12z"/></svg>
                Số điện thoại: +84 86 86 85 247
            </p>
            <p class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 mr-2" fill="green">
                    <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM218 271.7L64.2 172.4C66 156.4 79.5 144 96 144l256 0c16.5 0 30 12.4 31.8 28.4L230 271.7c-1.8 1.2-3.9 1.8-6 1.8s-4.2-.6-6-1.8zm29.4 26.9L384 210.4 384 336c0 17.7-14.3 32-32 32L96 368c-17.7 0-32-14.3-32-32l0-125.6 136.6 88.1c8.6 5.6 18.7 8.5 29.4 8.5s20.8-2.9 29.4-8.5z"/></svg>
                Email: myqr.vn@gmail.com
            </p>
        </div>
    </div>
</x-user-layout>
