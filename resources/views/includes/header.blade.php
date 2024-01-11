<div class="logo">
    <a href="/message">
        <img class="logoImg" src="/img/logo.jpg" alt="logo">
    </a>
    @auth
    <div class="infoArea">
        <a href="/memberCenter">Hello, {{Auth::user()->memName}}</a>
        <a href="/logout" class="btn btn-outline-secondary">登出</a>
    </div>
    @else
    <div class="guider">
        <a href="/login" class="btn btn-outline-primary">登入</a>
        <a href="/signup" class="btn btn-outline-danger">註冊</a>
    </div>
    @endauth
</div>