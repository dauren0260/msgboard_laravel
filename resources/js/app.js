import * as bootstrap from 'bootstrap';

import moment from 'moment';

function dropData(e) {
    if(confirm("確認刪除留言?")){
        return true;
    }else{
        e.preventDefault();
    }
}

function changePswBtn(){
    showChangePsw.addEventListener("click",function(){
        console.log("changePswBtn");

        this.classList.toggle("hide");
        changeArea.classList.toggle("hide");
        oldPassword.value = '';
        newPassword.value = '';
        oldPassword.focus();
    },false);

    cancelBtn.addEventListener("click",function(){
        changeArea.classList.toggle("hide");
        showChangePsw.classList.toggle("hide");
    },false);
}

window.onload = function(){
    console.log("onload");
    var allDelBtn = document.querySelectorAll(".delBtn");
    for (let i = 0; i < allDelBtn.length; i++) {
        allDelBtn[i].addEventListener("click",dropData,false);
    }

    let today = moment().format("YYYY-MM-DD");

    let endDate = document.getElementById("endDate");
    if(document.body.contains(endDate)){
        endDate.setAttribute("max",today);
    }

    let changePsw = document.querySelector(".changePsw");
    if(document.body.contains(changePsw)){
        changePswBtn();
    }

    let toast = document.getElementsByClassName("toast")[0];
    if(document.body.contains(toast)){
       new bootstrap.Toast(toast).show();
    }
}