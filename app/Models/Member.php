<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "member";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ["memEmail","memPassword","memName"];
    protected $hidden = ['memPassword'];
    protected $casts = ['memPassword' => 'hashed'];

    public function getAuthPassword() {
        return $this->memPassword;
    }
    // public static function checkLogin($post)
    // {
    //     try{

    //         $member = DB::table("member")
    //         ->where("memEmail",$post["memEmail"])
    //         ->where("memPassword",Hash::make($post["memPassword"]))
    //         ->first();

    //         return $member;
            
    //     }catch(\Exception $e){
    //         return redirect("/login")->with("status","系統發生錯誤，請稍後再試");
    //     }
    // }
}
