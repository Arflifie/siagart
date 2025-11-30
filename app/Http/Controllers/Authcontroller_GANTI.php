<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function login(Request $request){
    $request->validate([
        'email' => 'required|email|max:40',
        'password' => 'required|max:20', // Spasi setelah titik dua dihapus agar standar
    ],[
        // PERBAIKAN: Ubah pesan error email
        'email.required' => 'Harap masukkan email', 
        'email.email' => 'Email tidak valid',
        'email.max' => 'Email terlalu panjang, maksimal 40 karakter',

        'password.required' => 'Harap masukkan password',
        'password.max' => 'Password terlalu panjang, maksimal 20 karakter',
    ]);

    if(Auth::attempt($request->only('email', 'password'), $request->has('remember'))){
        // PERBAIKAN: Gunakan route name yang sesuai dengan web.php
        return redirect()->route('admin.dashboard'); 
    }

    return back()->with('failed', 'Email dan password salah');
}

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:225',
            'phone' => 'required|numeric|digits_between:10,14',
            'email' => 'required|email|max:40|unique:users',
            'password' => 'required|confirmed|min:8|max:20',
        ]);
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        return redirect('/login');
    }
    public function messages(){
        return [
            'password.confirmed' => 'Konfirmasi Password tidak cocok',
        ];
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
