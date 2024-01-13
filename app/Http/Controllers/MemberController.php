<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        return view("pages/member/index");
    }

    public function changePassword()
    {
        return view("pages/member/changePassword");
    }

    public function changePasswordUpdate(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                "oldPassword" => ["required",Password::min(8)],
                "newPassword" => ["required","confirmed",Password::min(8)->mixedCase()->numbers()],
                "newPassword_confirmation" => ["required",Password::min(8)],
            ]
        )->validate();

        $auth = Auth::user();
        if(!Hash::check($request->input("oldPassword"), $auth->memPassword))
        {
            return withErrors(["password"=>"輸入密碼錯誤"]);
        }

        if($request->input("oldPassword")==$request->input("newPassword"))
        {
            return withErrors(["password"=>"新密碼不可以舊密碼一致"]);
        }

        if($request->input("newPassword")==$request->input("newPassword_confirmation"))
        {
            $user = Member::find($auth->id);
            $user->memPassword = Hash::make($request->input("newPassword"));
            $user->update();
            return redirect("/memberCenter")->with("status","修改密碼成功!");
        }
    }
}