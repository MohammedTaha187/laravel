<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
           'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        Auth::login($user);
        return redirect(url('/login'));
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:20',
            
        ]);
        
        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (! $isLogin) {
            $request->session()->flash('error-message', 'Data not correct');
            return back();
        }
        return redirect(url('/cats'));
    }
    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }

    

    


}
