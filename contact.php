<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="section group">				
				<div class="col span_1_of_2">
					<div class="contact_info">
			    	 	<h3>Nous trouver</h3>
			    	 		<div class="map">
							 <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2663.718230692027!2d-1.6406133490126749!3d48.11567097911972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edee434358f89%3A0x80705ecc3d08417a!2sIstic%2C%20Bat%2012%20D!5e0!3m2!1sit!2sfr!4v1653932891282!5m2!1sit!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><small><a href="https://www.google.co.in/maps/place/Istic,+Bat+12+D/@48.115671,-1.6406133,17z/data=!3m1!4b1!4m5!3m4!1s0x480edee434358f89:0x80705ecc3d08417a!8m2!3d48.115671!4d-1.6384193" style="color: rgba(180, 192, 21, 0.71);;text-align:left;font-size:12px">View Larger Map</a></small>
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h3>Nous situer</h3>
						<p>All. Henri Poincaré, </p>
						<p>35700 Rennes,</p>
						<p>France</p>
				   		<p>Phone:0223233900</p>
				 	 	<p>Website: <span><a href="https://istic.univ-rennes1.fr/" style="color: rgba(180, 192, 21, 0.71);;text-align:left;font-size:12px">https://istic.univ-rennes1.fr/</a></span></p>
				   </div>
				</div>				
				<div class="col span_2_of_4">
				  <div class="contact-form">
				  	<h3>Nous écrire</h3>
					       <form id="envoi" action="add_contact.php	" method="GET">
					    	<div>
						    	<span><label>Nom</label></span>
						    	<span><input name="userName" type="text" class="textbox" ></span>
						    </div>
						    <div>
						    	<span><label>Email</label></span>
						    	<span><input name="userEmail" type="text" class="textbox" ></span>
						    </div>
						    <div>
						     	<span><label>Teléphone</label></span>
						    	<span><input name="userPhone" type="text" class="textbox" ></span>
						    </div>
						    <div>
						    	<span><label>Message</label></span>
						    	<span><textarea  name="userMsg" > </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit"></span>
						  </div>
					    </form>

				    </div>
  				</div>				
		  </div>
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<script  src="contact.js"></script>
<p style ="color: red;" id ="error"></p>
<?php
if($_GET['error']){
print_r("<p>".$_GET['error']."</p>");
}
include("inc/bottom.php");
?>