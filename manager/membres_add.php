<?php
	$user = $_POST['username'];
	$email = $_POST['mail'];
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $password= $_POST['password'];
    $type=$_POST['type'];
    $error;

    if($type=="ajoute membre"){
        $admin=1;
    }else{
        $admin=0;
    }
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

            if(strlen(trim($password)) < 6){
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
                $get_user=$bd->prepare("SELECT * from users where mail='$email' and username='$user'"   );	
                $get_user->execute(); 
                $est_present=$get_user->fetchall();
                if(empty($est_present)){
                    $create_user=$bd ->prepare("INSERT INTO users(username,password,mail,admin,nom,prenom) VALUES('$user','$password','$email',$admin,'$nom','$prenom')");
                    $create_user -> execute();
                    header("Location:   add_members.php?error= l'account est creee avec succes !");
                    }else {
                    header("Location: add_members.php?error= cette account existe dejà");
                            
                    }
            
         }else {
            header("Location: add_members.php?error= error: $error ");
            
         }
    }catch (PDOException $e) {
			echo 'echec de connexion :'.$e->getmessage();
		   
    }
?>