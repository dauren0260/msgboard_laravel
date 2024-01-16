<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Member;
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
                "memEmail" => ["bail","required","email","unique:member"],
                "memPassword" => ["required","confirmed",Password::min(8)->mixedCase()->numbers()],
                "memPassword_confirmation" => ["required",Password::min(8)],
                "memName"=>["required"]
            ]
        )->validate();

        $registerInfo = $request->merge(["memPassword"=>Hash::make($request->memPassword)])->all();
        Member::create($registerInfo);
        return redirect("login")->with("status","註冊成功");
    }
}

