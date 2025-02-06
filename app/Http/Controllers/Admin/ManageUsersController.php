<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ManageUsersController extends Controller
{
    public function index(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $users = User::query();
        if ($name) {
            $users->where('name', 'like', '%' . $name . '%');
        }
        if ($email) {
            $users->where('email', 'like', '%' . $email . '%');
        }
        if ($phone) {
            $users->where('phone', 'like', '%' . $phone . '%');
        }
        $users = $users->where('role', '!=', Role::Admin->value)
                        ->orderBy('id','desc')
                        ->paginate(10);

        return view('admins.manageUsers.index', compact('users'));
    }
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        // Chuyển đổi trạng thái
        $user->status = !$user->status; // Nếu status = 1 thì chuyển thành 0 và ngược lại
        $user->save();

        return redirect()->back()->with('success', 'Trạng thái của người dùng đã được thay đổi.');
    }

}
