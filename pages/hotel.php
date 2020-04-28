<?php 
	include '../hautDePage.php';
	include '../config.php';

	$hotel = 'Hotel';
	$city = htmlspecialchars($_GET['city']);
	$req = $bdd->prepare('SELECT * FROM service WHERE city = ? AND type = ?');
	$req->execute(array($city, $hotel));
	?>

	<h3>Listes des hôtels à <?php echo $city; ?></h3>
	<?php
		while ($resultat = $req->fetch()) {
			if (isset($resultat)) {
					
					
	?>
	<div>
		<p>
			<em>Nom : </em><?php echo $resultat['name']; ?><br>
			<em>Ville : </em><?php echo $resultat['city']; ?><br>
			<em>Description : </em><?php echo $resultat['description']; ?><br>
			<em>Prix : </em><?php echo $resultat['price']; ?><br>
		</p>

		<?php 
				if (isset($_SESSION['id'])) {
					if ($_SESSION['mailVerif'] == 1) {
						
					
			 ?>

		<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="<?php echo '#id'.$resultat['id']?>">Reserver</button>

		<?php } else{ ?>

			<p>Votre email n'est pas vérifé, merci d'activer votre compte dans vos mails</p>

		<?php }}else{ ?>

		<p>Pour effectuer cette réservation veuillez vous <a href="register.php">inscrire</a> et/ou vous <a href="connexion.php">connecter</a></p>

		<?php } ?>
		<!-- Modal -->
		<div class="modal fade" id="<?php echo 'id'.$resultat['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Reservation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="../pages_php/hotel.php?city=<?php echo $city;?>">
		        	<div class="form-row">
			         <div class="col-md-6 mb-3">
			            <input type="hidden" class="form-control" id="validationDefault01" name="id_client" value=<?php echo $_SESSION['id'];?> required>
			         </div>
			         <div class="col-md-6 mb-3">
			            <input type="hidden" class="form-control" id="validationDefault02" name="id_service"
			            value=<?php echo $resultat['id'];?> required>
			         </div>
			        </div>
			        <div class="form-row">
			         <div class="col-md-10 mb-3">
			            <label for="validationDefault01">Nombre de personne</label>
			            <input type="number" class="form-control" id="validationDefault01" name="number_of_person" required>
			         </div>
			        </div>
			        <div class="form-row">
			         <div class="col-md-6 mb-3">
			            <label for="validationDefault01">Date arrivée</label>
			            <input type="date" class="form-control" id="validationDefault01" name="date_arrival" required>
			         </div>
			         <div class="col-md-6 mb-3">
			            <label for="validationDefault02">Date retour</label>
			            <input type="date" class="form-control" id="validationDefault02" name="date_return" required>
			         </div>
			        </div>
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		        	<button type="submit" class="btn btn-primary" name="sendForm">Reserver</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
</div>
<?php } else{ ?>

<p> Aucun resultat pour <?php echo $city; ?></p>
<?php }} ?>
<?php include '../basDePage.php'; ?>