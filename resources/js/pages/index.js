import moment from 'moment';
import { createApp,onMounted, ref } from 'vue';
import * as bootstrap from 'bootstrap';

function dropData(e) {
    if(confirm("確認刪除留言?")){
        return true;
    }else{
        e.preventDefault();
    }
}

// window.onload = function(){
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

    const app = createApp({
        setup() {

            let msg = ref("hello")

            onMounted(()=>{
                console.log("I'm here~~~")
                console.log(msg.value)
            })
            return {
                msg
            }
        }
    })

    app.mount("#app");
// }

