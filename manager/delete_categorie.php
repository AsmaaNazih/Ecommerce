<?php
  $serveur="localhost";
  $login="root"; 
  $pass="";
  $db_name="test";
try {   

      $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $categorie_id=$_GET['id'];
     $req1="UPDATE annonces SET categorie=NULL WHERE categorie=$categorie_id";
     $update=$bd->prepare($req1);
     $update->execute();
     $req2="DELETE  from categories where id='$categorie_id'";
     $delete_cat=$bd->prepare($req2);	
     $delete_cat->execute(); 
      header("Location: list_categories.php?error=categorie supprime avec success ");
   

}catch (PDOException $e) {
      echo 'echec de connexion :'.$e->getmessage();
     
}
	
	?>