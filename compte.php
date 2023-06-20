<?php
include("inc/top.php");
?>
<div class="main">
		<div class="register">
<div class="col_1_of_list span_1_of_list login-right">
<form action=change.php method="POST">
                 <div>
					<span>Ancienne email<label>*</label></span>
					<input  name="mail" type="text" required class="textbox"> 
				  </div>
				  <div>
					<span>Nouvelle email<label>*</label></span>
					<input  name="newmail" type="text" required class="textbox"> 
				  </div>
				  <div class="s_btn">
				  <input type="submit" value="change" >
					</div>
					<?php 
if(isset($_GET['error_mail'])){
    print_r("<p>".$_GET['error_mail']."</p>");
}
?>
  </form>
</div>
<div class="col_1_of_list span_1_of_list login-right">
  <form action=change.php method="POST">
	  			  <div>
					<span>Nouvelle nom<label>*</label></span>
					<input  name="newnom" type="text" required class="textbox"> 
				  </div>
				  <div class="s_btn">
				  <input type="submit" value="change">
					</div>
					<?php 
if(isset($_GET['error_nom'])){
    print_r("<p>".$_GET['error_nom']."</p>");
}
?>
  </form>
</div>
<div class="col_1_of_list span_1_of_list login-right">
  <form action=change.php method="POST">

				  <div>
					<span>Nouvelle prenom<label>*</label></span>
					<input  name="newprenom" type="text" required class="textbox"> 
				  </div>
				  <div class="s_btn">
				  <input type="submit" value="change">
				  <?php 
if(isset($_GET['error_prenom'])){
    print_r("<p>".$_GET['error_prenom']."</p>");
}
?>
</div>
  </form>
</div>
<div class="col_1_of_list span_1_of_list login-right">
<form action=change.php method="POST">
                 <div>
					<span>Ancienne username<label>*</label></span>
					<input  name="username" type="text" required class="textbox"> 
				  </div>
				  <div>
					<span>Nouvelle username<label>*</label></span>
					<input  name="newusername" type="text" required class="textbox"> 
				  </div>
				  <div class="s_btn">
				  <input type="submit" value="change">
				 </div>
				 <?php 
if(isset($_GET['error_user'])){
    print_r("<p>".$_GET['error_user']."</p>");
}
?>
  </form>
</div>
<div class="col_1_of_list span_1_of_list login-right">
  <form action=change.php method="POST">
                 <div>
					<span>Ancienne password<label>*</label></span>
					<input  name="password" type="password" required class="textbox"> 
				  </div>
				  <div>
					<span>Nouvelle password<label>*</label></span>
					<input  name="newpassword" type="password" required class="textbox"> 
				  </div>
				  <div class="s_btn">
				  <input type="submit" value="change">
				  </div>
				  <?php 
if(isset($_GET['error_password'])){
    print_r("<p>".$_GET['error_password']."</p>");
}
?>
  </form>
</div>
<div class="col_1_of_list span_1_of_list login-right">
<form action=add_annonce.php method="GET">
                 <div>
					<span>titre annonce<label>*</label></span>
					<input  name="title" type="text" required class="textbox"> 
				  </div>
				  <div>
					<span>description annonce<label>*</label></span>
					<textarea name="description" style="width: 600px; height: 150px;" type="text" required class="textbox"></textarea> 
				  </div>
				  <div>
					<span>prix annonce<label>*</label></span>
					<input  name="prix" type="number" required class="textbox"> 
				  </div>
				  <div>
					<span>image annonce<label>*</label></span>
					<input  name="image" type="file"  accept="image/png, image/jpeg"> 
				  </div>
				  <div class="drp-dwn">
		
		<div>		  <select class="custom-select" id="select-1" name="categorie" >
			<option selected="selected" value="tous">Catégorie</option>
			<?php
				foreach($resultats as $res ){
				print_r('<option value="'.$res['id'].'">'.$res['NAME'].'</option>');
				}
			?>
		</select>
	</div>
	<?php 
if(isset($_GET['error_annonce'])){
    print_r("<p>".$_GET['error_annonce']."</p>");
}
?>
				  <div class="s_btn">
				  <input type="submit" value="ajoute annonce">
				 </div>
  </form>
</div>
</div>
