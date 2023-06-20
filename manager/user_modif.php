<?php
  $serveur="localhost";
  $login="root"; 
  $pass="";
  $db_name="test";
try {   

      $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $error;
      $id=$_GET['id'];
      if($id!="no"){
        $isadmin="SELECT admin from users where id=$id";
        $get_isadmin=$bd->prepare($isadmin);
        $get_isadmin->execute();
        $admin=$get_isadmin->fetchall();
        $admin=$admin[0][0];
        if(isset($_GET['nom'])){
            $nom=$_GET['nom'];
            if(!empty($nom)){
            $req_nom="UPDATE users SET nom='".$nom."' WHERE id=$id";
            $do=$bd->prepare($req_nom);
            $do -> execute();
                $error="nom modified successfully!";
            }else {
                $error="nom can't be empty!";
            }
        }
        if(isset($_GET['username'])){
            $username=$_GET['username'];
            if(!empty($username)){
             $req_control="SELECT * from users where username='$username'";
             $co=$bd->prepare($req_control);
             $co->execute();
             $control=$co->fetchall();
                if(empty($control)){   
                    $req_username="UPDATE users SET username='".$username."' WHERE id=$id";
                    $do=$bd->prepare($req_username);
                    $do -> execute();
                     $error="username modified successfully!";
                }else{
                    $error="this username exists!";
                }
            }else {
                    $error="username can't be empty!";
            }
        }
    if(isset($_GET['prenom'])){
            $prenom=$_GET['prenom'];
        if(!empty($prenom)){
        $req_prenom="UPDATE users SET prenom='$prenom' WHERE id=$id";
        $do=$bd->prepare($req_prenom);
        $do -> execute();
            $error="prenom modified successfully!";
        }else {
            $error="prenom can't be empty!";
        }
    }
    if(isset($_GET['mail'])){
        $mail=$_GET['mail'];
        if(!empty($mail)){
            $req_control="SELECT * from users where mail='$mail'";
            $co=$bd->prepare($req_control);
            $co->execute();
            $control=$co->fetchall();
            if(empty($control)){
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $error = "format email pas valide ";
                }else{
                    $req_mail="UPDATE users SET mail='$mail' WHERE id=$id";
                    $do=$bd->prepare($req_mail);
                    $do -> execute();
                    $error="mail modified successfully!";
                }
            }else {
                $error = " this email exists";
            }
        }else {
            $error="mail can't be empty!";
        }

    }
    if(!empty($error)){
        if($admin==0){
        header("Location: modif_admin.php?id=$id&error=$error");
        }else{
        header("Location: modif_membre.php?error=$error");
        }
    }
    
}else{
        $error="id is not set!";
        header("Location:  ?error=$error");
    }

}catch (PDOException $e) {
      echo 'echec de connexion :'.$e->getmessage();
     
}
	
	?>