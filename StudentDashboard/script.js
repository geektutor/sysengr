let y = document.getElementById("check");
let mail=document.getElementById("mail")
let k = document.getElementById("messagearea")

if (y.checked==true) {

    k.setAttribute('disabled', '')
    
}
else if (y.checked==false) {
    mail.removeAttribute('disabled', '');
    
}



