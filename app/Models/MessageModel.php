<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory;
    protected $table = "message as g";
    protected $primaryKey = "commentNo";
    public static function list(){
        $messageList = self::join("member as m","g.memberId","=","m.id")
            ->select("m.id","m.memName","m.memAvatar","g.commentNo","g.comment","g.commentTime")
            ->get();
        return $messageList;
    }
}
