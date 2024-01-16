<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <!-- <link rel="stylesheet" href="{{asset('build/app3.css')}}"> -->
    <!-- <script src="{{asset('build/app2.js')}}"></script> -->
    <title>@yield("title","留言版")</title>
</head>
<body>
    @include("includes.header")

    <div>
        @yield("loginIndex")
    </div>
    <div>
        @yield("signupIndex")
    </div>
    <div>
        @yield("messageContent")
    </div>
    <div class="editSection">
        @yield("editContent")
    </div>
    <div class="memberCenter">
        @yield("memberCenter")
    </div>

    @stack("password")
    @stack("preview")
</body>
</html>