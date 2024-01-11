<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view("pages/member/index");
    }

    public function update(Request $request)
    {
        return "member controller update";
    }
}
