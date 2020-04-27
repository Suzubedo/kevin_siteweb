<?php 
	include '../hautDePage.php';
	include '../config.php';

	$bar = 'Bar';
	$city = htmlspecialchars($_GET['city']);
	$req = $bdd->prepare('SELECT * FROM service WHERE city = ? AND type = ?');
	$req->execute(array($city, $bar));
	?>
<h3>Listes des bars à <?php echo $city; ?></h3>
<?php
	while ($resultat = $req->fetch()) {
		if (isset($resultat)) {
				
				
?>
<div>
	<p>
		<em>ID : </em><?php echo $resultat['id']; ?><br>
		<em>Nom : </em><?php echo $resultat['name']; ?><br>
		<em>Ville : </em><?php echo $resultat['city']; ?><br>
		<em>Description : </em><?php echo $resultat['description']; ?><br>
		<em>Prix : </em><?php echo $resultat['price']; ?><br>
	</p>
	<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="<?php echo '#id'.$resultat['id']?>">Reserver</button>

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
		        <form>
		        	<div class="form-row">
			         <div class="col-md-6 mb-3">
			            <input type="hidden" class="form-control" id="validationDefault01" name="id_user" value=<?php echo $_SESSION['id'];?> required>
			         </div>
			         <div class="col-md-6 mb-3">
			            <input type="hidden" class="form-control" id="validationDefault02" name="id_service"
			            value=<?php echo $resultat['id'];?> required>
			         </div>
			        </div>
			        <div class="form-row">
			         <div class="col-md-6 mb-3">
			            <label for="validationDefault01">Nombre de personne</label>
			            <input type="text" class="form-control" id="validationDefault01" name="number_of_person" required>
			         </div>
			         <div class="col-md-6 mb-3">
			            <label for="validationDefault01">Date</label>
			            <input type="date" class="form-control" id="validationDefault01" name="date_arrival" required>
			         </div>
			        </div>
			        <div class="form-row">
			         <div class="col-md-12 mb-3">
			            <label for="validationDefault01">prix</label>
			            <input type="text" class="form-control" id="validationDefault01" name="price" required>
			         </div>
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		        	<button type="submit" class="btn btn-primary">Reserver</button>
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