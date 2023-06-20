<?php
include("inc/top.php");
$user=$_GET['userName'];

$user=str_replace("'","",$user);
$mail=$_GET['userEmail'];
$phone=$_GET['userPhone'];
$msg=$_GET['userMsg'];
$msg=str_replace("'","\'",$msg);
$error;
if(!is_numeric($phone)) {
  $error="le format de telephone c'est pas valide!";
}
if(strlen((string)$phone)!=10){
  $error="longeur telephone pas valide";
}
if (!preg_match("/^[a-zA-Z-'-' ]*$/",$user)) {
$error="format name pas valide";
}
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $error = "format email pas valide ";
  }
 
  
if(empty($error)){
$insert="insert into contact(nom,mail,telephone,message) VALUES('$user','$mail',$phone,'$msg')";
$add_contact= $bd -> prepare($insert);
$add_contact->execute();
header("Location: contact.php?error= contact ajoute avec success");
}else {
    header("Location: contact.php?error= $error");

}

?>