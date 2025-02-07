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
            <!-- Danh sách QR Codes -->
            <div x-data="{ showModal: false, qrData: {} }" class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Hình ảnh</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Loại mã QR</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Tên mã QR</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Ngày tạo</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Hành động</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($qrcodes as $qrcode)
                        <tr>
                            <!-- Hình ảnh QR -->
                            <td class="px-6 py-4">
                                <img
                                    src="{{ Storage::url($qrcode->qr_code_path) }}"
                                    alt="QR Code"
                                    class="w-16 h-16 cursor-pointer hover:scale-110 transition-transform"
                                    @click="showModal = true; qrData = {
                                        id: '{{ $qrcode->id }}',
                                        image: '{{ Storage::url($qrcode->qr_code_path) }}',
                                        type: '{{ ucfirst($qrcode->type) }}',
                                        qr_code_name: '{{ $qrcode->qr_code_name }}',
                                        user: '{{ optional($qrcode->user)->name ?? 'Không xác định' }}',
                                        created_at: '{{ $qrcode->created_at->format('d/m/Y H:i') }}',
                                        phone_number: '{{ $qrcode->phone_number }}',
                                        sms_content: '{{ $qrcode->sms_content }}',
                                        url: '{{ $qrcode->url }}',
                                        bank_acq_name: '{{ $qrcode->bank_acq_name }}',
                                        bank_account_no: '{{ $qrcode->bank_account_no }}',
                                        bank_account_name: '{{ $qrcode->bank_account_name }}',
                                        email_address: '{{ $qrcode->email_address }}',
                                        email_subject: '{{ $qrcode->email_subject }}',
                                        email_body: '{{ $qrcode->email_body }}',
                                        file_category: '{{ $qrcode->file_category }}'
                                    }">
                            </td>
                            <!-- Loại mã QR -->
                            <td class="px-6 py-4">{{ ucfirst($qrcode->type) }}</td>
                            <!-- Tên mã QR -->
                            <td class="px-6 py-4">{{ $qrcode->qr_code_name }}</td>
                            <!-- Ngày tạo -->
                            <td class="px-6 py-4">{{ $qrcode->created_at->format('d/m/Y H:i') }}</td>
                            <!-- Nút Xóa -->
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($qrcode->qr_code_path) }}" download class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    <i class="fa-solid fa-download mr-2"></i>
                                    Tải xuống
                                </a>

                                <a href="{{ route('qr.edit', ['unique_id' => $qrcode->unique_id]) }}" class="inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Chỉnh sửa
                                </a>

                                <form class="inline-block" action="{{ route('qrcodes.destroy', $qrcode->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa mã QR này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">
                                        <i class="fa-solid fa-trash-can mr-2"></i>Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $qrcodes->links('layouts.pagination', ['role' => 'user']) }}


                <!-- Modal hiển thị chi tiết QR -->
                <div
                    x-show="showModal"
                    x-transition
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50"
                    @click.self="showModal = false"
                    style="display: none;">
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg relative">
                        <!-- Nút Close -->
                        <button
                            @click="showModal = false"
                            class="absolute top-0 right-0 m-4 text-gray-600 text-2xl hover:text-gray-400">&times;
                        </button>

                        <!-- Nội dung modal -->
                        <div class="flex flex-col items-center">
                            <!-- Ảnh phóng to -->
                            <img :src="qrData.image" alt="QR Code" class="w-96 h-96 mb-4 rounded-lg shadow-lg">
                            <!-- Thông tin QR -->
                            <div class="text-left w-full">
                                <h3 class="text-lg font-bold mb-2 text-center">Thông tin chi tiết mã QR</h3>
                                <p><strong>Loại mã QR:</strong> <span x-text="qrData.type"></span></p>
                                <p><strong>Tên mã QR:</strong> <span x-text="qrData.qr_code_name"></span></p>

                                <!-- Hiển thị thông tin theo từng loại mã QR -->
                                <template x-if="qrData.type === 'Vcard'">
                                    <div>
                                        <p><strong>Họ & Tên:</strong> <span x-text="qrData.vcard_lastname"></span></p>
                                        <p><strong>Email:</strong> <span x-text="qrData.vcard_email"></span></p>
                                    </div>
                                </template>
                                <template x-if="qrData.type === 'SMS'">
                                    <div>
                                        <p><strong>Số điện thoại:</strong> <span x-text="qrData.phone_number"></span></p>
                                        <p><strong>Nội dung SMS:</strong> <span x-text="qrData.sms_content"></span></p>
                                    </div>
                                </template>

                                <template x-if="qrData.type === 'Phone'">
                                    <p><strong>Số điện thoại:</strong> <span x-text="qrData.phone_number"></span></p>
                                </template>

                                <template x-if="qrData.type === 'URL'">
                                    <p><strong>URL:</strong> <a :href="qrData.url" target="_blank" class="text-blue-500 hover:underline" x-text="qrData.url"></a></p>
                                </template>

                                <template x-if="qrData.type === 'Email'">
                                    <div>
                                        <p><strong>Email:</strong><span x-text="qrData.email_address"></span> </p>
                                        <p><strong>Tiêu đề:</strong><span x-text="qrData.email_subject"></span> </p>
                                        <p><strong>Nội dung:</strong><span x-text="qrData.email_body"></span> </p>
                                    </div>
                                </template>
                                <template x-if="qrData.type === 'Wifi'">
                                    <div>
                                        <p><strong>Tên WiFi:</strong> <span x-text="qrData.wifi_name"></span></p>
                                        <p><strong>Mật khẩu:</strong> <span x-text="qrData.wifi_password"></span></p>
                                        <p><strong>Loại mã hóa:</strong> <span x-text="qrData.wifi_encryption"></span></p>
                                    </div>
                                </template>
                                <template x-if="qrData.type === 'File'">
                                    <div>
                                        <p><strong>Loại tệp tin: </strong><span x-text="qrData.file_category"></span> </p>
                                        <p><strong>URL: </strong> <a :href="qrData.url" target="_blank" class="text-blue-500 hover:underline" x-text="qrData.url"></a></p>
                                    </div>
                                </template>
                                <!-- Hiển thị thông tin Văn bản -->
                                <template x-if="qrData.type === 'Docs'">
                                    <div>
                                        <p><strong>Văn bản:</strong> <span x-text="qrData.docs_content"></span></p>
                                    </div>
                                </template>
                                <template x-if="qrData.type === 'Bank'">
                                    <div>
                                        <p><strong>Ngân hàng:</strong> <span x-text="qrData.bank_acq_name"></span></p>
                                        <p><strong>Số tài khoản:</strong> <span x-text="qrData.bank_account_no"></span></p>
                                        <p><strong>Tên tài khoản:</strong> <span x-text="qrData.bank_account_name"></span></p>
                                    </div>
                                </template>
                                <p><strong>Ngày tạo:</strong> <span x-text="qrData.created_at"></span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
</x-user-layout>
