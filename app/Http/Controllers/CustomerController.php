<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('website.login.index');
        }
        $account = [
            'email' => $request->email,
            'password'=> $request->password
        ];
       
        if (Auth::guard('web')->attempt($account)) {
            if (Auth::guard('web')->user()->position == 'user'){
                return redirect()->route('home');
            }
            return redirect()->back()->with('message', 'Incorrect account or password');
        } else {
            return redirect()->back()->with('message', 'Incorrect account or password');
        }
    }

    public function register(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('website.register.index');
        }
        if(User::where('email', '=', $request->email)->first()){
            return redirect()->back()->with('message', 'The account already exists in the system');
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        return redirect()->route('login')->with('message', 'Register successful, please login');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function general(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('website.profile.general');
        }
    }

    public function profile(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('website.profile.profile');
        }
        $update_profile = [
            'name' => $request->name,
        ];
        if($request->avatar){
            $file = $request->avatar;
            $fileName = $file->getClientOriginalName();
            $pathName =  STR::random(5).'-'.date('his').'-'.STR::random(3).'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/customers/', $pathName);
            $update_profile['avatar'] = $pathName;
        }
        User::where('id', Auth::guard('web')->user()->id)->update($update_profile);
        return redirect()->back()->with('message', 'You update information successfully');
    }

    public function comic_follow(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('website.profile.follow');
        }
    }

    public function change_password(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('website.profile.change_password');
        }
        $customer = User::findOrFail(Auth::guard('web')->user()->id);
        if (Hash::check($request->old_password, $customer->password)){
            if($request->old_password == $request->new_password){
                return redirect()->back()->with('message', 'New password must be different from old password');
            }
            else if($request->new_password != $request->confirm_password){
                return redirect()->back()->with('message', 'New password must be the same as confirm password');
            }
            else {
                $update_password = [
                    'password' => bcrypt($request->new_password),
                ];
                User::where('id', Auth::guard('web')->user()->id)->update($update_password);
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('message', 'Your password had been changed, please re-login');
            }
        }
        else{
            return redirect()->back()->with('message', 'Old password is wrong');
        }
    }
}


