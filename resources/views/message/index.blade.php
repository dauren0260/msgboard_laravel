<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/message.css')}}" type="text/css">
    <title>Document</title>
</head>

<body>
    @foreach($lists as $list)

    <div class="container">
        <div class="contentArea" id="contentArea{{$list->commentNo}}">
            <div class="avatar">
                <img src="{{asset('img/avatar/'.$list->memAvatar)}}" alt="avatar">
            </div>
            <div class="memContent">
                <div class="memberName">{{$list->memName}}</div>
                <div class="commentTime">{{$list->commentTime}}</div>
            </div>
            <div class="msgContent showContent" id="msgContent{{$list->commentNo}}">
                {{$list->comment}}
            </div>
        </div>
        <div class="actionArea">

            <div class="edit">
                <a href="update.php?page='.$pageNumber.'&commentNo={{$list->commentNo}}"
                    class="btn btnSecondary">編輯</a>
            </div>
            <div class="delete">
                <a href="javascript:void(0)" class="btn btnWarning delBtn">刪除</a>
            </div>
            <input type="hidden" name="commentNo{{$list->commentNo}}" value="{{$list->commentNo}}" class="hiddenInput">
        </div>
    </div>
    @endforeach

    <form action="api/insert.php" method="post" class="insert">
        <div class="msgContainer">
            <div class="avatar commentAvatar">
                <img src="./img/avatar/dorami.png" alt="avatar">
                <div class="username">哆啦美</div>
            </div>
            <div class="textArea">
                <textarea name="content" id="content" required></textarea>
                <button type="submit" value="send" class="btn btnPrimary">送出</button>
            </div>
        </div>
    </form>
</body>

</html>