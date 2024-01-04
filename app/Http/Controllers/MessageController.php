<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageModel;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $gets = $request->query();
        $lists = MessageModel::list($gets);
        
        return view("pages/message/index", compact("lists","gets"));
    }

    public function edit($commentNo)
    {
        $message = MessageModel::edit($commentNo);
        return view("pages/message/edit", compact("message"));
    }

    public function update(Request $request,  $commentNo)
    {
        $message = MessageModel::find($commentNo);
        $message->comment = $request->content;
        $message->commentTime = Carbon::now();
        $message->update();
        return redirect("/message");
    }

    public function store(Request $request)
    {
        $messageModel =new MessageModel;
        $messageModel->memberId = 1;
        $messageModel->comment = $request->content;
        $messageModel->save();
        $messageModel->refresh();
        return redirect("/message")->with("status","msg:添加成功");
    }

    public function destroy($commentNo)
    {
        $message = MessageModel::find($commentNo);
        $message->delete();
        return redirect()->back()->with("status","msg:刪除成功");
    }
}
