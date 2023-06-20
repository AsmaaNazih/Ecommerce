<?php
session_start();
	$user = $_POST['user'];
	$password = $_POST['pass'];
   $error;
   if (!filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)) {
      $error = "format email pas valide ";
  }

        $serveur="localhost";
        $login="root"; 
        $pass="";
        $db_name="test";
         try {

         if(empty($error)){
            $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);

            $get_password=$bd->prepare("SELECT password from users where mail='$user'" );
            $get_password->execute();
            $hash=$get_password->fetchall();
            $hash=$hash[0][0];
            if(password_verify($password,$hash)){

             $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
             $get_user=$bd->prepare('SELECT * from users where mail="'.$user.'" and admin=1'   );	
            $get_user->execute(); 
            $logged=$get_user->fetchall();
            if(empty($logged)){
               header("Location: login.php? error= error: nom users ou Mots de passe incorrectes ! ");
            
               
            }else {
             echo "<span> vous etes connecte </span>";
                header("Location: index.php?  ");
                $_SESSION['user']=$logged[0]['username'];
                $_SESSION['id']=$logged[0]['id'];
                $_SESSION['mail']=$logged[0]['mail'];
                $_SESSION['prenom']=$logged[0]['prenom'];
                $_SESSION['pass']=$logged[0]['password'];
                $_SESSION['nom']=$logged[0]['nom'];
                $_SESSION['admin']=$logged[0]['admin'];
                $_SESSION['connect']="yes";                
            }
         }else{
            header("Location: login.php?error=mot de passe pas correcte!  ");
         }
         }else {
            header("Location: login.php? error= error: $error! ");
         }
            }catch (PDOException $e) {
			echo 'echec de connexion :'.$e->getmessage();
		   
		}
    
	
	?>