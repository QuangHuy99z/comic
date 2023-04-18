<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'Delete user successfully');
    }

    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.users.login');
        }

        $account = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($account)) {
            if (Auth::guard('admin')->user()->position == 'admin') {
                return redirect()->route('admin.comics.index');
            }
            return redirect()->back()->with('message', 'Incorrect account or password');
        } else {
            return redirect()->back()->with('message', 'Incorrect account or password');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
