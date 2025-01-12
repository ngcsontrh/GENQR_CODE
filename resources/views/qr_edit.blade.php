<x-user-layout>
    <x-slot name="title">
        Chỉnh sửa mã QR
    </x-slot>

    <!-- Breadcrumb -->
    <nav class="flex items-center lg:px-12 mx-4 mt-10 text-sm">
        <a href="{{ route('home') }}" class="flex items-center text-gray-500 hover:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            Trang chủ
        </a>
        <span class="mx-2 text-gray-400 dark:text-neutral-600">/</span>
        <span class="text-amber-700 dark:text-neutral-200">Chỉnh sửa mã QR</span>
    </nav>

    <!-- Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8 px-4 lg:px-12">
        <!-- Form cập nhật thông tin -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200 text-center">Thông tin mã QR</h2>
            <form action="{{ route('qr.update', ['unique_id' => $qrcode->unique_id]) }}" method="POST" class="space-y-6">
                @csrf

                <!-- URL Input -->
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL:</label>
                    <input type="text" name="url" id="url" value="{{ $qrcode->url }}" placeholder="Nhập URL"
                           class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                </div>

                <!-- VCard Name Input -->
                <div>
                    <label for="vcard_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tên VCard:</label>
                    <input type="text" name="vcard_name" id="vcard_name" value="{{ $qrcode->vcard_name }}" placeholder="Nhập tên VCard"
                           class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                </div>

                <!-- VCard Last Name Input -->
                <div>
                    <label for="vcard_lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Họ VCard:</label>
                    <input type="text" name="vcard_lastname" id="vcard_lastname" value="{{ $qrcode->vcard_lastname }}" placeholder="Nhập họ VCard"
                           class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                </div>

                <!-- VCard Email Input -->
                <div>
                    <label for="vcard_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email VCard:</label>
                    <input type="email" name="vcard_email" id="vcard_email" value="{{ $qrcode->vcard_email }}" placeholder="Nhập email VCard"
                           class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview QR Code -->
        <div class="bg-gray-50 dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200 text-center">Xem trước mã QR</h2>
            <div class="flex items-center justify-center">
                <img src="{{ Storage::url($qrcode->qr_code_path) }}" alt="QR Code Preview" class="w-64 h-64 object-cover rounded-lg shadow-md">
            </div>
            <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Bạn có thể xem trước mã QR hiện tại ở đây.</p>
        </div>
    </div>
</x-user-layout>
