<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $Message->memberId = Auth::id();
        $Message->comment = $request->comment;
        $Message->save();
        return redirect("/message")->with("status","添加留言成功");
    }

    public function edit($commentNo)
    {
        $message = Message::showEditMsg($commentNo);
        if(Auth::id()==$message->id){
            return view("pages/message/edit", compact("message"));
        }else{
            return redirect("/message")->with("status","僅能編輯自己的留言!");
        }
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
        if(Auth::id()==$message->id){
            $message->delete();
            return redirect()->back()->with("status","刪除留言成功");
        }else{
            return redirect()->back()->with("status","刪除失敗! 僅能刪除自己的留言");
        }
    }
}
