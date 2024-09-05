<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignupController extends Controller{

    public function create()
    {
        return view("pages/login/signup");
    }
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                "email" => ["bail","required","email","unique:user"],
                "password" => ["required","confirmed",Password::min(8)->mixedCase()->numbers()],
                "password_confirmation" => ["required",Password::min(8)],
                "name"=> ["required"]
            ]
        )->validate();

        $registerInfo = $request->merge(["password"=>Hash::make($request->password)])->all();
        User::create($registerInfo);
        return redirect("login")->with("status","註冊成功");
    }
}