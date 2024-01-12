@extends("layouts.index")
@section("memberCenter")

<div class="container">
    <div class="avatar">
        <img src="./img/avatar/{{Auth::user()->memAvatar}}" alt="avatar">
    </div>
    <div>姓名：{{Auth::user()->memName}}</div>
    <div>信箱：{{Auth::user()->memEmail}}</div>
    <button class="btn btn-outline-secondary showChangePsw" id="showChangePsw">更改密碼</button>
    <form action="memberCenter" method="post">
        @csrf
        @method("patch")
        <div class="changePsw hide" id="changeArea">
            <div class="form-group mt-3">
                <label for="oldPassword">舊密碼</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" autocompleted="off">
            </div>
            <div class="form-group mt-3">
                <label for="newPassword">新密碼</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" autocompleted="off">
            </div>
            <div class="form-group mt-3">
                <label for="passwordConfirm">確認密碼</label>
                <input type="password" class="form-control" id="passwordConfirm" name="newPassword_confirmation"
                autocompleted="off">
            </div>
            <button class="btn btn-primary" id="sendBtn">送出</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">取消</button>
        </div>
    </form>
</div>
@include("includes.errorNotice")
@endsection