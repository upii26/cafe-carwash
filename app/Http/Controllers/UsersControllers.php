<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersControllers extends Controller
{
    public function index()
    {
        return view("users.index");
    }

    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (
            Auth::attempt([
                "name" => $request->username,
                "password" => $request->password,
            ])
        ) {
            $request->session()->regenerate();

            return redirect("/dashboard");
        }

        return back()->withErrors([
            "username" => "Username atau password salah.",
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
