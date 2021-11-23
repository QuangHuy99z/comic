<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.users.login');
        }
        $account = [
            'email' => $request->email,
            'password'=> $request->password
        ];
       
        if (Auth::guard('web')->attempt($account)) {
            return redirect()->route('admin.comics.index');
        } else {
            return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function register(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.users.login');
        }
        User::create([
            'email' => $request->phone,
            'password' => bcrypt($request->password)
        ]);
        if (Auth::guard('web')->attempt($account)) {
            return redirect()->route('admin.comics.index');
        } else {
            return redirect()->back()->with('message', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
}
