@extends("layouts.index")
@section("memberCenter")

<div class="container">
    <div class="avatar">
        <img src="./img/avatar/{{Auth::user()->memAvatar}}" alt="avatar">
    </div>
    <div>姓名：{{Auth::user()->memName}}</div>
    <div>信箱：{{Auth::user()->memEmail}}</div>
    <button class="btn btn-outline-secondary showChangePsw" id="showChangePsw">更改密碼</button>
    <form action="" method="post">
        @csrf
        @method("patch")
        <div class="changePsw hide" id="changeArea">
            請輸入舊密碼：<input type="password" name="oldPsw" id="oldPsw" required minlength="4" autocomplete="off"><br />
            請輸入新密碼：<input type="password" name="newPsw" id="newPsw" required minlength="4" autocomplete="off">
            <button class="btn btn-primary" id="sendBtn">送出</button>
            <button class="btn btn-secondary" id="cancelBtn">取消</button>
        </div>
    </form>
</div>
@endsection