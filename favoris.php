<?php
include("inc/top.php");
?>
<?php

		 $get_categorie=$bd->prepare(   "select * from categories "  );		 
		 if(isset($_SESSION['id'])){
			 $id_user=$_SESSION['id'];
			 if(isset($_GET['annonceId'])){
				 $id_annonce=$_GET['annonceId'];

				$check="SELECT * FROM favoris where annonceId=$id_annonce and userId=$id_user";
				$est_dedans= $bd -> prepare($check);
				$est_dedans-> execute();
				$dedans= $est_dedans->fetchall();
				if(empty($dedans))
				{
				 $inser = "INSERT INTO favoris(annonceId,userId) VALUES($id_annonce,".$id_user.")";
				 $insert =$bd -> prepare($inser);
				 $insert->execute();
				}
			 }
			 $get_favoris=$bd -> prepare('SELECT * from annonces , favoris where annonces.annonceId=favoris.annonceId and favoris.userId="'.$id_user.'"');
			 $get_favoris->execute();
			 $favoris=$get_favoris->fetchall();

		 }else {
			header("Location: login.php?  ");
		 }
		

?>
<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
	<h4>Vos favoris</h4>


<?php			 
foreach($favoris as $fav){
	echo '   
	<div class="ser-grid-list">
	<h5>'.$fav['title'].'</h5>
	<img src="images/'.$fav['image'].'"  width=150px height=150px alt="">
	<p>'.$fav['description'].'</p>
	<div class="btn top"><a href="supp_fav.php?annonceId='.$fav['annonceId'].'">Supprimer de mes favoris</a></div>
	</div>';
}
?> 
	<div class="clear">	<div class="btn top"><a href="favoris_imprimer.php">Imprimer mes favoris</a></div></div>
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

