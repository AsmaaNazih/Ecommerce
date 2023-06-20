<?php
	$user = $_POST['username'];
    $user=str_replace("'","",$user);
	$email = $_POST['mail'];
    $nom= $_POST['nom'];
    
    $nom=str_replace("'","\'",$nom);
    $prenom= $_POST['prenom'];
    $prenom=str_replace("'","\'",$prenom);
    $pass_1= $_POST['pass_1'];
    $pass_2= $_POST['pass_2'];
    $error;

        if (!preg_match("/^[a-zA-Z-' ]*$/",$user)) {
        $error="format username pas valide";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "format email pas valide ";
          }
          if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
            $error="format nom pas valide";
            }
            if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) {
                $error="format prenom pas valide";
                }

                if($_POST['pass_1']!=$_POST['pass_2']){
                    $error="les Mots de passe ne correspond pas !";
                }else if(strlen(trim($_POST['pass_1'])) < 6){
                    $error="Longeur Mot de passe doit etre superieur a 6";
                }
        $serveur="localhost";
        $login="root"; 
        $pass="";
        $db_name="test";
    try {
             
            $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
             
             $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if(empty($error)){
            if($_POST['pass_1']==$_POST['pass_2']){
                $get_user=$bd->prepare("SELECT * from users where mail='$email' and username='$user'"   );	
                $get_user->execute(); 
                $est_present=$get_user->fetchall();
                if(empty($est_present)){
                    $hash = password_hash($_POST['pass_1'],PASSWORD_DEFAULT); 
                    $create_user=$bd ->prepare("INSERT INTO users(username,password,mail,admin,nom,prenom) VALUES('$user','$hash','$email',1,'$nom','$prenom')");
                    $create_user -> execute();
                    header("Location: sinscrire.php?error_p= l'account est creee avec succes !");
                    }else {
                    header("Location: sinscrire.php?error_p= cette account existe dejà");
                            
                    }
             }else{
            header("Location: sinscrire.php?error_p= error: les Mots de passe ne correspond pas ! ");
            }
         }else {
            header("Location: sinscrire.php?error_p= error: $error ");
            
         }
    }catch (PDOException $e) {
			echo 'echec de connexion :'.$e->getmessage();
		   
    }
?>