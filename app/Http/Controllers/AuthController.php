<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    
    public function register(RegisterRequest $request)
    {

        $user = User::create( $request->validated());
        $user->role_id = Role::where('name', 'user')->first()->id;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        session()->flash('success', 'you have registered');
        return redirect(url('/'));

    }

    
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:5|max:30'
        ]);
        $isLogin = Auth::attempt(["email" => $request->email, "password" => $request->password]);
        if (!$isLogin) {
            session()->flash('error', 'Invalid email or password');
            return back();
        }
        session()->flash('success', 'you have logged in successfully');
        $user = Auth::user();
        $userRole = $user->role;

        // dd($userRole->name == 'user');
        if ($userRole->name == 'user') {
            return redirect(url('/'));
        }
        return redirect(url('admin'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/login'));
    }
}
