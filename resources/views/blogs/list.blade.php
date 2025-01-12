
<x-user-layout>
    <x-slot name="title">
        Blog
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
                    Blog
                </li>
    </ol>
    <h2 class="mx-auto text-center font-bold text-4xl text-green-600">
        Blog
    </h2>

    <section class="py-10 lg:py-24">
        <div class="container mx-auto px-4">
            @if($blogs->isEmpty())
                <!-- Hiển thị thông báo nếu không có blog -->
                <div class="text-center py-20">
                    <h2 class="text-2xl font-semibold text-gray-600 mb-4">Hệ thống sẽ cập nhật</h2>
                    <p class="text-gray-500">Chúng tôi đang cập nhật các bài viết mới nhất. Vui lòng quay lại sau.</p>
                </div>
            @else
                <!-- Lưới bài viết -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <!-- Blog Card -->
                        <div class="bg-white overflow-hidden group relative">
                            <!-- Blog Image Wrapper with Overlay -->
                            <div class="relative overflow-hidden rounded-br-[100px]">
                                <img src="{{ Storage::url($blog->image->path) }}" alt="Blog Post Image" class="w-full h-72 object-cover transform scale-110 transition-transform duration-300 group-hover:scale-100">

                                <!-- Dark Overlay -->
                                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>

                                <!-- Date Badge -->
                                <div class="absolute top-4 left-4 bg-green-500 text-white px-4 py-1 rounded-full text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 mr-1 fill-current">
                                        <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                    </svg>
                                    {{ $blog->updated_at->format('d, M Y') }}
                                </div>
                            </div>
                            <!-- Blog Content -->
                            <div class="py-3">
                                <h2 class="text-2xl font-bold mb-2 transition-colors duration-300 hover:text-amber-500">{{ $blog->title }}</h2>
                                <p class="text-gray-600 mb-4">{{ $blog->summary }}</p>
                                <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}" class="inline-block px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-full transition-all duration-300">
                                    Đọc thêm
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-user-layout>
