@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="justify-center items-center py-4 px-6 rounded-t-lg flex-col text-center">
                        <img src="{{ asset('MyQR.ico') }}" class="mx-auto w-32">
                        <h2 class="text-2xl font-semibold">{{ __('Đăng nhập') }}</h2>
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                <input id="email" type="email" placeholder="Nhập Email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

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

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input class="form-check-input h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="ml-2 block text-sm text-gray-900" for="remember">
                                        {{ __('Ghi nhớ đăng nhập') }}
                                    </label>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition duration-300">
                                    {{ __('Đăng nhập') }}
                                </button>
                            </div>

                            <div class="mt-4 text-center">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
