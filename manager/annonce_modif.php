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

       $get_date= $bd -> prepare("Select CURDATE()");
       $get_date-> execute();
       $date= $get_date-> fetchall();
       $req_date="UPDATE ANNONCES SET UPDATE_TIME='".$date[0][0]."' WHERE annonceId=$id";
       $do_date = $bd -> prepare($req_date);
       $do_date ->execute();
        if(isset($_GET['title'])){
            $title=$_GET['title'];
            if(!empty($title)){
            $req_titre="UPDATE ANNONCES SET title='".$title."' WHERE annonceId=$id";
            $do=$bd->prepare($req_titre);
            $do -> execute();
                $error="title modified successfully!";
            }else {
                $error="title can't be empty!";
            }
        }
    if(isset($_GET['description'])){
            $description=$_GET['description'];
        if(!empty($description)){
        $req_description="UPDATE ANNONCES SET description='$description' WHERE annonceId=$id";
        $do=$bd->prepare($req_description);
        $do -> execute();
            $error="description modified successfully!";
        }else {
            $error="description can't be empty!";
        }
    }
    if(isset($_GET['prix'])){
        $prix=$_GET['prix'];
        if(!empty($prix)){
        $req_prix="UPDATE ANNONCES SET price='$prix' WHERE annonceId=$id";
        $do=$bd->prepare($req_prix);
        $do -> execute();
            $error="prix modified successfully!";
        }else {
            $error="prix can't be empty!";
        }

    }
    if(isset($_GET['categorie'])){
        $categorie=$_GET['categorie'];
        if(!empty($categorie)&&($categorie!="tous")){
        $req_cat="UPDATE ANNONCES SET categorie='$categorie' WHERE annonceId=$id";
        $do=$bd->prepare($req_cat);
        $do -> execute();
            $error="categorie modified successfully!";
        }else {
            $error="categorie can't be empty!";
        }

    }
    if(!empty($error)){
        header("Location: modif_annonce.php?id=$id&error=$error");
    }
    
}else{
        $error="id is not set!";
    }

}catch (PDOException $e) {
      echo 'echec de connexion :'.$e->getmessage();
     
}
	
	?>