<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewRegister()
    {
        return view('user.register', [
            'title' => 'Register Page'
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:4|max:15',
            'email' => 'required|email:dns',
            'password' => 'required|min:6|max:25',
        ]);

        // buat hash untuk password 
        $validatedData['password'] = Hash::make($request->input('password'));

        // insert data user ke database
        User::create($validatedData);

        // jika berhasil redirect ke login
        return redirect()->route('login');
    }


    public function viewLogin()
    {
        return view('user.login', [
            'title' => 'Login Page'
        ]);
    }

    public function login(Request $request)
    {
        // validasi user
        $credentials = $request->validate([
            'username' => 'required|min:4|max:15',
            'password' => 'required|min:6|max:25',
        ]);

        // autentikasi pengguna
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // jika lolos autentikasi maka simpan session user ke database
            $request->session()->put('user_id', Auth::user()->id);

            // redirect ke home
            return redirect()->intended('/');
        }

        return view('user.login', [
            'title' => 'Login Page',
            'error' => 'Username atau Password salah'
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->forget('user_id');

        return redirect()->route('login');
    }
}