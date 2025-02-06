<x-admin-layout>
    <x-slot name="title">
        Quản lý blogs
    </x-slot>
    <div>
        <div class="font-bold text-2xl text-center">Quản lý Blogs</div>
        <div class="flex flex-col mt-5">
            <div class="-m-1.5 overflow-x-auto [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-blue-300">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="flex justify-between flex-wrap my-2">
                        <div>
                            <span>&nbsp;</span>
                            <a href="{{ route('admin.blogs.create') }}" class="flex p-2 bg-blue-300 rounded text-blue-800 font-semiboldbold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-current text-blue-800">
                                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                Bài viết mới
                            </a>
                        </div>
                        <form method="GET" action="{{ route('admin.blogs.index') }}" class="flex flex-wrap items-center gap-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                                <input type="text" name="title" id="title" value="{{ request('title') }}"
                                       class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                       placeholder="Tìm theo tiêu đề">
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
                    <div class="">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-300">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th scope="col" class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tiêu đề</th>
                                <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hình ảnh</th>
                                <th scope="col" class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tóm tắt</th>
                                <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">Trạng thái</th>
                                <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ngày tạo</th>
                                <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach($blogs as $blog)
                                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                                    <td class="px-2 py-3 whitespace-nowrap text-center text-sm font-medium text-gray-800">#{{ $blog->id }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-800">
                                        <div class="max-w-44 line-clamp-1" title="{{ $blog->title }}">{{ $blog->title }}</div>
                                    </td>
                                    <td>
                                        <div class="flex items-center justify-center">
                                            <div>
                                                <img class="flex items-center justify-center w-[200px] h-[100px] border bg-gray-600 rounded" src="{{ Storage::url($blog->image->path) }}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 text-sm text-gray-800">
                                        <div class="max-w-44 line-clamp-1">{{$blog->summary }}</div>
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap text-center text-sm text-gray-800">
                                        @switch($blog->status)
                                            @case('1')
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs bg-gray-200 text-gray-800">Ẩn</span>
                                                @break
                                            @default
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs bg-green-200 text-green-800">Hiển thị</span>
                                        @endswitch
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap text-center text-sm text-gray-800">{{ date_format($blog->created_at, 'd/m/Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.blogs.edit', $blog->slug) }}" class="py-2 px-3 border rounded-lg bg-blue-300 text-blue-700">Sửa</a>
                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-2 px-3 border rounded-lg bg-red-300 text-red-700" onclick="return confirm('Bạn có chắc chắn muốn xóa blog này?')">Xoá</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $blogs->links('layouts.pagination', ['role' => 'user']) }}
            </div>
        </div>
    </div>
</x-admin-layout>
