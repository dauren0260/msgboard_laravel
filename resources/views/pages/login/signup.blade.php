@extends("layouts/index")
@section("signupIndex")

<div class="title">會員註冊</div>

@include("includes.noticeToast")

<form action="/signup" method="post" id="signupForm" class="col-md-4">
    @csrf
  <div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="memEmail" placeholder="輸入email">
  </div>
  <div class="form-group mt-3">
    <label for="password">密碼</label>
    <input type="password" class="form-control" id="password" name="memPassword" placeholder="Password">
  </div>

  <div class="form-group mt-3">
    <label for="password">確認密碼</label>
    <input type="password" class="form-control" id="passwordConfirm" name="memPassword_confirmation" placeholder="Password">
  </div>
  <div class="form-group mt-3">
    <label for="memberName">名字</label>
    <input type="text" class="form-control" id="memberName"  name="memName" placeholder="Password">
  </div>
  <div class="mt-3">
      <button type="submit" class="btn btn-primary">送出</button>
      <a href="/login" class="btn btn-outline-secondary">返回登入</a>
  </div>
</form>
@endsection