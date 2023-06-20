<?php
try{
    if(isset($_SESSION['id'])){
        if(isset($_GET['title']) && isset($_GET['description']) && isset($_GET['prix']) &&isset($_GET['categorie'])){

            $title=$_GET['title'];
            $title=str_replace("'","\'",$title);
            $description=$_GET['description'];
            $description=str_replace("'","\'",$description);
            $prix=$_GET['prix'];
            $categorie=$_GET['categorie'];
            $id=$_SESSION['id'];
            $get_date= $bd -> prepare("Select CURDATE()");
            $get_date-> execute();
        $date= $get_date-> fetchall();
        if(!empty($_GET['image'])){
            $img=$_GET['image'];
                if($categorie=="tous"){
                    $insert="insert into ANNONCES(title,price,DATE,image,description,userId) VALUES('$title'   ,$prix,'".$date[0][0]."','$img','$description',$id)";
                }else{
                    $insert="insert into ANNONCES(title,price,DATE,image,description,categorie,userId) VALUES('$title'   ,$prix,'".$date[0][0]."','$img','$description',$categorie,$id)";
                }
        
        }else{
                if($categorie!="tous"){
                    $insert="insert into ANNONCES(title,price,DATE,description,categorie,userId) VALUES('$title',$prix,'".$date[0][0]."','$description',$categorie,$id)";
                }else{
                    $insert="insert into ANNONCES(title,price,DATE,description,userId) VALUES('$title',$prix,'".$date[0][0]."','$description',$id)";
                }
        }
            $add_annonce= $bd -> prepare($insert);
        $add_annonce->execute();
        header("Location: add_annonce.php?error= annonce ajoute avec success");

        }else {
            header("Location: add_annonce.php?error_annonce= echec annonce pas ajoute!");
            
        }
    }else {
        print_r("pas connecte");
    }

}catch (PDOException $e) {
    echo 'echec de connexion :'.$e->getmessage();
   
}

?>