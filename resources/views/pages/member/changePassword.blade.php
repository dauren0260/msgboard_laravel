@extends("layouts.index")
@section("memberCenter")
<form action="changePassword" method="post" class="container">
    @csrf
    @method("PATCH")
    <div>
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
            <input type="password" class="form-control" id="passwordConfirm" name="newPassword_confirmation" autocompleted="off">
        </div>
        <button class="btn btn-primary" id="sendBtn">送出</button>
        <a href="/memberCenter" class="btn btn-secondary">取消</a>
    </div>
</form>
@include("includes.noticeToast")
@endsection

