<x-admin-layout>
    <x-slot name="title">
        Quản lý mã QR
    </x-slot>
    <div>
        <!-- Tiêu đề -->
        <div class="font-bold text-4xl text-green-600 mt-1 text-center uppercase">Quản lý mã QR</div>
        <div class="flex flex-col mt-5">
            <div class="-m-1.5 overflow-x-auto [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-blue-300">
                <div class="mt-2 p-1.5 min-w-full inline-block align-middle">
                    <div class="flex justify-end my-2">
                        <form method="GET" action="{{ route('admin.qrcodes.index') }}" class="flex flex-wrap items-center gap-4">
                            <div>
                                <input type="text" name="qr_code_name" id="qr_code_name" value="{{ request('qr_code_name') }}"
                                       class="mt-1 p-2 block w-[19rem] border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                       placeholder="Tìm theo tên mã QR">
                            </div>
                            <div>
                                <button type="submit"
                                        class="bg-green-500 text-white hover:bg-green-700 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-opacity-50">                                    Tìm kiếm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách QR Codes -->
        <div x-data="{ showModal: false, qrData: {} }" class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-300">
                <tr>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Hình ảnh</th>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Loại mã QR</th>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Tên mã QR</th>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-700 uppercase">Người dùng</th>
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
                                <!-- Người dùng -->
                                <td class="px-6 py-4">{{ optional($qrcode->user)->name ?? 'Không xác định' }}</td>
                                <!-- Ngày tạo -->
                                <td class="px-6 py-4">{{ $qrcode->created_at->format('d/m/Y H:i') }}</td>
                                <!-- Nút Xóa -->
                                <td class="px-6 py-4">
                            <form action="{{ route('admin.qrcodes.destroy', $qrcode->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa mã QR này không?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">
                                    Xóa
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
                                    <p><strong>Email: </strong><span x-text="qrData.email_address"></span> </p>
                                    <p><strong>Tiêu đề: </strong><span x-text="qrData.email_subject"></span> </p>
                                    <p><strong>Nội dung: </strong><span x-text="qrData.email_body"></span> </p>
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
                                    <p><strong>Loại tệp tin:</strong><span x-text="qrData.file_category"></span> </p>
                                    <p><strong>URL:</strong> <a :href="qrData.url" target="_blank" class="text-blue-500 hover:underline" x-text="qrData.url"></a></p>
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
    </div>
</x-admin-layout>
