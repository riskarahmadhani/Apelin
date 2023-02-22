<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\LogActivity;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'logout']);
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cred = $request->validate([
            'username'=>'required|exists:users',
            'password'=>'required'
        ]);

        if (Auth::attempt($cred, $request->remember)) {
            LogActivity::add('berhasil Login');
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }

    public function logout()
    {
        LogActivity::add('berhasil Logout');
        Auth::logout();
        return redirect()->route('login');
    }
}
