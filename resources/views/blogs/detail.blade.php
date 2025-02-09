<x-user-layout>
    <x-slot name="title">
        {{ $blogs->title }}
    </x-slot>

    <!-- Breadcrumb -->
    <ol class="flex items-center whitespace-nowrap lg:px-48 mx-4 text-md">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="flex items-center text-gray-500 hover:text-blue-600 dark:text-neutral-500">
                <svg class="shrink-0 mr-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Trang chủ
            </a>
            <svg class="mx-2 w-4 h-4 text-gray-400 dark:text-neutral-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center">
            <a href="{{ route('blog') }}" class="text-gray-500 hover:text-blue-600 dark:text-neutral-500">
                Bài viết
            </a>
            <svg class="mx-2 w-4 h-4 text-gray-400 dark:text-neutral-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"></path>
            </svg>
        </li>
        <li class="text-sm text-amber-700 dark:text-neutral-200 truncate">
            {{ $blogs->title }}
        </li>
    </ol>

    <!-- Blog Content -->
    <div class="container mx-auto px-4 py-4 lg:max-w-4xl">
        <div class="bg-white shadow-md rounded-lg dark:bg-neutral-900 overflow-hidden">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-6 py-4 border-b dark:border-neutral-700">
                {{ $blogs->title }}
            </h3>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 px-6 py-2">
                <svg class="w-4 h-4 mr-1 fill-current" viewBox="0 0 512 512">
                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                </svg>
                <span>{{ $blogs->updated_at->format('H:i d/m/Y') }}</span>
            </div>

            <!-- Content -->
            <div class="p-6">
                <p class="text-gray-700 dark:text-neutral-400 mb-4">
                    {{ $blogs->summary }}
                </p>

                <div class="text-gray-600 dark:text-neutral-400">
                    {!! $blogs->content !!}
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
