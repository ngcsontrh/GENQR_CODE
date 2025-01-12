<x-user-layout>
    <x-slot name="title">
        Thông tin tài khoản
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
            Tài khoản
        </li>
    </ol>

    <div class="grid grid-cols-1 lg:grid-cols-2 ">
        <!-- Form cập nhật thông tin -->
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Thông tin tài khoản</h2>

            <form action="{{ route('user.account.update') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2.5 focus:ring-2 focus:ring-blue-500">
                    @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2.5 focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" readonly
                           class="mt-1 block w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md shadow-sm p-2.5">
                    <small class="text-amber-700">Email không thể thay đổi.</small>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="py-3 px-6 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none transition duration-300 ease-in-out">
                        Cập nhật thông tin
                    </button>
                </div>
            </form>
        </div>

        <!-- Form đổi mật khẩu -->
        <div class="container mx-auto px-4 py-8 ">
            <h2 class="text-3xl text-center font-bold text-gray-800 mb-8">Đổi mật khẩu</h2>

            <form action="{{ route('user.account.change-password') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto">
                @csrf
                <!-- Mật khẩu hiện tại -->
                <div class="mb-6">
                    <label for="current_password" class="block text-sm mb-2 dark:text-white">{{ __('Mật khẩu hiện tại') }}</label>
                    <div class="relative">
                        <input id="current_password" type="password" name="current_password" required
                               class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <button type="button" data-hs-toggle-password='{
                  "target": "#current_password"
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
                </div>

                <!-- Mật khẩu mới -->
                <div class="mb-6">
                    <label for="new_password" class="block text-sm mb-2 dark:text-white">{{ __('Mật khẩu mới') }}</label>
                    <div class="relative">
                        <input id="new_password" type="password" name="new_password" required
                               class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <button type="button" data-hs-toggle-password='{
                  "target": "#new_password"
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
                </div>

                <!-- Xác nhận mật khẩu mới -->
                <div class="mb-6">
                    <label for="new_password_confirmation" class="block text-sm mb-2 dark:text-white">{{ __('Xác nhận mật khẩu mới') }}</label>
                    <div class="relative">
                        <input id="new_password_confirmation" type="password" name="new_password_confirmation" required
                               class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <button type="button" data-hs-toggle-password='{
                  "target": "#new_password_confirmation"
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
                </div>

                <!-- Nút submit -->
                <div class="flex justify-end">
                    <button type="submit" class="mt-6 py-3 px-6 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none transition duration-300 ease-in-out">
                        Đổi mật khẩu
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-user-layout>

