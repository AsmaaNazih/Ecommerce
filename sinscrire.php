<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
     <div class="register">
		  	  <form action="inscription.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>Vos informations</h3>
					 <div>
						<span>Prenom<label>*</label></span>
						<input type="text" name="prenom" required> 
					 </div>
					 <div>
						<span>Nom<label>*</label></span>
						<input type="text" name="nom" required> 
					 </div>
					 <div>
						 <span>Email<label>*</label></span>
						 <input type="text" name="mail" required> 
					 </div>
					 <div>
						 <span>Username<label>*</label></span>
						 <input type="text" name="username" required> 
					 </div>
					 <div class="clear"> </div>
					     <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire � la neswletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Pour vous authentifier</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="pass_1" required>
							 </div>
							 <div>
								<span>Retapez votre Password<label>*</label></span>
								<input type="password" name="pass_2" required>
							 </div>
							 <?php
							 if(isset($_GET['error_p'])){
								echo "<div> <p>".$_GET['error_p']."</p></div>";
							 }
							 ?>
							 <div class="clear"> </div>
					 </div>
				<div class="clear"> </div>
				<div class="register-but">
					   <input type="submit" value="M'inscrire">
					   <div class="clear"> </div>
			  </form>
	</div>
</div>
  <div class="clear"></div>
</div>
<!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>