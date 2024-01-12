<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function index()
    {
        return view("pages/login/index");
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            "memEmail" => ["required","email"],
            "memPassword" => ["required"]
        ]);
        
        if($credentials){
            $arr = array("memEmail"=> $request->memEmail, "password" => $request->memPassword);
            
            if(Auth::attempt($arr,false)){
                $request->session()->regenerate();
                return redirect()->intended('message');
            }
        }

        return back()->withErrors(["login"=>"帳號或密碼錯誤"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }
}
?>