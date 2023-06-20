
<?php
    $serveur="localhost";
    $login="root"; 
    $pass="";
    $db_name="test";
try {   
    
        $error; 
        $bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if(empty($_GET['id'])||empty($_GET['name'])){
            $error="id or name not set";
        }else{
            $id=$_GET['id'];
            $new_name=$_GET['name'];
        }
        
        if(empty($error)){
            $control2="SELECT * FROM categories where id=$id";
            $get_control2=$bd->prepare($control2);
            $get_control2->execute();
            if(empty($get_control2->fetchall())){
            $error="l'id il est pas present dans categories";
            }else{
                $control="SELECT * FROM categories where NAME='$new_name'";
                $get_control=$bd->prepare($control);
                $get_control->execute();
                    if(empty($get_control->fetchall())){
                        $req="UPDATE categories  SET NAME='$new_name' where id=$id";
    
                        $modif=$bd->prepare($req);
                        $modif->execute();  
                    }else {
                        $error="cette Nom de categorie est dejà present ";
                    }
            }
        }
        if(empty($error)){
             header("Location: list_categories.php?error=Categorie modifie avec success");  
        }else {
            
            header("Location: list_categories.php?error=$error");  
        }
           
           

}catch (PDOException $e) {
        echo 'echec de connexion :'.$e->getmessage();
       
}
?>