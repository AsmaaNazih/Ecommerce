<?php
$serveur="localhost";
$login="root";
$pass="";
 try {
     $bd= new PDO("mysql:host=$serveur;dbname=test",$login,$pass);
     $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(!empty($_POST['name'])){
        $new_categorie=$_POST['name'];
        $get_control=$bd -> prepare("SELECT * FROM categories where NAME='$new_categorie'");
        $get_control->execute();
        $control=$get_control->fetchall();
        if(empty($control)){
        $get_date= $bd -> prepare("INSERT INTO categories(NAME) VALUES('$new_categorie')");
            $get_date-> execute();
            header("Location: list_categories.php");
        }else{
            header("Location: add_categorie.php?error= cette categorie existe dejà");
                    
        }

    }else{

        header("Location: add_categorie.php?error=name not set");
    }
 }catch (PDOException $e) {
    echo 'echec de connexion :'.$e->getmessage();
   
}
?>