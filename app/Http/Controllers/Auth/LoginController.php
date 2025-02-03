<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Tạo một controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Ghi đè phương thức attemptLogin để kiểm tra status của người dùng.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $credentials['status'] = 1; // Chỉ cho phép người dùng có status = 1

        // Kiểm tra đăng nhập với điều kiện status
        return Auth::attempt($credentials, $request->filled('remember'));
    }

    /**
     * Xử lý khi đăng nhập thất bại.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && $user->status != 1) {
            throw ValidationException::withMessages([
                'email' => ['Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.'],
            ]);
        }

        throw ValidationException::withMessages([
            'email' => ['Thông tin đăng nhập không chính xác'],
        ]);
    }

    /**
     * Ghi đè phương thức authenticated để luôn redirect đúng theo role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        return $user->role === Role::Admin->value
            ? redirect()->route('admin.blogs.index')
            : redirect('/');
    }
}
