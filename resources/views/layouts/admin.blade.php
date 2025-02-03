<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('MyQR.ico') }}" type="image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="font-sans antialiased">
<div class="flex min-h-[100vh]">
    @if(Auth::check() && Auth::user()->role === \App\Enums\Role::Admin->value)
        <div class="w-1/6 md:w-1/12 lg:w-1/6 transition-all duration-500">
            <div class=" transition-all duration-300 transform start-0 block bottom-0 z-[60] h-full bg-white border-e border-gray-200 py-2 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <!-- Thông tin nhân viên và nút đăng xuất -->
                <div class="p-4 bg-gray-100 border-b border-gray-300 flex justify-between items-center">
                    <div class="text-lg font-semibold">
                        Xin chào, {{ Auth::user()->name }}
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Đăng xuất
                        </button>
                    </form>
                </div>
                <div class="flex justify-center p-4 border-gray-400 border-b-2">
                    <div class="lg:block hidden font-bold text-xl">Admin</div>
                    <div class="lg:hidden block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                    </div>
                </div>
                <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                    <ul class="space-y-1.5">
                        <li>
                            <a class="flex justify-center lg:justify-start items-center gap-1 py-2 px-2.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-300" href="{{ route('admin.blogs.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5">
                                    <path d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5
                                    0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8
                                     6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4
                                      13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4
                                      109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1
                                      23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/></svg>
                                <div class="lg:block text-nowrap hidden">Quản lý Blogs</div>
                            </a>
                        </li>
                        <li>
                            <a class="flex justify-center lg:justify-start items-center gap-1 py-2 px-2.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-300" href="{{ route('admin.contacts.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5">
                                    <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM218 271.7L64.2 172.4C66 156.4 79.5 144 96 144l256 0c16.5 0 30 12.4 31.8 28.4L230 271.7c-1.8 1.2-3.9 1.8-6 1.8s-4.2-.6-6-1.8zm29.4 26.9L384 210.4 384 336c0 17.7-14.3 32-32 32L96 368c-17.7 0-32-14.3-32-32l0-125.6 136.6 88.2c7 4.5 15.1 6.9 23.4 6.9s16.4-2.4 23.4-6.9z"/></svg>
                                <div class="lg:block text-nowrap hidden">Quản lý Liên Hệ</div>
                            </a>
                        </li>
                        <li>
                            <a class="flex justify-center lg:justify-start items-center gap-1 py-2 px-2.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-300" href="{{ route('admin.qrcodes.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5">
                                    <path d="M0 80C0 53.5 21.5 32 48 32l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48L0 80zM64 96l0 64 64 0 0-64L64 96zM0 336c0-26.5 21.5-48 48-48l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-96zm64 16l0 64 64 0 0-64-64 0zM304 32l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-96c0-26.5 21.5-48 48-48zm80 64l-64 0 0 64 64 0 0-64zM256 304c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16l0 96c0 8.8-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-160zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/></svg>
                                <div class="lg:block text-nowrap hidden">Quản lý Mã QR</div>
                            </a>
                        </li>
                        <li>
                            <a class="flex justify-center lg:justify-start items-center gap-1 py-2 px-2.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-300" href="{{ route('admin.manageUsers.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 h-5">
                                    <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                                <div class="lg:block text-nowrap hidden">Quản lý tài khoản User</div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    @endif
    <div class="@if(Auth::check() && Auth::user()->role === \App\Enums\Role::Admin->value) w-5/6 md:w-11/12 lg:w-5/6 @else w-full bg-gray-300 @endif transition-all duration-500 p-5">
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
