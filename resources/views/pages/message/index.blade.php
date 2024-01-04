
    @extends("layouts.index")
    @section("messageContent")
    <form action="message" class="searchArea" method="get">
        <div>搜尋留言</div>
        作者：<input type="text" name="author" class="searchInput" value="{{$gets['author']??''}}">
        留言：<input type="text" name="content" id="content" class="searchInput" value="{{$gets['content']??''}}">
        <div>
            <span>起始日期：<input type="date" name="startDate" value="{{$gets['startDate']??''}}"></span>
            <span>結束日期：<input type="date" name="endDate"  value="{{$gets['endDate']??''}}" id="endDate"></span>
        </div>
        <button class="btn btnSecondary">搜索</button>
    </form>
    <script>
        
    </script>
   
    @forelse($lists as $list)

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
                {!! nl2br(e($list->comment)) !!}
            </div>
        </div>
        <div class="actionArea">
            <div class="edit">
                <a href="/message/{{$list->commentNo}}/edit"
                    class="btn btn-secondary" role="button">編輯</a>
            </div>
            <form action="/message/{{$list->commentNo}}" method="post" class="delete">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-outline-warning delBtn">刪除</button>
            </form>
        </div>
    </div>
    @empty
    <div>
        Ooops...沒有符合的筆數
    </div>
    @endforelse

    {{$lists->withQueryString()->links()}}

    <form action="message/store" method="post" class="insert">
        @csrf
        <div class="msgContainer">
            <div class="avatar commentAvatar">
                <img src="./img/avatar/dorami.png" alt="avatar">
                <div class="username">哆啦美</div>
            </div>
            <div class="textArea">
                <textarea name="content" id="content" required></textarea>
                <button type="submit" value="send" class="btn btn-outline-primary">送出</button>
            </div>
        </div>
    </form>
@endsection