<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

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
       
        // 另外一種寫法
        // $user = Member::where("memEmail","=",$request->memEmail)->first();
        // if($user && Hash::check($request->memPassword, $user->memPassword)){
        //     Auth::login($user);
        //     if(Auth::check()){
        //         return "Success Login";
        //     }else{
        //         return "Not log in";
        //     }
        // }else{
        //     return "Errorrrr";
        // }
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