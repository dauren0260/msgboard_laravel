<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageModel;
use App\Models\EditMsgModel;

class MessageController extends Controller
{
    public function index()
    {
        $lists = MessageModel::list();
        
        return view("message/index", compact("lists"));
    }

    public function edit($id)
    {
        $message = EditMsgModel::find($id);
        return view("message/edit", compact("message"));
    }
}
