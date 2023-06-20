<?php
    session_start();
    $serveur="localhost";
    $login="root"; 
    $pass="";
	$db_name="test";
     try {

		$bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
         
		 $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         if(isset($_SESSION['id'])){
        $id_user=$_SESSION['id'];
         $get_favoris=$bd -> prepare('SELECT * from annonces , favoris where annonces.annonceId=favoris.annonceId and favoris.userId="'.$id_user.'"');
         $get_favoris->execute();
         $favoris=$get_favoris->fetchall();
         }else {
             header("Location: index.php");
         }
     }catch (PDOException $e) {

			echo 'echec de connexion :'.$e->getmessage();
		   
	}

    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BreizhCoinCoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
</head>
<body onload="setTimeout(function () { window.location.href= 'favoris.php'; }, 1000); window.print()">  
<?php
foreach($favoris as $fav){
	echo ' 
	<div class="ser-grid-list">
	<h5>'.$fav['title'].'</h5>
	<img src="images/'.$fav['image'].'"  width=150px height=150px alt="">
	<p>'.$fav['description'].'</p>
	</div>';
}
?>

</div>
</body>