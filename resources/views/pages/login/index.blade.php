@extends("layouts/index")
@section("loginIndex")


<div class="title">會員登入</div>

<form action="/login" method="post" id="loginForm" class="col-md-4 mb-5">
  @csrf
  <div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="memEmail" placeholder="輸入信箱">
  </div>
  <div class="form-group mt-3">
    <label for="password">密碼</label>
    <input type="password" class="form-control" id="password" name="memPassword" placeholder="輸入密碼">
  </div>
  <div class="mt-3">
    <button type="submit" class="btn btn-primary">送出</button>
    <a href="/signup" class="btn btn-outline-danger">註冊</a>
  </div>
</form>
@include("includes.noticeToast")
    
@endsection