<x-user-layout>
    <x-slot name="title">
        Lịch sử tạo mã QR
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
            Lịch sử tạo mã
        </li>
    </ol>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Lịch sử tạo mã QR</h2>

        @if($qrcodes->isEmpty())
            <div class="text-center text-gray-500 min-h-96 flex items-center justify-center">
                <p class="">Bạn chưa tạo mã QR nào.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20 items-center text-center">
                @foreach($qrcodes as $qrcode)
                    <div class="flex flex-col bg-white shadow-2xl rounded-lg p-4">
                        <!-- QR Code Image -->
                        <div class="flex-shrink-0 mb-4">
                            <img src="{{ Storage::url($qrcode->qr_code_path) }}" alt="QR Code with Logo" class="w-2/3 object-cover rounded-md mx-auto">
                        </div>
                        <!-- Details -->
                        <div class="flex flex-col justify-between flex-grow">
                            <div>
                                <h3 class="text-lg font-medium mb-2">Loại QR Code: {{ ucfirst($qrcode->type) }}</h3>
                                <div class="text-sm text-gray-700">
                                    @switch($qrcode->type)
                                        @case('URL')
                                            <p><strong>URL:</strong> <a href="{{ $qrcode->url }}" class="text-blue-500 hover:underline">{{ $qrcode->url }}</a></p>
                                            @break

                                        @case('Vcard')
                                            <p><strong>Họ & Tên:</strong> {{ $qrcode->vcard_lastname }} {{ $qrcode->vcard_name }} </p>
                                            <p><strong>Email:</strong> {{ $qrcode->vcard_email }}</p>
                                            @break

                                        @case('Email')
                                            <p><strong>Email:</strong> {{ $qrcode->email_address }}</p>
                                            <p><strong>Tiêu đề:</strong> {{ $qrcode->email_subject }}</p>
                                            <p><strong>Nội dung:</strong> {{ $qrcode->email_body }}</p>
                                            @break

                                        @case('Phone')
                                            <p><strong>Số điện thoại:</strong> {{ $qrcode->phone_number }}</p>
                                            @break

                                        @case('SMS')
                                            <p><strong>Số điện thoại:</strong> {{ $qrcode->phone_number }}</p>
                                            <p><strong>Nội dung:</strong> {{ $qrcode->sms_content }}</p>
                                            @break

                                        @case('Wifi')
                                            <p><strong>Tên WiFi:</strong> {{ $qrcode->wifi_name }}</p>
                                            <p><strong>Mật khẩu:</strong> {{ $qrcode->wifi_password }}</p>
                                            <p><strong>Loại mã hóa:</strong> {{ $qrcode->wifi_encryption }}</p>
                                            @break

                                        @case('Docs')
                                            <p><strong>Văn bản:</strong> {{ $qrcode->docs_content }}</p>
                                            @break

                                        @default
                                            <p>Thông tin không xác định.</p>
                                    @endswitch
                                </div>
                                <p class="text-gray-500 text-sm mt-2">Ngày tạo: {{ $qrcode->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <!-- Download Button -->
                            <div class="mt-4">
                                <a href="{{ Storage::url($qrcode->qr_code_path) }}" download class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 flex w-32 mx-auto items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 h-5 mr-1" fill="white">
                                        <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128l-368 0zm79-167l80 80c9.4 9.4 24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-39 39L344 184c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 134.1-39-39c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9z"/></svg>
                                    Tải xuống
                                </a>

{{--                                <a href="{{ route('qr.edit', ['unique_id' => $qrcode->unique_id]) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mt-2">Chỉnh sửa</a>--}}

                                <form action="{{ route('qrcodes.destroy', $qrcode->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa mã QR này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg mt-2">
                                        <i class="fa-solid fa-trash-can mr-2"></i>Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $qrcodes->links() }} <!-- Pagination links -->
            </div>
        @endif
    </div>
</x-user-layout>
