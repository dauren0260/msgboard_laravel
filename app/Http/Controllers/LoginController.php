<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
class LoginController extends Controller{

    public function index()
    {
        return view("pages/login/index");
    }
    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            "memEmail" => ["required","email"],
            "memPassword" => ["required"]
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('message');
        }
        else{
            return back()->withErrors(["login"=>"帳號或密碼錯誤"]);
        }
       
    }

}

?>