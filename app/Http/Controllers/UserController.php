<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    { 
        $user = User::latest()->paginate(5);
  
        return view('admin.user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'Delete user successfully');
    }
}
