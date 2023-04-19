<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function get_list_users()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $user = User::findOrFail($id);
            return view('admin.users.detail', compact('user'));
        }
        $update_user = [
            'name' => $request->name,
        ];
        if($request->avatar){
            $file = $request->avatar;
            $pathName =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/users/', $pathName);
            $update_user['avatar'] = $pathName;
        } else {
            $update_user['avatar'] = "";
        }
        User::findOrFail($id)->update($update_user);
        return redirect()->route('admin.users.edit', $id)->with('message', 'Update user successfully');
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
