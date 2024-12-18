<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function login_proses(Request $request)
    {
        // dd($request->all())
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (auth::attempt($data)) {
            return redirect()->route('article.index');
        } else {
            return redirect()->route('login');
        } 
    }
    
    public function register()
    {
        return view('auth.register');
    }
    
    public function register_proses(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:8'
        ], [
            'name.required'     => 'username must be filled in',
            'email.required'    => 'email must be filled in',
            'password.required' => 'password must be filled in'
        ]);

        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
        ];

        $user = User::create($data);
        
        return redirect()->route('login');
    }

    public function logout()
    {
        auth::logout();
        return redirect()->route('login');
    }
}
