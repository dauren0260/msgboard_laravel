<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function index(Request $request)
    {
        $view = "pages/message/index";
        $model = array();
        $query = $request->query();
        $list = Message::list($query);
        $model["list"] = $list;
        $model["query"] = $query;
        
        return view($view, $model);
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
        $view = "pages/message/edit";
        $model = array();
        $message = Message::showEditMsg($commentNo);
        $model["message"] = $message;
        
        if( !is_null($message) && ( Auth::id() == $message->id )){ 
                return view($view, $model);
        }else{
            return redirect("/message")->with("status","僅能編輯自己的留言!");
        }
    }

    public function update(Request $request,  $commentNo)
    {
            $message = Message::find($commentNo);
            $message->comment = $request->comment;
            $message->update();
            return redirect("/message");
    }

    public function destroy($commentNo)
    {
        $message = Message::find($commentNo);
        if( !is_null($message) &&  ( Auth::id() == $message->memberId )){
            $message->delete();
            return redirect()->back()->with("status","刪除留言成功");
        }else{
            return redirect()->back()->with("status","刪除失敗! 僅能刪除自己的留言");
        }
    }
}