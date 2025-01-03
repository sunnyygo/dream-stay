<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth; // Perbaikan di sini
use Illuminate\Http\Request;

class SesiController extends Controller
{
    function showRegistration() {
        return view('registration');
    }

    function submitRegistration(Request $request) {
        $admin = new User();
        $admin->name = $request->nama_admin;
        $admin->email = $request->email_admin;
        $admin->password = bcrypt($request->password_admin);
        $admin->save();
        return redirect()->route('login');
    }

    function showLogin(){   
        return view('login');
    }

    function submitLogin(Request $request){
        $request->validate([
            'email' => 'required|email', // Tambahkan validasi email
            'password' => 'required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // Jika login berhasil, redirect atau lakukan sesuatu
            return redirect()->intended('dashboard'); // Ganti 'dashboard' dengan rute yang sesuai
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return back()->with(
                'failed','Incorrect Email and Password.'
            );
        }
    }

    function dashboard(){
        return view('dashboard');
    }
}