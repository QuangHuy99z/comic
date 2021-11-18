<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.ussers.index')->with('message', 'Delete comic successfully');
    }
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.users.login');
        }
        $account = [
            'email' => $request->email,
            'password'=> $request->password
        ];
       
        if (Auth::guard('admin')->attempt($account)) {
            return redirect()->route('admin.comics.index');
        } else {
            return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
