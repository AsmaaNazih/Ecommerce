<?php
include("inc/top.php");

    $annonce_id=$_GET['annonceId'];
     print_r($annonce_id);
     $user_id=$_SESSION['id'];
    print_r($user_id);
    $req="DELETE  from favoris where userid=$user_id and annonceId=$annonce_id";
    print_r($req);
    $delete_fav=$bd->prepare($req);	
    $delete_fav->execute(); 
     header("Location: favoris.php? ");
            
            
    
	
	?>