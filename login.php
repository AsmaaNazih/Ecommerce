<?php
include("inc/top.php");

if(isset($_SESSION['id'])){
	header("Location: compte.php");
                    
}
?>

<!-- debut de la partie contenu -->
<div class="main">
		<div class="register">
			   <div class="col_1_of_list span_1_of_list login-left">
			  	 <h3>Nouveau membre</h3>
				 <p>En creant un compte, vous pourrez creer des annonces</p>
				 <a class="acount-btn" href="sinscrire.php">Creer un compte</a>
			   </div>
			   <div class="col_1_of_list span_1_of_list login-right">
			  	<h3>Deja membre ?</h3>
				<p>Si vous avez deja un compte, merci de vous connecter</p>
				<form action=log.php method="post">
				  <div>
					<span>Adresse email<label>*</label></span>
					<input id="user" name="user" type="e-mail"> 
				  </div>
				  <div>
					<span>Mot de passe<label>*</label></span>
					<input id="pass" name="pass" type="password"> 
				  </div>
				  <a class="forgot" href="#">Mot de passe oublie</a>
				  <input type="submit" value="Login">
				  <?php
       				 if(isset($_GET['error'])){
       					 echo "<p>".$_GET['error']."</p>";
       				 }
        ?>
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		
	</div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>