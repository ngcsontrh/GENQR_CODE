<x-user-layout>
    <x-slot name="title">
        Tạo mã QR code miễn phí
    </x-slot>

    <ol class="flex items-center whitespace-nowrap lg:px-12 mx-4 mt-10">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" >
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

        <li class="inline-flex items-center text-sm text-amber-700 truncate dark:text-neutral-200" aria-current="page">
            Tạo mã QR
        </li>
    </ol>

    <div class="flex flex-col md:flex-row justify-between items-start md:space-x-4 p-6 xl:mx-40">
        <!-- Form nhập thông tin -->
        <div class="w-full p-6 bg-white border rounded-xl shadow-xl">
            <h2 class="font-bold text-2xl mb-5">Chọn loại mã QR</h2>
            <div id="menuButtons" class="grid grid-cols-2 gap-8 mb-4">
                <button onclick="showForm('websiteForm', this)" class="font-bold text-white text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl flex bg-purple-300 hover:text-purple-200 focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2 " fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M51.7 295.1l31.7 6.3c7.9 1.6 16-.9 21.7-6.6l15.4-15.4c11.6-11.6 31.1-8.4 38.4 6.2l9.3 18.5c4.8 9.6 14.6 15.7 25.4 15.7c15.2 0 26.1-14.6 21.7-29.2l-6-19.9c-4.6-15.4 6.9-30.9 23-30.9l2.3 0c13.4 0 25.9-6.7 33.3-17.8l10.7-16.1c5.6-8.5 5.3-19.6-.8-27.7l-16.1-21.5c-10.3-13.7-3.3-33.5 13.4-37.7l17-4.3c7.5-1.9 13.6-7.2 16.5-14.4l16.4-40.9C303.4 52.1 280.2 48 256 48C141.1 48 48 141.1 48 256c0 13.4 1.3 26.5 3.7 39.1zm407.7 4.6c-3-.3-6-.1-9 .8l-15.8 4.4c-6.7 1.9-13.8-.9-17.5-6.7l-2-3.1c-6-9.4-16.4-15.1-27.6-15.1s-21.6 5.7-27.6 15.1l-6.1 9.5c-1.4 2.2-3.4 4.1-5.7 5.3L312 330.1c-18.1 10.1-25.5 32.4-17 51.3l5.5 12.4c8.6 19.2 30.7 28.5 50.5 21.1l2.6-1c10-3.7 21.3-2.2 29.9 4.1l1.5 1.1c37.2-29.5 64.1-71.4 74.4-119.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm144.5 92.1c-2.1 8.6 3.1 17.3 11.6 19.4l32 8c8.6 2.1 17.3-3.1 19.4-11.6s-3.1-17.3-11.6-19.4l-32-8c-8.6-2.1-17.3 3.1-19.4 11.6zm92-20c-2.1 8.6 3.1 17.3 11.6 19.4s17.3-3.1 19.4-11.6l8-32c2.1-8.6-3.1-17.3-11.6-19.4s-17.3 3.1-19.4 11.6l-8 32zM343.2 113.7c-7.9-4-17.5-.7-21.5 7.2l-16 32c-4 7.9-.7 17.5 7.2 21.5s17.5 .7 21.5-7.2l16-32c4-7.9 .7-17.5-7.2-21.5z"/></svg>
                    <div class="text-start focus:text-white">
                        <p>Website</p>
                        <small class="text-gray-500 hidden md:block focus:text-white">Liên kết tới trang web bạn chọn</small>
                    </div>
                </button>
                <button onclick="showForm('vcardForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-7 h-7 mr-2 " fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 256l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16L80 384c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <div class="text-start">
                        <p>VCard</p>
                        <small class="text-gray-500 hidden md:block">Chia sẻ thông tin trong danh bạ</small>
                    </div>
                </button>
                <button onclick="showForm('emailForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2 " fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M215.4 96L144 96l-36.2 0L96 96l0 8.8L96 144l0 40.4 0 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3 48 96c0-26.5 21.5-48 48-48l76.6 0 49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48 416 48c26.5 0 48 21.5 48 48l0 44.3 22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4l0-89 0-40.4 0-39.2 0-8.8-11.8 0L368 96l-71.4 0-81.3 0zM0 448L0 242.1 217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1 512 448s0 0 0 0c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64c0 0 0 0 0 0zM176 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                    </svg>
                    <div class="text-start">
                        <p>Email</p>
                        <small class="text-gray-500 hidden md:block">Liên kết tới hộp thư Email</small>
                    </div>
                </button>
                <button onclick="showForm('phoneForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                    <div class="text-start">
                        <p>Phone</p>
                        <small class="text-gray-500 hidden md:block">Liên kết tới số điện thoại</small>
                    </div>
                </button>
                <button onclick="showForm('smsForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M256 448c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9c-5.5 9.2-11.1 16.6-15.2 21.6c-2.1 2.5-3.7 4.4-4.9 5.7c-.6 .6-1 1.1-1.3 1.4l-.3 .3c0 0 0 0 0 0c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c28.7 0 57.6-8.9 81.6-19.3c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9zM96 212.8c0-20.3 16.5-36.8 36.8-36.8l19.2 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-19.2 0c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.3 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8L112 304c-8.8 0-16-7.2-16-16s7.2-16 16-16l27.2 0c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6C102.2 236.7 96 225.2 96 212.8zM372.8 176l19.2 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-19.2 0c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.2 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8L352 304c-8.8 0-16-7.2-16-16s7.2-16 16-16l27.2 0c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6c-10.2-6.8-16.4-18.3-16.4-30.7c0-20.3 16.5-36.8 36.8-36.8zm-152 6.4L256 229.3l35.2-46.9c4.1-5.5 11.3-7.8 17.9-5.6s10.9 8.3 10.9 15.2l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48-19.2 25.6c-3 4-7.8 6.4-12.8 6.4s-9.8-2.4-12.8-6.4L224 240l0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-6.9 4.4-13 10.9-15.2s13.7 .1 17.9 5.6z"/>
                    </svg>
                    <div class="text-start">
                        <p>SMS</p>
                        <small class="text-gray-500 hidden md:block">Hiển thị tin nhắn SMS của bạn</small>
                    </div>
                </button>
                <button onclick="showForm('wifiForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>
                    </svg>
                    <div class="text-start">
                        <p>Wifi</p>
                        <small class="text-gray-500 hidden md:block">Chia sẻ wifi tiện lợi bằng QR</small>
                    </div>
                </button>
                <button onclick="showForm('docsForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M48 448L48 64c0-8.8 7.2-16 16-16l160 0 0 80c0 17.7 14.3 32 32 32l80 0 0 288c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-293.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0L64 0zm55 241.1c-3.8-12.7-17.2-19.9-29.9-16.1s-19.9 17.2-16.1 29.9l48 160c3 10.2 12.4 17.1 23 17.1s19.9-7 23-17.1l25-83.4 25 83.4c3 10.2 12.4 17.1 23 17.1s19.9-7 23-17.1l48-160c3.8-12.7-3.4-26.1-16.1-29.9s-26.1 3.4-29.9 16.1l-25 83.4-25-83.4c-3-10.2-12.4-17.1-23-17.1s-19.9 7-23 17.1l-25 83.4-25-83.4z"/></svg>
                    <div class="text-start">
                        <p>Văn bản</p>
                        <small class="text-gray-500 hidden md:block">Gửi lời nhắn tới mọi người</small>
                    </div>
                </button>
                <button onclick="showForm('bankForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                    <div class="text-start">
                        <p>Ngân hàng</p>
                        <small class="text-gray-500 hidden md:block">Liên kết với ngân hàng của bạn</small>
                    </div>
                </button>
                <button onclick="showForm('fileForm', this)" class="font-bold text-xl px-10 py-6 mb-2 border shadow-xl rounded-xl hover:text-purple-200 flex focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-7 h-7 mr-2" fill="var(--template-selector-icon-main-color, #5D82D5)">
                        <path d="M448 80c8.8 0 16 7.2 16 16l0 319.8-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3L48 96c0-8.8 7.2-16 16-16l384 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>

                    <div class="text-start">
                        <p>Tệp tin</p>
                        <small class="text-gray-500 hidden md:block">Chia sẻ tệp tin thuận tiện </small>
                    </div>
                </button>
            </div>

            <!-- Form cho Website -->
            <div id="websiteForm" class="form-container">
                <label for="qr_code_name" class="block text-blue-500 font-semibold mb-2">Tên mã QR</label>
                <input type="text" id="qr_code_name" placeholder="Đặt tên cho QR của bạn (không bắt buộc)" class="w-full border border-gray-300 rounded px-4 py-2 mb-4 focus:outline-none focus:ring-2">
                <label class="block text-blue-500 font-semibold mb-2">Nhập website (URL)</label>
                <input type="text" id="websiteInput" placeholder="https://www.qrcode-gen.com" class="w-full border border-gray-300 rounded px-4 py-2 mb-4 focus:outline-none focus:ring-2">
                <button onclick="generateQRCode('URL')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <!-- Form cho Vcard -->
            <div id="vcardForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Thông tin Vcard</label>
                <input type="text" id="vcardName" placeholder="Tên" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <input type="text" id="vcardLastname" placeholder="Họ" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <input type="email" id="vcardEmail" placeholder="Email" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <button onclick="generateQRCode('Vcard')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <!-- Form cho Email -->
            <div id="emailForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Thông tin Email</label>
                <input type="email" id="emailAddress" placeholder="Email" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <input type="text" id="emailSubject" placeholder="Tiêu đề" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <textarea id="emailBody" placeholder="Nội dung" class="w-full min-h-28 border border-gray-300 rounded px-4 py-2 mb-4"></textarea>
                <button onclick="generateQRCode('Email')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <!-- Phone Form -->
            <div id="phoneForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Số điện thoại</label>
                <input type="text" id="phoneOnlyInput" placeholder="+84 111 222 333" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <button onclick="generateQRCode('Phone')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <!-- SMS Form -->
            <div id="smsForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Số điện thoại</label>
                <input type="text" id="smsPhoneNumber" placeholder="+84 111 222 333" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <label class="block text-blue-500 font-semibold mb-2">Nội dung</label>
                <textarea id="smsContentInput" placeholder="Nội dung tin nhắn" class="w-full min-h-28 border border-gray-300 rounded px-4 py-2 mb-4"></textarea>
                <button onclick="generateQRCode('SMS')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>
            <div id="wifiForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Tên Wifi</label>
                <input type="text" id="nameWifi" placeholder="Nhập tên Wifi" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <label class="block text-blue-500 font-semibold mb-2">Mật khẩu</label>
                <input type="text" id="passwordWifi" placeholder="Nhập mật khẩu Wifi" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <label class="block text-blue-500 font-semibold mb-2">Loại mã hóa</label>
                <select id="encryptionType" class="font-semibold mb-2 w-full border border-gray-300 rounded px-4 py-2 mb-4">
                    <option value="">Không mã hóa</option>
                    <option value="WEP">Mã hóa WEP</option>
                    <option value="WPA">Mã hóa WPA/WPA2</option>
                </select>
                <button onclick="generateQRCode('Wifi')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <div id="docsForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Nội dung</label>
                <textarea id="docsContentInput" placeholder="Nhập nội dung tài liệu" class="w-full min-h-28 border border-gray-300 rounded px-4 py-2 mb-4"></textarea>
                <button onclick="generateQRCode('Docs')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <div id="bankForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Ngân hàng</label>
                <select id="bankAcqId" class="w-full cursor-pointer focus:outline-none">
                    <option selected value="">Chọn ngân hàng</option>
                    <!-- Các tùy chọn sẽ được thêm động từ JavaScript -->
                </select>
                <input required type="text" id="bankAccountNo" placeholder="Số tài khoản" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <input required type="text" id="bankAccountName" placeholder="Tên tài khoản" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <button onclick="generateQRCode('Bank')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>

            <div id="fileForm" class="form-container hidden">
                <label class="block text-blue-500 font-semibold mb-2">Tải lên hình ảnh</label>
                <input type="file" id="file_upload" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">
                <label class="block text-blue-500 font-semibold mb-2">Danh mục</label>
                <select id="file_category" class="font-semibold mb-2 w-full border border-gray-300 rounded px-4 py-2 mb-4">
                    <option value="">Chọn danh mục (không bắt buộc)</option>
                    <option value="image">Hình ảnh</option>
                    <option value="excel">Excel</option>
                    <option value="word">Word</option>
                    <option value="pdf">PDF</option>
                </select>
                <button onclick="generateQRCode('File')" class="bg-purple-500 text-white px-6 py-2 rounded shadow hover:bg-purple-600 flex items-center mx-auto">
                    Tạo QR code
                </button>
            </div>
        </div>

        <!-- Placeholder hiển thị QR code -->
        <div class="w-full md:w-1/3 p-6 bg-white border rounded-xl shadow-xl flex flex-col items-center">
            <p class="bottom-0 mb-2 text-sm text-gray-700 bg-white bg-opacity-90 px-2 py-1 rounded-lg">
                * Luôn quét để kiểm tra xem mã QR của bạn có hoạt động không
            </p>
            <div id="qrCodeContainer" class=" w-auto bg-gray-200 mb-4 flex rounded-3xl justify-center items-center relative">
                <img id="qrImage" src="https://qrcode-gen.com/images/qrcode-default.png" alt="QR Code" class="w-full h-full opacity-50">
                <img id="logoOverlay" src="" alt="Logo" class="absolute w-14 h-14 rounded-full hidden">
            </div>
            <a id="downloadButton" href="#" download class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow cursor-not-allowed w-32 items-center flex" onclick="return checkDownloadLink()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 h-5 mr-1" fill="white">
                    <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128l-368 0zm79-167l80 80c9.4 9.4 24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-39 39L344 184c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 134.1-39-39c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9z"/>
                </svg>
                Tải về
            </a>
            <div class="mt-4 w-full">
                <label class="block text-green-500 font-semibold mb-2">Logo (tùy chọn)</label>
                <p class="text-xs text-gray-500 italic mb-2">* Vui lòng tải lên ảnh logo trước khi tạo mã QR</p>
                <input type="file" id="logoInput" name="logo" accept="image/*" class="w-full border border-gray-300 rounded px-4 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-green-500" onchange="previewLogo()">
            </div>
        </div>
    </div>

    <x-slot name="script">4
        <script>
            function showForm(formId, button) {
                // Ẩn tất cả các form và hiển thị form đã chọn
                document.querySelectorAll('.form-container').forEach(form => form.classList.add('hidden'));
                document.querySelectorAll('input[id="qr_code_name"]').forEach(input => input.remove());
                document.querySelectorAll('label[for="qr_code_name"]').forEach(label => label.remove());
                const selectedForm = document.getElementById(formId);
                selectedForm.classList.remove('hidden');

                const nameInput =
                    '<label for="qr_code_name" class="block text-blue-500 font-semibold mb-2">Tên mã QR</label>' +
                    '<input type="text" id="qr_code_name" placeholder="Đặt tên cho QR của bạn (không bắt buộc)" class="w-full border border-gray-300 rounded px-4 py-2 mb-4">';

                selectedForm.insertAdjacentHTML('afterbegin', nameInput);

                // Cập nhật kiểu nút để đánh dấu form đã chọn
                document.querySelectorAll('#menuButtons button').forEach(btn => {
                    btn.classList.remove('bg-purple-300', 'text-white');
                });
                button.classList.add('bg-purple-300', 'text-white');
            }

            function generateQRCode(type) {
                let formData = new FormData();
                formData.append('type', type);
                formData.append('qr_code_name', document.getElementById('qr_code_name').value);

                switch (type) {
                    case 'URL':
                        formData.append('url', document.getElementById('websiteInput').value);
                        break;

                    case 'Vcard':
                        formData.append('vcard_name', document.getElementById('vcardName').value);
                        formData.append('vcard_lastname', document.getElementById('vcardLastname').value);
                        formData.append('vcard_email', document.getElementById('vcardEmail').value);
                        break;

                    case 'Email':
                        formData.append('email_address', document.getElementById('emailAddress').value);
                        formData.append('email_subject', document.getElementById('emailSubject').value);
                        formData.append('email_body', document.getElementById('emailBody').value);
                        break;

                    case 'Phone':
                        formData.append('phone_number', document.getElementById('phoneOnlyInput').value);
                        break;

                    case 'SMS':
                        formData.append('phone_number', document.getElementById('smsPhoneNumber').value);
                        formData.append('sms_content', document.getElementById('smsContentInput').value);
                        break;

                    case 'Docs':
                        formData.append('docs_content', document.getElementById('docsContentInput').value);
                        break;

                    case 'Wifi':
                        formData.append('wifi_name', document.getElementById('nameWifi').value);
                        formData.append('wifi_password', document.getElementById('passwordWifi').value);
                        formData.append('wifi_encryption', document.getElementById('encryptionType').value);
                        break;

                    case 'Bank':
                        formData.append('bank_acq_id', document.getElementById('bankAcqId').value);
                        formData.append('bank_account_no', document.getElementById('bankAccountNo').value);
                        formData.append('bank_account_name', document.getElementById('bankAccountName').value);
                        break;

                    case 'File':
                        let fileUpload = document.getElementById('file_upload');

                        if (fileUpload.files.length === 0) {
                            alert("Vui lòng chọn một tệp tin trước khi tạo QR code!");
                            return;
                        }

                        let file = fileUpload.files[0];
                        let allowedTypes = [
                            "image/png", "image/jpeg", "image/jpg", "image/gif",
                            "application/pdf",
                            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", // .xlsx
                            "application/vnd.ms-excel", // .xls
                            "application/vnd.openxmlformats-officedocument.wordprocessingml.document", // .docx
                            "application/msword" // .doc
                        ];

                        if (!allowedTypes.includes(file.type)) {
                            alert("Loại tệp không hợp lệ! Chỉ chấp nhận hình ảnh, PDF, Excel, hoặc Word.");
                            return;
                        }

                        formData.append('file_upload', file);
                        formData.append('file_category', document.getElementById('file_category').value);
                        break;

                    default:
                        console.error('Invalid type');
                        return;
                }

                // Thêm logo vào FormData nếu có
                const logoInput = document.getElementById('logoInput');
                if (logoInput.files && logoInput.files[0]) {
                    formData.append('logo', logoInput.files[0]);
                }

                fetch('{{ route('generate.qr') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => handleQRCodeResponse(data))
                    .catch(error => handleError(error));
            }

            function handleQRCodeResponse(data) {
                if (data.path) {
                    const qrImageElement = document.getElementById('qrImage');
                    qrImageElement.src = data.path;
                    qrImageElement.classList.remove('opacity-50');

                    const qrImage = new Image();
                    qrImage.src = data.path;
                    qrImage.onload = function () {
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = qrImage.width;
                        canvas.height = qrImage.height;
                        context.drawImage(qrImage, 0, 0);

                        const logoInput = document.getElementById('logoInput');
                        if (logoInput.files && logoInput.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const logoImage = new Image();
                                logoImage.src = e.target.result;
                                logoImage.onload = function () {
                                    drawLogoOnCanvas(canvas, context, logoImage);
                                    updateDownloadButton(canvas);
                                };
                            };
                            reader.readAsDataURL(logoInput.files[0]);
                        } else {
                            updateDownloadButton(canvas, data.path);
                        }
                    };
                } else {
                    alert('Có lỗi xảy ra khi tạo mã QR. Vui lòng thử lại.');
                }
            }

            function drawLogoOnCanvas(canvas, context, logoImage) {
                const logoSize = canvas.width / 7; // Điều chỉnh tỉ lệ logo nếu cần
                const logoX = (canvas.width - logoSize) / 2;
                const logoY = (canvas.height - logoSize) / 2;

                // Vẽ logo bo tròn
                context.save();
                context.beginPath();
                context.arc(logoX + logoSize / 2, logoY + logoSize / 2, logoSize / 2, 0, Math.PI * 2);
                context.clip();
                context.drawImage(logoImage, logoX, logoY, logoSize, logoSize);
                context.restore();
            }

            function updateDownloadButton(canvas, defaultPath = null) {
                const downloadButton = document.getElementById('downloadButton');
                const logoInput = document.getElementById('logoInput');
                const timestamp = Date.now(); // Lấy timestamp hiện tại
                let fileName;

                if (canvas) {
                    // Nếu có logo
                    if (logoInput.files && logoInput.files[0]) {
                        fileName = `My_qr_with_logo_${timestamp}.png`;
                    } else {
                        fileName = `My_qr_${timestamp}.png`;
                    }
                    const qrWithLogoURL = canvas.toDataURL('image/png');
                    downloadButton.href = qrWithLogoURL;
                } else {
                    // Không có canvas, sử dụng defaultPath
                    fileName = `My_qr_${timestamp}.png`;
                    downloadButton.href = defaultPath;
                }

                downloadButton.download = fileName;

                // Cập nhật kiểu của nút
                downloadButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                downloadButton.classList.add('bg-green-500', 'hover:bg-green-600');
            }

            function handleError(error) {
                console.error('Error:', error);
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            }

            function checkDownloadLink() {
                const downloadButton = document.getElementById('downloadButton');
                if (downloadButton.href === '#' || !downloadButton.href.includes('data:image')) {
                    alert('Không có mã QR để tải về.');
                    return false;
                }
                return true;
            }

            function previewLogo() {
                const logoInput = document.getElementById('logoInput');
                const logoOverlay = document.getElementById('logoOverlay');

                if (logoInput.files && logoInput.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        logoOverlay.src = e.target.result;
                        logoOverlay.classList.remove('hidden');
                    };
                    reader.readAsDataURL(logoInput.files[0]);
                }
            }

            function fetchBankList() {
                fetch('https://api.vietqr.io/v2/banks')
                    .then(response => response.json())
                    .then(data => {
                        const bankSelect = document.getElementById('bankAcqId');

                        // Xóa các option cũ (tránh trùng lặp nếu gọi lại)
                        bankSelect.innerHTML = '<option value="">Chọn ngân hàng</option>';

                        // Thêm danh sách ngân hàng
                        data.data.forEach(bank => {
                            const option = document.createElement('option');
                            option.value = bank.bin;
                            option.textContent = bank.name;
                            bankSelect.appendChild(option);
                        });

                        // Sau khi thêm xong, khởi tạo TomSelect
                        initTomselect();
                    })
                    .catch(error => console.error('Lỗi khi lấy danh sách ngân hàng:', error));
            }

            function initTomselect() {
                const selectElement = document.getElementById("bankAcqId");

                // Kiểm tra nếu đã có TomSelect, thì hủy trước khi khởi tạo mới
                if (selectElement.tomselect) {
                    selectElement.tomselect.destroy();
                }

                const select = new TomSelect(selectElement, {
                    create: false, // Không cho phép nhập tùy chọn mới
                    allowEmptyOption: false, // Không cho phép giá trị rỗng
                });

                select.on("change", function (value) {
                    if (value === "") {
                        alert("Vui lòng chọn ngân hàng khác!");
                        select.clear();
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                fetchBankList();
            });
        </script>
    </x-slot>
</x-user-layout>
