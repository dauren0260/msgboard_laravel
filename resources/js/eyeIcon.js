let eyeIcons = document.querySelectorAll(".bi");
for (let i = 0; i < eyeIcons.length; i++) {        
    eyeIcons[i].addEventListener("click",function(){
        if(this.previousSibling.type == "password"){
            this.previousSibling.type = "text";
        }else{
            this.previousSibling.type = "password";
        }
        this.classList.toggle("bi-eye");
        this.classList.toggle("bi-eye-slash");
        
    },false)
}