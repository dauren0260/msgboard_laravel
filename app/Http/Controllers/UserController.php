<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view("pages/member/index");
    }

    public function update(Request $request)
    {
        $auth = Auth::user();

        $request->validate([
            "avatar" => ["required", "mimes:jpeg,jpg,png", "max:2048"]
        ]);
        $extension = $request->file('avatar')->extension();

        // 照片格式不同，且不是預設照片，才刪除照片
        if (!Str::contains($auth->avatar, $extension) && ($auth->avatar != "memDefault.png")) {
            $this->destroy();
        }

        $filename = "avatar" . $auth->id . "." . $extension;
        $request->avatar->storeAs("/img/avatar/", $filename);
        $member = User::find($auth->id);
        $member->avatar = $filename;
        $member->save();

        return redirect("/user")->with("status", "上傳成功!");
    }

    public function destroy()
    {
        $auth = Auth::user();
        Storage::delete("img/avatar/" . $auth->avatar);
    }

    public function changePassword()
    {
        return view("pages/member/changePassword");
    }

    public function changePasswordUpdate(Request $request)
    {
        $auth = Auth::user();
        if (!Hash::check($request->input("oldPassword"), $auth->memPassword)) {
            return back()->withErrors(["password" => "輸入密碼錯誤"]);
        }

        Validator::make(
            $request->all(),
            [
                "oldPassword" => ["required", Password::min(8)],
                "newPassword" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()],
                "newPassword_confirmation" => ["required", Password::min(8)],
            ]
        )->validate();



        if ($request->input("oldPassword") == $request->input("newPassword")) {
            return back()->withErrors(["password" => "新密碼不可以舊密碼一致"]);
        }

        $user = User::find($auth->id);
        $user->password = Hash::make($request->input("newPassword"));
        $user->update();
        return redirect("/memberCenter")->with("status", "修改密碼成功!");
    }
}
