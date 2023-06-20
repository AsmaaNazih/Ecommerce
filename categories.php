<?php
include("inc/top.php");
?>
<?php
    
    $serveur="localhost";
    $login="root"; 
    $pass="";
	$db_name="test";
     try {
        
		$bd= new PDO("mysql:host=$serveur;dbname=$db_name",$login,$pass);
         
		 $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$req1= "SELECT * FROM annonces";
		$get_annonces=$bd -> prepare($req1);
		$nom_cat=array(0 => "toutes");
		 if(isset($_GET['id'])){
			 $id_categorie=$_GET['id'];
			 if($id_categorie!="tous"){
				$req1= 'SELECT * FROM annonces where categorie='.$id_categorie.''; 
				$req2="SELECT NAME from categories where id=$id_categorie";
				$get_nom_categorie= $bd -> prepare($req2);
				$get_nom_categorie -> execute();
				$nom_cat=$get_nom_categorie -> fetch();
			 }
			 if(isset($_GET['cherche'])){
				$cherche=$_GET['cherche'];
				if($id_categorie!="tous"){
					$req1= $req1.' and title like "%'.$cherche.'%"';
				}else {
					$req1= $req1.' where title like "%'.$cherche.'%"';
				}
			if(isset($_GET['minprix'])&&isset($_GET['maxprix'])) {
				$req1= $req1.'and price>'.$_GET['minprix'].' and price<'.$_GET['maxprix'];
			}
			print_r($req1);
			   $get_annonces=$bd -> prepare($req1);
			}
		 }
		 $get_annonces= $bd -> prepare($req1);

		 $get_annonces -> execute();
		 $annonces=$get_annonces->fetchall();
		
		
		} catch (PDOException $e) {
			echo 'echec de connexion :'.$e->getmessage();
		   
		}
?>
<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
	<?php
	if(!empty($nom_cat)){
	echo '<h4>Nos annonces de categorie ('.$nom_cat[0].') </h4>';
	}else {
header("Location: 404.php");

	}
	if(!empty($annonces)){
		foreach($annonces as $an){
			echo '<div class="ser-grid-list">
			<h5>'.$an['title'].'</h5>
			<img src="images/'.$an['image'].'" width="200px" height="200px" alt="">
			<p>'.$an['description'].'</p>
			<div class="btn top"><a href="annonce.php?id='.$an['annonceId'].'">En savoir plus</a></div>
			</div>';
		}
	}else {
		echo "<h2>Il n'y a pas des annonces qui correspondent à votre recherche</h2>";
	}
	?>
        
    
	<div class="clear"></div>
	</div>
	
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<?php
				foreach($categories as $cat ){
					print_r("<li><a href=categories.php?id=".$cat['id'].">".$cat['NAME']."</a></li>");
					}
			?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>

