<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $gets = $request->query();
        $lists = Message::list($gets);
        
        return view("pages/message/index", compact("lists","gets"));
    }
    public function store(Request $request)
    {
        $Message =new Message;
        $Message->memberId = 1;
        $Message->comment = $request->comment;
        $Message->save();
        return redirect("/message")->with("status","添加留言成功");
    }

    public function edit($commentNo)
    {
        $message = Message::showEditMsg($commentNo);
        return view("pages/message/edit", compact("message"));
    }

    public function update(Request $request,  $commentNo)
    {
        $message = Message::find($commentNo);
        $message->comment = $request->comment;
        $message->commentTime = Carbon::now();
        $message->update();
        return redirect("/message");
    }

    public function destroy($commentNo)
    {
        $message = Message::find($commentNo);
        $message->delete();
        return redirect()->back()->with("status","刪除留言成功");
    }
}
