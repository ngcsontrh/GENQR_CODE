<x-admin-layout>
    <x-slot name="title">
        Đăng nhập trang quản trị
    </x-slot>
    <div class="flex justify-center mt-16 h-full">
        <div class="sm:max-w-lg sm:w-full sm:mx-auto">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg">
                <div class="p-6 sm:p-8">
                    <!-- Header -->
                    <div class="text-center">
                        <img class="mx-auto" src="{{ asset('MyQR.ico') }}">
                        <h2 class="text-3xl font-bold text-gray-900">Đăng nhập quản trị viên
                        </h2>
{{--                        <p class="mt-2 text-sm text-gray-600">Đăng nhập vào tài khoản quản trị của bạn</p>--}}
                    </div>

                    <!-- Form -->
                    <div class="mt-8">
                        <form method="post" action="{{ route('admin.signin.store') }}">
                            @csrf
                            <div class="space-y-6">
                                <!-- Username Input -->
                                <div>
                                    <label for="username" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                                    <div class="mt-1 relative">
                                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                                               class="py-3 px-4 block w-full border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="Nhập tên đăng nhập" required autofocus>
                                        @error('username')
                                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="mb-4">
                                    <label for="hs-toggle-password" class="block text-sm mb-2 dark:text-white">{{ __('Mật khẩu') }}</label>
                                    <div class="relative">
                                        <input id="hs-toggle-password" type="password" name="password" placeholder="Nhập mật khẩu" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" required>
                                        <button type="button" data-hs-toggle-password='{
                                          "target": "#hs-toggle-password"
                                        }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                            <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                                <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                                <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                                <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                                                <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div>
                                    <button type="submit" class="w-full py-3 px-4 flex justify-center items-center text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
