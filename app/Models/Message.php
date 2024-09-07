<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Message extends Model
{
    use HasFactory;
    protected $table = "message";

    public static function list($query)
    {
        $messageList = DB::table("message as g")
            ->select("m.id", "m.name", "m.avatar", "g.id as message_id", "g.user_id", "g.comment", "g.updated_at")
            ->join("user as m", "g.user_id", "=", "m.id");

        if (isset($query["author"]) && ($query["author"] != "")) {
            $messageList->where("m.name", "like", "%{$query['author']}%");
        }
        if (isset($query["content"]) && ($query["content"] != "")) {
            $messageList->where("g.comment", "like", "%{$query['content']}%");
        }
        if (isset($query["startDate"]) && ($query["startDate"] != "")) {
            $messageList->whereDate("g.updated_at", ">=", "{$query['startDate']}");
        }
        if (isset($query["endDate"]) && ($query["endDate"] != "")) {
            $messageList->whereDate("g.updated_at", "<=", "{$query['endDate']}");
        }

        $list = $messageList->orderBy("g.updated_at", "desc")->paginate(5);

        return $list;
    }
    public static function showEditMsg($id)
    {
        $message = DB::table("message as g")
            ->select("m.id", "m.name", "m.avatar", "g.id as message_id", "g.user_id", "g.comment", "g.updated_at")
            ->join("user as m", "g.user_id", "=", "m.id")
            ->where("g.id", "=", $id)
            ->first();

        return $message;
    }
}
