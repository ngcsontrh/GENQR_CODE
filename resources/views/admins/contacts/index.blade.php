<x-admin-layout>
    <x-slot name="title">
        Quản lý liên hệ
    </x-slot>
    <div>
        <div class="font-bold text-2xl text-center">Quản lý liên hệ</div>
        <div class="flex justify-end mt-2">
            <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex flex-wrap items-center gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" name="name" id="name" value="{{ request('name') }}"
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Tìm theo tên">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email" value="{{ request('email') }}"
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Tìm theo email">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" value="{{ request('phone') }}"
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           placeholder="Tìm theo số điện thoại">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">&nbsp;</label>
                    <button type="submit"
                            class="bg-indigo-600 text-white mt-1 py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-blue-300">
                <div class="mt-5 p-1.5 min-w-full inline-block align-middle">
                    <div class="">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tên</th>
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Số điện thoại</th>
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Mô tả</th>
                                    <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Trạng thái</th>
                                    <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Chuyển trạng thái</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach($contacts as $contact)
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $contact->name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $contact->phone }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $contact->email }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $contact->message }}</td>
                                        <td class="px-4 py-3 text-center text-sm text-gray-800">
                                            <!-- Kiểm tra trạng thái đã xem -->
                                            <div id="status-{{ $contact->id }}">
                                                @if($contact->status == 0)
                                                    <div class="text-xs bg-red-300 text-red-800 p-1 rounded">Chưa xử lý</div>
                                                @else
                                                    <div class="text-xs bg-green-200 text-green-800 p-1 rounded">Đã xử lý</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-center text-sm">
                                            <!-- Nút chuyển trạng thái -->
                                            <button class="text-white bg-blue-400 p-2 rounded hover:bg-blue-600" onclick="toggleStatus({{ $contact->id }}, {{ $contact->status }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="white">
                                                    <path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160 352 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l111.5 0c0 0 0 0 0 0l.4 0c17.7 0 32-14.3 32-32l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1L16 432c0 17.7 14.3 32 32 32s32-14.3 32-32l0-35.1 17.6 17.5c0 0 0 0 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.8c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352l34.4 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L48.4 288c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{ $contacts->links('layouts.pagination', ['role' => 'user']) }}
            </div>
        </div>
    </div>
    <script>
        function toggleStatus(contactId, currentStatus) {
            // Trạng thái mới sẽ là giá trị ngược lại
            const newStatus = currentStatus === 0 ? 1 : 0;

            fetch(`/contacts/${contactId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: contactId,
                    status: newStatus
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giao diện dựa trên trạng thái mới
                        const statusElement = document.getElementById(`status-${contactId}`);
                        if (statusElement) {
                            // Cập nhật lại `onclick` với giá trị trạng thái mới
                            statusElement.setAttribute('onclick', `toggleStatus(${contactId}, ${newStatus})`);

                            // Thay đổi giao diện dựa trên trạng thái mới
                            if (newStatus === 0) {
                                statusElement.innerHTML = '<div class="text-xs bg-red-300 text-red-800 p-1 rounded">Chưa xử lý</div>';
                            } else {
                                statusElement.innerHTML = '<div class="text-xs bg-green-200 text-green-800 p-1 rounded">Đã xử lý</div>';
                            }
                        }
                    } else {
                        alert('Có lỗi xảy ra khi cập nhật trạng thái.');
                    }
                })
                .catch(error => {
                    console.error('Có lỗi xảy ra:', error);
                });
        }
    </script>
</x-admin-layout>
