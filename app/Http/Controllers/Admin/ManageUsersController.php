<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ManageUsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
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
