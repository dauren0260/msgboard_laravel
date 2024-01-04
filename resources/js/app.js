import './bootstrap';
import '../sass/app.scss';
import moment from 'moment';
let today = moment().format("YYYY-MM-DD");
endDate.setAttribute("max",today);


function dropData(e) {
    if(confirm("確認刪除留言?")){
        // window.location.href = this.getAttribute('href');
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
}