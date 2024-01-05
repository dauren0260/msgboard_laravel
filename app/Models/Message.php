<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Message extends Model
{
    use HasFactory;
    protected $table = "message";
    protected $primaryKey = "commentNo";
    public $timestamps = false;
    
    public static function list($gets){        
        $messageList = DB::table("message as g")
        ->join("member as m", "g.memberId","=","m.id")
        ->select("m.id","m.memName","m.memAvatar","g.commentNo","g.comment","g.commentTime");

        if(isset($gets["author"]) && ($gets["author"] != ''))
        {
            $messageList->where("m.memName","like","%{$gets['author']}%");
        }
        if(isset($gets["content"]) && ($gets["content"] != ''))
        {
            $messageList->where("g.comment","like","%{$gets['content']}%");
        }
        if(isset($gets["startDate"]) && ($gets["startDate"] != ''))
        {
            $messageList->whereDate("g.commentTime",">=","{$gets['startDate']}");
        }
        if(isset($gets["endDate"]) && ($gets["endDate"] != ''))
        {
            $messageList->whereDate("g.commentTime","<=","{$gets['endDate']}");
        }

        $list = $messageList->orderBy("g.commentTime","desc")->paginate(5);

        return $list;
    }
    public static function showEditMsg($commentNo)
    {
        $message = DB::table("message as g")
        ->join("member as m", "g.memberId","=","m.id")
        ->select("m.id","m.memName","m.memAvatar","g.commentNo","g.comment","g.commentTime")
        ->where("g.commentNo","=", $commentNo)
        ->first();

        return $message;
    }

}
