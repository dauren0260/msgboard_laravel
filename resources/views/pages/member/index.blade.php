@extends("layouts.index")
@section("memberCenter")

<div class="container">
    <div class="avatar">
        <img src="{{asset('storage/img/avatar/'.Auth::user()->memAvatar)}}" alt="avatar">
    </div>
    <form action="/memberCenter" method="post" enctype="multipart/form-data">
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
    <div>姓名：{{Auth::user()->memName}}</div>
    <div>信箱：{{Auth::user()->memEmail}}</div>
    <a class="btn btn-outline-secondary" href="/changePassword">更改密碼</a>
</div>
@include("includes.noticeToast")
@endsection
