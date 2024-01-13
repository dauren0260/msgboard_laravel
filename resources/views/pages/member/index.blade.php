@extends("layouts.index")
@section("memberCenter")

<div class="container">
    <div class="avatar">
        <img src="./img/avatar/{{Auth::user()->memAvatar}}" alt="avatar">
    </div>
    <div>姓名：{{Auth::user()->memName}}</div>
    <div>信箱：{{Auth::user()->memEmail}}</div>
    <a class="btn btn-outline-secondary" href="/changePassword">更改密碼</a>
    
</div>
@include("includes.noticeToast")
@endsection