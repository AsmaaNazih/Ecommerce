<?php
include("inc/top.php");
?>
<?php
		 $get_last_five = $bd -> prepare("SELECT * FROM annonces  
		 ORDER BY  `DATE` DESC  LIMIT 5 ");

		 $get_annonces= $bd -> prepare("SELECT * FROM annonces");

		
		 $get_last_five -> execute();
		
		 $get_annonces -> execute();
		
		 $last_five=$get_last_five -> fetchall();
		
		 $random_index=array_rand($last_five,1);

		 $all_announces=$get_annonces->fetchall();

		 $six_announces=array_rand($all_announces,6);
		 shuffle($six_announces);
?>
<!-- debut de la partie contenu -->
<div class="main">
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Catégories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<?php
				foreach($categories as $cat){
				print_r("<li><a href=categories.php?id=".$cat['id'].">".$cat['NAME']."</a></li>");
				}
			?>

	    </ul>
	</div>
</div>


</div>

<div class="content">


	<div class="clear"></div>
	<div class="cnt-main">
		<div class="s_btn">
			<ul>
			<?php	if(isset($_SESSION['user'])){
			echo	"<li><h2>Bienvenue : ". $_SESSION['user']."</h2></li>";
				}else{
			echo '	<li><h2>Bienvenue !</h2></li>
				<li><h3><a href="login.php">Se connecter</a></h3></li>
				<li><h2>Nouveau visiteur ?</h2></li>
				<li><h4><a href="sinscrire.php">S enregistrer</a></h4></li>
				<div class="clear"></div> ';
			}
			?>
			</ul>
		</div>
	<div class="grid">
	<div class="grid-img">
		<?php
			echo '<a href="annonce.php?id='.$last_five[$random_index]['annonceId'].'"><img src="images/'.$last_five[$random_index]['image'].'" alt=""/></a>';
		?>
	</div>
	<div class="grid-para">
		<h2>Nouveau sur le site</h2>
		<?php
		echo '<h3>'.$last_five[$random_index]['title'].'</h3>'; 
		
		echo '<p>'.$last_five[$random_index]['description'].'</p>';
		?>
		<div class="btn top">
		<?php	
		echo '<a href="annonce.php?id='.$last_five[$random_index]['annonceId'].'">Details&nbsp;<img src="images/marker2.png"></a>';
		?>
		</div>
	</div>
	<div class="clear"></div>
	</div>
</div>
<div class="cnt-main btm">
	<div class="section group">
	<?php
		foreach($six_announces as $six){
			echo '	<div class="grid_1_of_3 images_1_of_3">

					<a href="annonce.php?id='.$all_announces[$six]['annonceId'].'"><img src="images/'.$all_announces[$six]['image'].'" alt=""/></a>
					<a href="annonce.php?id='.$all_announces[$six]['annonceId'].'"><h3>'.$all_announces[$six]['title'].'</h3></a>
					<div class="cart-b">
					<span class="price left"><sup>'.$all_announces[$six]['price'].'€</sup><sub></sub></span>
					 <div class="btn top-right right"><a href="favoris.php?annonceId='.$all_announces[$six]['annonceId'].'">Ajouter à mes favoris</a></div>	       
					<div class="clear"></div> </div>
					</div>';
		}		
		?>
	</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
