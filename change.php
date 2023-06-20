<?php
include("inc/top.php");

if(isset($_SESSION['user'])){
    if(isset($_POST['username']) && isset($_POST['newusername'])){
        if($_SESSION['user']==$_POST['username']){
            
            if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['newusername'])) {
                $error="format de nouvelle username pas valide";
                header("Location: compte.php?error_user= $error");
              
              }else{
                $change="UPDATE `users` SET `username` = '".$_POST['newusername']."' WHERE `users`.`id` =".$_SESSION['id'];
                $_SESSION['user']=$_POST['newusername'];
                $do_change= $bd -> prepare($change);
                $do_change-> execute();
                header("Location: compte.php?error_user= username change avec success");
              }

        }else {
            header("Location: compte.php? error_user= error: Username pas bien!");
            
        }
    }
    if(isset($_POST['password']) && isset($_POST['newpassword'])){
        if(password_verify($_POST['password'],$_SESSION['pass'])){
            if(strlen(trim($_POST['newpassword'])) < 6){
                $error="La longeur de nouvelle Mot de passe doit etre superieur a 6";
                header("Location: compte.php?error_password= $error");
           
           }else{
            $hash = password_hash($_POST['password'],PASSWORD_DEFAULT); 
            $change="UPDATE `users` SET `password` = '".$hash."' WHERE `users`.`id` =".$_SESSION['id'];
            $_SESSION['pass']=$_POST['newpassword'];
            $do_change= $bd -> prepare($change);
            $do_change-> execute();
            header("Location: compte.php?error_password= password change avec success");
           }

        }else {
            header("Location: compte.php? error_password= error: password pas bien!");
            
        }


    }
    if(isset($_POST['newnom'])){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['newnom'])) {
            $error="format nouvelle nom pas valide";
            header("Location: compte.php?error_nom= $error");
        
        }else{
        
            $change="UPDATE `users` SET `nom` = '".$_POST['newnom']."' WHERE `users`.`id` =".$_SESSION['id'];
            $do_change= $bd -> prepare($change);
            $do_change-> execute();
            header("Location: compte.php?error_nom= nom change avec success");
        }  

    }
    if(isset($_POST['newprenom'])){

        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['newprenom'])) {
       $error="format nouvelle prenom pas valide";
       header("Location: compte.php?error_prenom=$error");
      
       }else{

        $change="UPDATE `users` SET `prenom` = '".$_POST['newprenom']."' WHERE `users`.`id` =".$_SESSION['id'];
        $do_change= $bd -> prepare($change);
        $do_change-> execute();
        header("Location: compte.php?error_prenom=prenom change avec success");
       }  

    }
    if(isset($_POST['newmail'])){

        if($_SESSION['mail']==$_POST['mail']){
            if (!filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)) {
                $error = "format nouvelle email pas valide ";
                header("Location: compte.php?error_mail= $error");
           
            }else{
         
                
                $change="UPDATE `users` SET `mail` = '".$_POST['newmail']."' WHERE `users`.`id` =".$_SESSION['id'];
                $_SESSION['mail']=$_POST['newmail'];
                $do_change= $bd -> prepare($change);
                $do_change-> execute();
                header("Location: compte.php?error_mail= success");
            }
        }else {
            header("Location: compte.php?error_mail= error: mail pas bien!");
            
        }

    }
}else {
    header("Location: login.php");
          
}
?>