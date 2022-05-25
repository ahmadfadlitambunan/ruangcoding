<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_phone' => ['required:dns', 'string', 'min:12', 'max:255', 'unique:users'],
            'gender' => ['required'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // Cara Pertama untuk menapilkan pesan sudah login

        // $request->session()->flash('success', 'Registration Successfull! Please Login');



        // Cara Kedua untuk menampilkan pesan sudah login

        return redirect('/login')->with('success', 'Registration Successfull! Please Login');
    }
}
