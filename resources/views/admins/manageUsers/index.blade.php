<x-admin-layout>
    <x-slot name="title">
        Quản lý tài khoản người dùng
    </x-slot>
    <div>
        <div class="font-bold text-2xl text-center">Quản lý tài khoản người dùng</div>
        <div class="flex justify-end mt-2">
            <form method="GET" action="{{ route('admin.manageUsers.index') }}" class="flex flex-wrap items-center gap-4">
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
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase">Số điện thoại</th>
                                    <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Trạng thái</th>
                                    <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Chuyển trạng thái</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach($users as $user)
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $user->name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $user->email }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $user->phone }}</td>
                                        <td class="px-4 py-3 text-center text-sm text-gray-800">
                                            @if($user->status == 1)
                                                <span class="text-xs bg-green-200 text-green-800 px-2 py-1 rounded">Hoạt động</span>
                                            @else
                                                <span class="text-xs bg-red-300 text-red-800 px-2 py-1 rounded">Tạm khóa</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center text-sm text-gray-800">
                                            <!-- Nút chuyển trạng thái -->
                                            <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" id="toggle-form-{{ $user->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded">
                                                    Chuyển
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $users->links('layouts.pagination', ['role' => 'user']) }}
            </div>
        </div>
    </div>
</x-admin-layout>
