@extends("layouts/index")
@section("title","留言版 | 編輯留言")
@section("content")

<div class="editSection">
<div class="title">留言版 - 編輯留言</div>    
<form action="/message/{{$message->commentNo}}" method="post" class="update">
    @csrf
    @method("PATCH")
    <div class="msgContainer">
        <div class="avatar commentAvatar">
            <img src="{{asset('storage/img/avatar/'.$message->memAvatar)}}" alt="avatar" />
            <div class="username">{{$message->memName}}</div>
        </div>
        <textarea name="comment" id="content">{{$message->comment}}</textarea>
    </div>
    <div class="actionArea"> 
        <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">取消</a>
        <button type="submit" class="btn btn-outline-primary">送出</button>
    </div>
</form>
</div>
@endsection