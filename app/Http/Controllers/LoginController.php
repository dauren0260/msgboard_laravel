<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        $entries = 'resources/js/pages/eyeIcon.js';
        $view = 'pages/login/index';
        $prod = 'eyeIcon.js';
        $model["entries"] = $entries;
        $model["prod"] = $prod;

        return view($view, $model);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('message');
        }

        return back()->withErrors(["login" => "帳號或密碼錯誤"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }
}