<?php
include("inc/top.php");
?>
<?php
 
		$req1= "SELECT * FROM annonces";
		$nom_cat="";

		 $id_annonce=$_GET['id'];
		 $req1 = "SELECT * FROM annonces where annonceId=$id_annonce";
		 $req2 = "SELECT * FROM annonces where categorie= (SELECT categorie from annonces where annonceId=$id_annonce) and annonceId!=$id_annonce LIMIT 3";
		 $get_annonce= $bd -> prepare($req1);
		 $get_trois_annonces= $bd -> prepare($req2);
		 $get_annonce-> execute();
		 $get_trois_annonces->execute();

		 $annonce=$get_annonce -> fetchall();
		 $trois_annonces=$get_trois_annonces-> fetchall();
	
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="details">

<?php
if(!empty($annonce)){
	echo	'	  <div class="product-details">				
						<div class="images_3_of_2">
							<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
										<a href="#" target="_blank"><img src="images/'.$annonce[0]['image'].'" width="250px" height="250px" alt=" " /></a>
									
									</div>
									<ul class="pagination">
										<li><a href="#"><img src="images/'.$annonce[0]['image'].'" width="60px" height="60px" alt=" " /></a></li>
									
									
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="desc span_3_of_2">
						<h2>'.$annonce[0]['title'].'</h2>
						<p>'.$annonce[0]['description'].'</p>					
						<div class="price">
							<p>Prix: <span>'.$annonce[0]['price'].'€</span></p>
						</div>
					
				
				
					<div class="wish-list">
						<ul>
							<li class="wish"><a href="favoris.php?annonceId='.$annonce[0]['annonceId'].'">Ajouter à mes favoris</a></li>
					
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>

		
				
	<div class="content_bottom">
		<div class="text-h1 top1 btm">
				<h2>Annonces qui pourraient vous interesser</h2>
			</div>
	<div class="div2">
			<div id="mcts1">';

			foreach($trois_annonces as $trois){
			echo	'<div class="w3l-img">
			<a href="annonce.php?id='.$trois['annonceId'].'" target="_blank"><img src="images/'.$trois['image'].'" width=150px alt=" " /></a>
				</div>';
				
			}
	}else {
		header("Location: 404.php");
       
	}
			?>
			<div class="clear"></div>	
        </div>
   		</div>

    	</div>

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