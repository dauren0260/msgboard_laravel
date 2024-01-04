function dropData(e) {
    let parent = this.parentNode.parentNode;
    let hiddenInput = parent.querySelector(".hiddenInput").value;
    let content = parent.parentNode.querySelector(".showContent").innerText;

    if(confirm("確認刪除留言?")){
        var sendData = new FormData();
        sendData.append('commentNo', hiddenInput);
        sendData.append('content', content);

        axios.post('/message/deleteMsg/', sendData)
        .then( (res) => {
           
        }).catch(err=>console.log(err))
    }else{
        e.preventDefault();
    }
}
