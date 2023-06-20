<?php
  $serveur="localhost";
  $login="root"; 
  $pass="";
  $db_name="test";
try {   

      $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $user_id=$_GET['id'];
     $req1="DELETE  from favoris where userId='$user_id'";
     $delete_fav=$bd->prepare($req1);	
     $delete_fav->execute(); 
     $req2="DELETE  from annonces where userId='$user_id'";
     $delete_annonce=$bd->prepare($req2);	
     $delete_annonce->execute(); 
     $req3="DELETE  from users where id='$user_id'";
     $delete_user=$bd->prepare($req3);	
     $delete_user->execute(); 
      header("Location: list_admins.php?error= admin supprime avec success ");
   

}catch (PDOException $e) {
      echo 'echec de connexion :'.$e->getmessage();
     
}
	
	?>