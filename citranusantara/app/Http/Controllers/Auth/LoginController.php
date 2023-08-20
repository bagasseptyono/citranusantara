<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_or_email' => 'required',
            'password' => 'required'
        ], [
            'username_or_email.required' => 'Username atau email harus di isi',
            'password.required' => 'Password harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $this->getCredentials($request->input('username_or_email'), $request->input('password'));

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login Berhasil');
        } else {
            return redirect('/login')
                ->withErrors([
                    'message' => 'Username atau password salah',
                ])
                ->withInput();
        }
        // Validation logic here
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->intended('dashboard'); // Redirect to the intended URL after login
        // }

        // // Handle failed login here

        // return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }
    private function getCredentials($usernameOrEmail, $password)
    {
        $field = filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $usernameOrEmail,
            'password' => $password
        ];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda Telah Logout');
    }
}
