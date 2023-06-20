
document.getElementById("envoi").addEventListener("submit",function(event){
    var error;
    var user = document.getElementsByName('userName');
	var mail= document.getElementsByName('userEmail');
	var phone = document.getElementsByName('userPhone');
	var msg= document.getElementsByName('userMsg');
    if(user.value==""){
        event.preventDefault();
        error="inserer l'username";
    }
    if(mail.value==""){
        event.preventDefault();
        error="inserer l'adresse mail";
    }
    if(phone.value==""){
        event.preventDefault();
        error="inserer le nombre de telephone";
    }
    if(msg.value==""){
        event.preventDefault();
        error="inserer le message!";
    }
    if (error){
        event.preventDefault();
        document.getElementsByName("error").innerHTML=error;
    }
}
)