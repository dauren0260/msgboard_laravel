@extends("layouts/index")
@section("editContent")
 
<div class="title">留言版 - 編輯留言</div>    
<form action="/message/{{$message->commentNo}}" method="post" class="update">
    @csrf
    @method("PATCH")
    <div class="msgContainer">
        <div class="avatar commentAvatar">
            <img src="/img/avatar/{{$message->memAvatar}}" alt="avatar" />
            <div class="username">{{$message->memName}}</div>
        </div>
        <textarea name="comment" id="content" cols="80" rows="15">{{$message->comment}}</textarea>
    </div>
    <div class="actionArea"> 
        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">取消</a>
        <button type="submit" value="send" class="btn btn-outline-primary">送出</button>
    </div>
</form>
    
@endsection