<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

	session_start();
    $serveur="localhost";
    $login="root";
    $pass="";
     try {
         $bd= new PDO("mysql:host=$serveur;dbname=test",$login,$pass);
         $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $requete=$bd->prepare(   "select * from categories "  );
		 $requete -> execute();
		$resultats=$requete->fetchall();
		$get_categorie=$bd->prepare(   "SELECT * from categories ");
		$get_categorie -> execute();
		$categories=$get_categorie-> fetchall();
		if(isset($_SESSION['id'])){
			$id_user=$_SESSION['id'];
			$get_favoris=$bd -> prepare('SELECT * from annonces , favoris where annonces.annonceId=favoris.annonceId and favoris.userId="'.$id_user.'"');
			$get_favoris->execute();
			$favoris=$get_favoris->fetchall();
			$count = count($favoris);
		}

		} catch (PDOException $e) {
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
<body>
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt=""> </a>
	</div>
	<div class="header-right">
	<div class="contact-info">
		<ul>
			<?php
			if(isset($_SESSION['user'])){
			echo '<li><a href="logout.php">Logout</a></li>';			
			echo '<li><a href="favoris.php">Favoris : '.$count .' enregistrés</a></li>';
			}
			?>
		</ul>
	</div>
	<div class="menu">
	 	 <ul class="nav">
        <li class="active"><a href="index.php" title="Home">Accueil</a></li>
  		<li><a href="apropos.php">Notre concept</a></li>
  	     <li><a href="categories.php">Annonces</a></li>
  		<li><a href="contact.php">Contact</a></li>
		 <?php 
		 if(!isset($_SESSION['user'])){
  		echo '<li><a href="sinscrire.php">S enregistrer</a></li>';
		 }
		  
		if(!isset($SESSION['user'])){
	    echo '<li><a href="login.php">Mon compte</a></li>';
		}else {
			echo '<li><a href="compte.php">Mon compte</a></li>';	
		}
		?>
		<li><a href="manager/index.php">Admin</a></li>
  		<div class="clear"></div>
      </ul>
	 </div>
	 </div>
	<div class="clear"></div>
</div>
<div class="hdr-btm pad-w3l">
<div class="hdr-btm-bg"></div>
<div class="hdr-btm-left">
<form action="categories.php" method="GET">
	<div class="search">
	  
		<input  name="cherche" type="text" value="tapez votre recherche" >
		<input type="submit" value="Chercher" class="pad-w3l-search">
		<?php
		if(isset($_GET['recherche'])){
		echo '<br></br>	<input  name="minprix" type="text" value="min prix " >';
		echo '<br></br>	<input  name="maxprix" type="text" value="max prix " >';
	
		}
		?>
	</div>
	<div class="drp-dwn">
		<select class="custom-select" id="select-1" name="id">
			<option selected="selected" value="tous">Catégorie</option>
			<?php
				foreach($resultats as $res ){
				print_r('<option value="'.$res['id'].'">'.$res['NAME'].'</option>');
				}
			?>
		</select>
	</div>
	</form>
	<div class="txt-right">
		<h3><a href="?recherche=avancee">Recherche avancée</a></h3>
	</div>
	<div class="clear"></div>
</div>
</div>