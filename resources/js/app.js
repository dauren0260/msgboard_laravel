import './bootstrap';
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
       return new bootstrap.Toast(toast).show();
    }

}