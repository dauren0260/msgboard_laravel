<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <title>留言版</title>
</head>
<body>
    @include("includes.header")

    <div>
        @yield("messageContent")
    </div>
    <div>
        @yield("editContent")
    </div>
</body>
</html>