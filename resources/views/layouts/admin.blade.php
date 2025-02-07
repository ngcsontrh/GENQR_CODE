<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'QR Code Generator' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('MyQR.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
<!-- Header -->
<header class="md:hidden flex justify-around items-center px-6 py-4 lg:px-16 lg:py-6 w-full bg-blue-950">
    <button type="button" class="px-4 py-1 z-40 top-[92px] md:hidden" data-hs-overlay="#hs-overlay-backdrop-with-scrolling">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="lg:ml-16 w-8 h-8" fill="white">
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
        </svg>
    </button>
    <!-- Logo nằm giữa màn hình -->
    <div class="flex justify-center ">
        <a href="/">
            <img src="{{ asset('MyQR.jpg') }}" class="w-16 h-16 rounded-full" alt="Pet Spa Logo">
        </a>
    </div>

    <div class="flex space-x-6 lg:space-x-10 text-lg items-center">
        <button type="button" class="text-black hover:text-gray-600 mb-2" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-right" data-hs-overlay="#hs-offcanvas-right">
            @if(Auth::check())
                <div
                    class="w-[40px] h-[40px] bg-white text-center text-lg shadow-xl rounded-3xl flex justify-center items-center capitalize ">
                    {{ substr(Auth::guard('web')->user()->name, 0, 1) }}
                </div>
            @else
                <div class="p-4 border rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="white">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                    </svg>
                </div>
            @endif
        </button>

        @if(Auth::check())
            <div id="hs-offcanvas-right" class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-right-label">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <a href="{{ route('profile') }}">
                        <div class="flex-shrink-0 group block p-[8px]">
                            <div class="flex items-center">
                                <div
                                    class="border border-gray-300 flex items-center justify-center w-[40px] h-[40px] rounded-full overflow-hidden">
                                    <div
                                        class="w-[40px] h-[40px] bg-gray-600 text-center text-lg text-blue-50 rounded-3xl flex justify-center items-center capitalize">
                                        {{ substr(Auth::guard('web')->user()->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h3 class="text-gray-800">{{ Auth::guard('web')->user()->name }}</h3>
                                    <p class="text-gray-800">{{ Auth::guard('web')->user()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-offcanvas-right">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

            </div>
        @else
            <div id="hs-offcanvas-right" class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-right-label">
                <ul class="space-y-4 px-4 py-6"> <!-- Thêm khoảng cách giữa các mục và padding -->
                    <li class="flex flex-col flex-shrink-0 relative hover:bg-gray-300 rounded-lg duration-300">
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 flex items-center gap-2 select-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path>
                            </svg>
                            Đăng nhập
                        </a>
                    </li>
                    <li class="flex flex-col flex-shrink-0 relative hover:bg-gray-300 rounded-lg duration-300">
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 flex items-center gap-2 select-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 640 512">
                                <path
                                    d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                            </svg>
                            Đăng ký
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>

    <!-- Mobile Menu -->
    <div id="hs-overlay-backdrop-with-scrolling" class="hs-overlay hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-e dark:bg-neutral-800 dark:border-neutral-700 [--body-scroll:true]' tabindex="-1">
    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 class="font-bold text-gray-800 dark:text-white ml-28" >
            Menu
        </h3>
        <button type="button" class="flex justify-center items-center size-9 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#hs-overlay-backdrop-with-scrolling">
            <span class="sr-only">Close modal</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
    <div class="border border-amber-200 w-full lg:w-auto">
        <div class="flex flex-col lg:flex-row gap-y-4 lg:gap-x-20 px-4 lg:px-20 pt-2 justify-between">
            <a href="/" class="p-2 hover:bg-gray-300 flex">
                <i class="fa-solid fa-house mr-3"></i>
                Trang chủ
            </a>
            <a href="{{ route('generator') }}" class="p-2 hover:bg-gray-300 flex items-center justify-between">
                <span class="flex items-center">
                    <i class="fas fa-qrcode mr-3"></i>
                    Tạo mã QR
                </span>
            </a>

            <a href="{{ route('qr.history') }}" class="p-2 hover:bg-gray-300 flex">
                <i class="fa-solid fa-clock-rotate-left mr-3"></i>
                Lịch sử tạo mã
            </a>
            <a href="{{ route('blog') }}" class="p-2 hover:bg-gray-300 flex">
                <i class="fa-brands fa-twitter mr-3"></i>
                Bài viết
            </a>
            <a href="{{ route('contact') }}" class="p-2 hover:bg-gray-300 flex" >
                <i class="fa-solid fa-file-signature mr-3"></i>
                Liên hệ
            </a>
        </div>
    </div>
</header>
<div class="md:flex hidden">
    <!-- Sidebar (Fixed) -->
    <div class="fixed top-0 left-0 h-screen w-48 flex bg-blue-950 text-white flex-col justify-between">
        <!-- Logo / Header -->
        <a class="flex flex-col items-center py-4 border-b border-blue-700">
            <img src="{{ asset('MyQR.jpg') }}" alt="QR Code Gen Logo" class="w-20 h-20 rounded-full">
        </a>

        <!-- Footer Links -->
        <div class="flex flex-col py-4 border-t border-blue-700">
            @auth
                @if (Auth::user()->status === 1)
                    <div class="flex flex-col items-center px-4 py-2 text-sm">
                        <p>Chào, <strong>{{ Auth::user()->name }}</strong></p>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg mt-2">
                            <i class="fas fa-sign-out-alt mr-3"></i> Đăng xuất
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <!-- Chuyển hướng nếu status không bằng 1 -->
                    @php
                        Auth::logout(); // Đăng xuất người dùng
                        session()->flash('error', 'Tài khoản của bạn đã bị khóa.'); // Đặt thông báo lỗi
                        header('Location: ' . route('login')); // Chuyển hướng đến trang đăng nhập
                        exit;
                    @endphp
                @endif
            @else
                <a href="{{ route('login') }}" class="flex items-center px-4 py-2 hover:bg-blue-700">
                    <i class="fas fa-sign-in-alt mr-3"></i> Đăng nhập
                </a>
                <a href="{{ route('register') }}" class="flex items-center px-4 py-2 hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 w-5 mr-3" fill="white">
                        <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    Đăng ký
                </a>
            @endauth
        </div>

        <!-- Navigation Items -->
        <div class="flex-1">
            <nav class="flex flex-col">
                <a href="{{ route('admin.blogs.index') }}"
                   class="flex items-center px-4 py-2 hover:bg-blue-700 {{ request()->is('admin/blogs') ? 'bg-blue-600' : '' }}"
                >
                    <i class="fas fa-qrcode mr-3"></i> Quản lý bài viết
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                   class="flex items-center px-4 py-2 hover:bg-blue-700 {{ request()->is('admin/contacts') ? 'bg-blue-600' : '' }}"
                >
                    <i class="fas fa-qrcode mr-3"></i> Quản lý liên hệ
                </a>
                <a href="{{ route('admin.qrcodes.index') }}"
                   class="flex items-center px-4 py-2 hover:bg-blue-700 {{ request()->is('admin/qrcodes') ? 'bg-blue-600' : '' }}"
                >
                    <i class="fas fa-user mr-3"></i> Quản lý mã QR
                </a>
                <a href="{{ route('admin.manageUsers.index') }}"
                   class="flex items-center px-4 py-2 hover:bg-blue-700 {{ request()->is('admin/manage-users') ? 'bg-blue-600' : '' }}"
                >
                    <i class="fa-brands fa-twitter mr-3"></i> Quản lý người dùng
                </a>
            </nav>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="md:ml-48">
    <div class="px-6">
        {{ $slot }}
    </div>
</div>
<script src="{{ asset('pluggins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        const container = $('#image-preview-contain');
        const previewImage = $('#image-preview');
        const uploadIcon = $('#icon-upload');
        const imageInput = $('#input-image');
        const regex2 = /\.(jpg|jpeg|png|bmp|gif|svg|webp)$/i;

        container.click(function () {
            imageInput.click();
        });

        imageInput.change(function (event) {
            const input = event.target;

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (regex2.test(file.name)) {
                    const reader2 = new FileReader();

                    reader2.onload = function (e) {
                        previewImage.attr('src', e.target.result);
                        previewImage.removeClass('hidden');
                        uploadIcon.addClass('hidden');
                        container.addClass('border border-gray-300 rounded-full');
                    }
                    reader2.readAsDataURL(input.files[0]);
                } else {
                    toastr.error('Hãy chọn file ảnh!');
                }
            } else {
                previewImage.addClass('hidden');
                uploadIcon.removeClass('hidden');
                container.removeClass('border border-gray-300 rounded-full');
            }
        });
    })

    function ChangeToSlug()
    {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("title").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
<script type="module">
    @if ($errors->any())
    toastr.error("{{ $errors->first() }}")
    @endif
    @if(session('success'))
    toastr.success("{{ session('success') }}")
    @endif
    @if(session('error'))
    toastr.error("{{ session('error') }}")
    @endif
</script>
@if (isset($script))
    {{ $script }}
@endif
</body>
</html>
