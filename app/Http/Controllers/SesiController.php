<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            if(Auth::user()->role == 'superadmin'){
                return redirect('dashboard/admin');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('dashboard/admin');
            } 
        } else {
            return back()->with(
                'failed','Incorrect Email and Password.'
            );
        }
    }

    

    function dashboardAdmin(){
        return view('dashboard-admin'); 
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }

    function logoutAdmin(){
        Auth::logout();
        return redirect('login');
    }
    
}