
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
        <button class="btn btn-outline-secondary">搜索</button>
    </form>
    <script>
        
    </script>
   
    @forelse($lists as $list)

    <div class="container-sm d-flex justify-content-md-around mb-3 pb-3 align-items-center border-bottom border-secondary-subtle">
        <div class="me-auto" id="contentArea{{$list->commentNo}}">
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
            <div class="edit mb-3">
                <a href="/message/{{$list->commentNo}}/edit/{{$gets['page']??''}}"
                    class="btn btn-outline-primary" role="button">編輯</a>
            </div>
            <form action="/message/{{$list->commentNo}}" method="post" class="delete">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-outline-danger delBtn">刪除</button>
            </form>
        </div>
    </div>
    @empty
    <div class="container-sm">
        
        <p class="fs-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-heartbreak" viewBox="0 0 16 16">
                <path d="M8.867 14.41c13.308-9.322 4.79-16.563.064-13.824L7 3l1.5 4-2 3L8 15a38 38 0 0 0 .867-.59m-.303-1.01-.971-3.237 1.74-2.608a1 1 0 0 0 .103-.906l-1.3-3.468 1.45-1.813c1.861-.948 4.446.002 5.197 2.11.691 1.94-.055 5.521-6.219 9.922m-1.25 1.137a36 36 0 0 1-1.522-1.116C-5.077 4.97 1.842-1.472 6.454.293c.314.12.618.279.904.477L5.5 3 7 7l-1.5 3zm-2.3-3.06-.442-1.106a1 1 0 0 1 .034-.818l1.305-2.61L4.564 3.35a1 1 0 0 1 .168-.991l1.032-1.24c-1.688-.449-3.7.398-4.456 2.128-.711 1.627-.413 4.55 3.706 8.229Z"/>
            </svg>
            Ooops...沒有符合的筆數
        </p>
    </div>
    @endforelse

    {{$lists->withQueryString()->links()}}

    <form action="message/store" method="post" class="insert">
        @csrf
        <div class="msgContainer">
            <div class="flex-shrink-1 avatar commentAvatar">
                <img src="./img/avatar/dorami.png" alt="avatar">
                <div class="username">哆啦美</div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="content" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">留言</label>
                <button type="submit" value="send" class="btn btn-outline-primary">送出</button>
            </div>
        </div>
    </form>
@endsection