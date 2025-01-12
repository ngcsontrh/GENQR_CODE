<x-user-layout>
    <x-slot name="title">
        Tạo mã QR code miễn phí
    </x-slot>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Tạo mã QR trong vài giây</h1>
            <ul class="text-lg text-gray-600 mb-6">
                <li class="mb-2 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5 mr-2" fill="purple"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    Tạo mã QR dễ dàng, liền mạch
                </li>
                <li class="mb-2 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5 mr-2" fill="purple"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    Theo dõi và phân tích tương tác
                </li>
                <li class="mb-2 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-5 mr-2" fill="purple"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    Tùy chỉnh thiết kế, logo, màu, v.v.
                </li>
            </ul>
            <a href="{{ route('generator') }}" class="bg-orange-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-600 transition">Tạo mã QR của tôi</a>
        </div>

        <!-- Preview Section -->
        <div class="mt-12 flex flex-col md:flex-row items-center justify-between gap-8">
            <!-- Preview Image -->
            <div class="w-full md:w-1/2">
                <img src="https://myqrcode.com/images/landing/appPreviewMobile.svg" alt="QR Code Preview" class="rounded-lg shadow-lg">
            </div>

            <!-- Steps Section -->
            <div class="w-full md:w-1/2">
                <div class="mb-6 flex items-start gap-4">
                    <div class="bg-orange-500 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold">1</div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Chọn nội dung mã QR của bạn</h2>
                        <p class="text-gray-600">Chọn tài liệu bạn muốn chia sẻ. Liên kết các trang web, tệp PDF, menu, video, ứng dụng, v.v.</p>
                    </div>
                </div>
                <div class="mb-6 flex items-start gap-4">
                    <div class="bg-orange-500 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold">2</div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Tùy chỉnh thiết kế</h2>
                        <p class="text-gray-600">Sử dụng công cụ để dễ dàng thêm logo, màu sắc, khung và kiểu dáng vào mã QR của bạn.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="bg-orange-500 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold">3</div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Tải xuống, in và chia sẻ QR</h2>
                        <p class="text-gray-600">Nhận mã QR ở định dạng PNG, SVG hoặc JPG. In ra hoặc chia sẻ dưới dạng kỹ thuật số.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4 ">
        <!-- Title -->
        <h2 class="text-4xl font-bold text-center mb-12">
            Những câu hỏi thường gặp
            <span class="text-amber-500">
            <svg class="inline w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                <path d="M8.5 2.5C9.3 2.5 10 3.2 10 4C10 4.8 9.3 5.5 8.5 5.5C7.7 5.5 7 4.8 7 4C7 3.2 7.7 2.5 8.5 2.5ZM12.5 7.5C13.3 7.5 14 8.2 14 9C14 9.8 13.3 10.5 12.5 10.5C11.7 10.5 11 9.8 11 9C11 8.2 11.7 7.5 12.5 7.5ZM6.5 7.5C7.3 7.5 8 8.2 8 9C8 9.8 7.3 10.5 6.5 10.5C5.7 10.5 5 9.8 5 9C5 8.2 5.7 7.5 6.5 7.5ZM3.5 2.5C4.3 2.5 5 3.2 5 4C5 4.8 4.3 5.5 3.5 5.5C2.7 5.5 2 4.8 2 4C2 3.2 2.7 2.5 3.5 2.5ZM1.5 7.5C2.3 7.5 3 8.2 3 9C3 9.8 2.3 10.5 1.5 10.5C0.7 10.5 0 9.8 0 9C0 8.2 0.7 7.5 1.5 7.5Z"></path>
            </svg>
        </span>
        </h2>

        <!-- FAQ Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Left Side (FAQs) -->
            <div class="bg-white rounded-lg shadow-md dark:bg-neutral-800">
                <div class="hs-accordion-group">
                    <div class="hs-accordion active" id="hs-basic-heading-one">
                        <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-2xl w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="true" aria-controls="hs-basic-collapse-one">
                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            Trình tạo mã QR là gì?
                        </button>
                        <div id="hs-basic-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-one">
                            <div class="pb-4 px-6">
                                <p class="text-gray-600 dark:text-neutral-200">
                                    Trình tạo mã QR là phần mềm có thể được sử dụng để tạo mã QR tùy chỉnh lưu trữ dữ liệu mà máy quét mã QR có thể đọc được. Trình tạo mã QR của My QR cho phép bạn tạo mã QR cho vCard, liên kết, ứng dụng di động, tệp PDF, v.v. Mã QR là một cách quan trọng để giao tiếp với khách hàng và cá nhân, đặc biệt khi bạn xem xét 89 triệu người dùng thiết bị đã tương tác với mã QR chỉ trong năm 2022.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="hs-accordion" id="hs-basic-heading-two">
                        <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-2xl w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-two">
                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            Bất cứ ai cũng có thể tạo mã QR?
                        </button>
                        <div id="hs-basic-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-two">
                            <div class="pb-4 px-6">
                                <p class="text-gray-600 dark:text-neutral-200">
                                    My QR giúp bạn dễ dàng chuyển đổi bất kỳ liên kết, vCard, hình ảnh, trang Facebook, hình ảnh, thực đơn nhà hàng hoặc video nào thành mã QR. Với nền tảng của chúng tôi, bạn cũng có thể theo dõi quá trình quét mã QR của mình và tùy chỉnh thiết kế mà không cần bất kỳ chuyên môn kỹ thuật nào. Xét thấy số lượng mã QR được quét chỉ dưới 27 triệu trong 3 tháng đầu năm 2024, đó là xu hướng bạn không thể bỏ qua.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="hs-accordion" id="hs-basic-heading-three">
                        <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-2xl w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-three">
                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            Sự khác biệt giữa mã QR tĩnh và mã QR động?
                        </button>
                        <div id="hs-basic-collapse-four" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-three">
                            <div class="pb-4 px-6">
                                <p class="text-gray-600 dark:text-neutral-200">
                                    Sự khác biệt lớn nhất là mã QR tĩnh không thể thay đổi được, còn mã QR động thì có thể. Khi sử dụng mã tĩnh, bạn phải tạo mã QR mới nếu cần thay đổi nội dung hoặc đích liên kết. Mặt khác, My QR tạo ra mã QR động. Với mã QR động, nội dung liên kết có thể được thay đổi bất kỳ lúc nào mà không cần phải thay đổi mã QR đang sử dụng. Mã động đặc biệt hữu ích cho các doanh nghiệp, nơi các trang và nội dung kinh doanh được cập nhật thường xuyên.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="hs-accordion" id="hs-basic-heading-four">
                        <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-2xl w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-three">
                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            Làm thế nào để quét mã QR?
                        </button>
                        <div id="hs-basic-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-three">
                            <div class="pb-4 px-6">
                                <p class="text-gray-600 dark:text-neutral-200">
                                    Tất cả My QR có thể được quét bởi bất kỳ thiết bị Android hoặc iOS nào có trình đọc mã QR được tích hợp trong máy ảnh hoặc được cài đặt dưới dạng một ứng dụng. Máy tính bảng và máy tính xách tay cũng có thể quét mã QR bằng phần mềm thích hợp. Nếu điện thoại thông minh hoặc máy tính của bạn không có trình đọc mã QR, bạn có thể tải xuống ứng dụng cho phép thiết bị của bạn đọc mã QR.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="hs-accordion" id="hs-basic-heading-five">
                        <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-2xl w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-three">
                            <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                            </svg>
                            Tôi có thể chỉnh sửa mã QR đã tạo không?
                        </button>
                        <div id="hs-basic-collapse-five" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-three">
                            <div class="pb-4 px-6">
                                <p class="text-gray-600 dark:text-neutral-200">
                                    My QR cho phép bạn chỉnh sửa mã QR của mình vì chúng tôi sử dụng trình tạo mã QR động . Điều đó có nghĩa là bạn có thể thay đổi đích đến của liên kết và cập nhật nội dung của mình bất cứ khi nào bạn cần mà không cần phải in ra mã QR khác. Mã động là một trong những mã QR phổ biến nhất hiện nay, với 6,8 triệu lượt quét chỉ trong 3 tháng đầu năm 2024, khiến chúng không thể thiếu đối với các doanh nghiệp muốn tiếp cận càng nhiều người càng tốt.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side (Content) -->
            <div class="items-center flex justify-center">
                <img src="https://myqrcode.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FimagePreview.90f20e24.png&w=384&q=95" class="h-3/4">
            </div>
        </div>
    </div>
</x-user-layout>
