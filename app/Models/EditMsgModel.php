<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditMsgModel extends Model
{
    use HasFactory;
    protected $table = "message";
    protected $primaryKey = "commentNo";
    public static function findEditMsg($id){
        return self::where("memberId","=","$id")
    }
}
