<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class MessageModel extends Model
{
    use HasFactory;
    protected $table = "message";
    protected $primaryKey = "commentNo";
    public $timestamps = false;
    protected $fillable = ['comment','commentTime'];
    public static function list($gets){        
        $messageList = self::from("message as g")
        ->join("member as m", "g.memberId","=","m.id")
        ->select("m.id","m.memName","m.memAvatar","g.commentNo","g.comment","g.commentTime");

        if(isset($gets["author"]) and ($gets["author"] != ''))
        {
            $messageList->where("m.memName","like","%{$gets['author']}%");
        }

        if(isset($gets["content"]) and ($gets["content"] != ''))
        {
            $messageList->where("g.comment","like","%{$gets['content']}%");
        }
        if(isset($gets["startDate"]) and ($gets["startDate"] != ''))
        {
            $messageList->whereDate("g.commentTime",">=","{$gets['startDate']}");
        }
        if(isset($gets["endDate"]) and ($gets["endDate"] != ''))
        {
            $messageList->whereDate("g.commentTime","<=","{$gets['endDate']}");
        }

        $list = $messageList->orderBy("g.commentTime","desc")->paginate(5);

        return $list;
    }
    public static function edit($commentNo)
    {
        $message = self::from("message as g")
        ->join("member as m", "g.memberId","=","m.id")
        ->select("m.id","m.memName","m.memAvatar","g.commentNo","g.comment","g.commentTime")
        ->where("g.commentNo","=", $commentNo)
        ->first();

        return $message;
    }
    public static function createMsg($post): void
    {
        self::create($post);
    }
}
