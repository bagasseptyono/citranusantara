<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation logic here 
        $validated = $request->validate([
            'name'=>'required',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string',
            'role'=> 'required'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // Authentication logic here

        return redirect('/login')->with('success','Registrasi Berhasil, Silahkan Login');
    }
}
