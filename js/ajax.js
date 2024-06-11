const form = document.querySelector(".form form"),
submitBtn = document.querySelector(".field button");

form.onsubmit = (e)=>{
    e.preventDefault();//this prevents the form from submitng
}
submitBtn.onclick =()=>{
    //the ajax codes
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signup.php", true);
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data =xhr.response;
            console.log(data);
        }
    }
};
