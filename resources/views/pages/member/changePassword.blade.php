@extends("layouts.index")
@section("title","會員中心 | 修改密碼")
@section("memberCenter")
<form action="changePassword" method="post" class="container">
    @csrf
    @method("PATCH")
    <div>
        <div class="form-group mt-3">
            <label for="oldPassword">舊密碼</label>
            <input type="password" class="form-control" id="oldPassword" name="oldPassword" autocompleted="off"><i class="bi bi-eye"></i>
        </div>
        <div class="form-group mt-3">
            <label for="newPassword">新密碼</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" autocompleted="off"><i class="bi bi-eye"></i>
        </div>
        <div class="form-group mt-3">
            <label for="passwordConfirm">確認密碼</label>
            <input type="password" class="form-control" id="passwordConfirm" name="newPassword_confirmation" autocompleted="off"><i class="bi bi-eye"></i>
        </div>
        <button class="btn btn-primary" id="sendBtn">送出</button>
        <a href="/memberCenter" class="btn btn-secondary">取消</a>
    </div>
</form>
@include("includes.noticeToast")

@push("password")
    @vite(["resources/js/eyeIcon.js"])
@endpush

@endsection

