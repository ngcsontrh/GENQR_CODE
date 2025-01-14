<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        // Nếu người dùng có vai trò admin, chuyển hướng đến trang quản trị
        if (Auth::guard('admin')->check()) {
            return route('admin.blogs.index');
        }

        // Ngược lại, chuyển hướng về trang chủ cho người dùng thông thường
        return '/';
    }

    protected function guard()
    {
        $username = request()->input($this->username());

        if ($username) {
            try {
                $username = decrypt($username);
            } catch (DecryptException $e) {
                $username = null;
            }
        }

        $role = User::when($username, function ($query, $username) {
            return $query->where($this->username(), $username);
        })->pluck('role')->first();
        return $role === Role::Admin->value
            ? Auth::guard('admin')
            : Auth::guard();
    }

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
        $user = User::where('email', $request->email)->first();

        if ($user && $user->status != 1) {
            // Trả về thông báo lỗi nếu status không hợp lệ
            throw ValidationException::withMessages([
                'email' => ['Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.'],
            ]);
        }

        // Trả về lỗi mặc định nếu thông tin đăng nhập không chính xác
        throw ValidationException::withMessages([
            'email' => ['Thông tin đăng nhập không chính xác'],
        ]);
    }
}

