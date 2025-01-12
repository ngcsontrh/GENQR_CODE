<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
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
        // Lấy thông tin người dùng bằng thông tin đăng nhập
        $credentials = $this->credentials($request);

        $credentials['status'] = 1; // Chỉ cho phép người dùng có status = 1

        // Kiểm tra đăng nhập với thêm điều kiện status
        return $this->guard()->attempt(
            $credentials,
            $request->filled('remember')
        );
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && $user->status != 1) {
            // Trả về thông báo lỗi nếu status không hợp lệ
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.'],
            ]);
        }

        // Trả về lỗi mặc định nếu thông tin đăng nhập không chính xác
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}

