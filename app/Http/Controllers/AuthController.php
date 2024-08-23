<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->get()->toArray();
            if ($user[0]['roles'] == 1) {
                $request->session()->regenerate();
                return redirect()->intended('booking');
            }
        } else {
            return redirect()->back()->withErrors('Please Enter Correct Email & Password');
        }
    }

    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

}
