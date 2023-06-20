<?php
  $serveur="localhost";
  $login="root"; 
  $pass="";
  $db_name="test";
try {   

      $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $annonce_id=$_GET['id'];
     $req1="DELETE from favoris where  annonceId=$annonce_id";
     $update=$bd->prepare($req1);
     $update->execute();
     $req2="DELETE  from annonces where annonceId=$annonce_id";
     $delete_cat=$bd->prepare($req2);	
     $delete_cat->execute(); 
      header("Location: list_annonces.php?error=annonce supprime correctement ");
   

}catch (PDOException $e) {
      echo 'echec de connexion :'.$e->getmessage();
     
}
	
	?>