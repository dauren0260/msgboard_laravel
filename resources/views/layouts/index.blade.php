<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self';" />
    {{-- @vite(['resources/sass/app.scss','resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{asset('build/css/app.css')}}">
    {{-- <script src="{{asset('build/js/eyeIcon.js')}}"></script>  --}}
   
    <title>@yield("title","留言版")</title>
    {{-- @vite($entries) --}}

    @if(isset($prod))
    <script nonce="{{ Vite::cspNonce() }}" type="module" src="{{asset('build/js/' . $prod)}}" ></script> 
    @endif
</head>
<body>
    @include("includes.header")

    <div>
        @yield("content")
    </div>

    {{-- @stack("main") --}}
</body>
</html>