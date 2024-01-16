// 照片預覽
let fileTag = document.getElementById("fileTag");
let uploadArea = document.getElementsByClassName("uploadArea")[0];
let delPreview = document.getElementsByClassName("delPreview")[0];

fileTag.addEventListener("change",(event) => {
    const [file] = event.target.files;
    const imgFileReg = /\.(jpe?g|png)$/i;
    
    if(imgFileReg.test(file.name)){
        uploadArea.classList.remove("hide");
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.addEventListener("load", (event) => {
            preview.setAttribute("src", event.target.result);
        });
    }else{
        alert("檔案格式錯誤");
    }
})

// 刪除預覽
delPreview.addEventListener("click",function(){
    preview.setAttribute("src", "");
    uploadArea.classList.add("hide");
    fileTag.value = "";
},false);
