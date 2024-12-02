function SendMail(){
    var params = {
        from_name : document.getElementById("name").value,
        email_id : document.getElementById("email").value,
        message : document.getElementById("message").value
    }
    emailjs.send("service_8bpig69","template_dp8jccc", params).then(function (res){
        //alert("success!" + res.status);
        document.getElementById("success").innerText = "Message Sent Successfully! ";
        document.getElementById("message").value = "";
        document.getElementById("email").value = "";
        document.getElementById("name").value = "";
    })
}