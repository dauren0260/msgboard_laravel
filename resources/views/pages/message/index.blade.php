
    @extends("layouts.index")
    @section("messageContent")

    @guest
    <div class="card">
        <div class="card-body">
            <i class="bi bi-door-open"></i>
            登入以查看留言版
        </div>
    </div>
    @endguest
    @auth
    @if (\Session::has("status"))
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <strong class="me-auto">訊息通知</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {!! \Session::get("status") !!}
            </div>
        </div>
    </div>
    @endif
    <form action="/message" class="searchArea" method="get">
        <div>搜尋留言</div>
        作者：<input type="text" name="author" class="searchInput" value="{{$gets['author']??''}}">
        留言：<input type="text" name="content" id="content" class="searchInput" value="{{$gets['content']??''}}">
        <div>
            <span>起始日期：<input type="date" name="startDate" value="{{$gets['startDate']??''}}"></span>
            <span>結束日期：<input type="date" name="endDate"  value="{{$gets['endDate']??''}}" id="endDate"></span>
        </div>
        <button class="btn btn-outline-secondary">搜索</button>
    </form>

   
    @forelse($lists as $list)
    <div class="container-sm d-flex justify-content-md-around mb-3 pb-3 align-items-center border-bottom border-secondary-subtle">
        <div class="me-auto">
            <div class="avatar">
                <img src="{{asset('img/avatar/'.$list->memAvatar)}}" alt="avatar">
            </div>
            <div class="memContent">
                <div class="memberName">{{$list->memName}}</div>
                <div class="commentTime">{{$list->commentTime}}</div>
            </div>
            <div class="msgContent showContent">
                {!! nl2br(e($list->comment)) !!}
            </div>
        </div>
        @if(Auth::user()->id == $list->id)
        <div class="actionArea">
            <div class="edit mb-3">
                <a href="/message/{{$list->commentNo}}/edit"
                    class="btn btn-outline-primary" role="button">編輯</a>
            </div>
            <form action="/message/{{$list->commentNo}}" method="post" class="delete">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-outline-danger delBtn">刪除</button>
            </form>
        </div>
        @endif
    </div>
    @empty
    
    <div class="card">
        <div class="card-body">
            <i class="bi bi-question-diamond"></i>
            Ooops..沒有符合的筆數
        </div>
    </div>
    @endforelse

    {{$lists->withQueryString()->links()}}

    <form action="/message" method="post" class="insert">
        @csrf
        <div class="msgContainer">
            <div class="flex-shrink-1 avatar commentAvatar">
                <img src="./img/avatar/{{Auth::user()->memAvatar}}" alt="avatar">
                <div class="username">{{Auth::user()->memName}}</div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="comment" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">留言</label>
                <button type="submit" value="send" class="btn btn-outline-primary">送出</button>
            </div>
        </div>
    </form>
    @endauth
@endsection