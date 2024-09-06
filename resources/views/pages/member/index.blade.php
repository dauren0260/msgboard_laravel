@extends("layouts.index")
@section("title","會員中心")
@section("content")
<div class="memberCenter">
<div class="container">
    <div class="avatar">
        <img src="{{asset('storage/img/avatar/'.Auth::user()->avatar)}}" alt="avatar">
    </div>
    <form action="/avatar" method="post" enctype="multipart/form-data">
    @csrf
        <div>
            <div class="fileInputArea">
                <label for="fileTag">上傳檔案</label>
                <span>檔案大小需小於2MB</span>
                <input type="file" name="avatar" id="fileTag" required/>
            </div>
            <div class="uploadArea hide">
                預覽圖片
                <img src="" alt="preview" id="preview" />
                <div class="btnArea">
                    <button type="button" class="btn btn-warning delPreview">刪除檔案</button>
                    <button type="submit" class="btn btn-primary mt-2" id="uploadImg">上傳</button>
                </div>
            </div>
        </div>
    </form>
    <div>姓名：{{Auth::user()->name}}</div>
    <div>信箱：{{Auth::user()->email}}</div>
    <a class="btn btn-outline-secondary" href="/changePassword">更改密碼</a>
</div>
@include("includes.noticeToast")
@push("main")
    @vite(["resources/js/filePreview.js"])
@endpush   
</div>
@endsection
