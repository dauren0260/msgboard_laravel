import * as bootstrap from 'bootstrap';

import moment from 'moment';

function dropData(e) {
    if(confirm("確認刪除留言?")){
        return true;
    }else{
        e.preventDefault();
    }
}

window.onload = function(){
    var allDelBtn = document.querySelectorAll(".delBtn");
    for (let i = 0; i < allDelBtn.length; i++) {
        allDelBtn[i].addEventListener("click",dropData,false);
    }

    let today = moment().format("YYYY-MM-DD");

    let endDate = document.getElementById("endDate");
    if(document.body.contains(endDate)){
        endDate.setAttribute("max",today);
    }

    let toast = document.getElementsByClassName("toast")[0];
    if(document.body.contains(toast)){
        new bootstrap.Toast(toast).show();
    }
    
    // 檔案上傳
    let fileTag = document.getElementById("fileTag");
    let uploadArea = document.getElementsByClassName("uploadArea")[0];
    let delPreview = document.getElementsByClassName("delPreview")[0];

    if(document.body.contains(fileTag)){
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
    }

    if(document.body.contains(delPreview)){
        delPreview.addEventListener("click",function(){
            preview.setAttribute("src", "");
            uploadArea.classList.add("hide");
            console.log(uploadArea)
            fileTag.value = "";
        },false);
    }
}