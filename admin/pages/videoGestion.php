<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>

		<div class="col-9 row">

			<div class="col-6"><br>
				<h4 align="center">Ajouter une Video</h4>
				<form method="POST" action="../pages_php/imageGestion.php">
		      		<div class="form-group">
		      			<label class="control-label">Type : </label>
		      			<select class="form-control" name="type">
		      				<option>video</option>
		      			</select>
		      		</div>
		      		<div class="form-group">
		      			<label class="control-label">Id service</label>
		      			<input type="number" class="form-control" name="id_service" required>
		      		</div>
		      		<div class="form-group">
		      			<label class="control-label">Url Video</label>
		      			<textarea name="url_video" class="form-control" rows="3" required></textarea>
		      		</div>
		      		<button type="submit" class="btn btn-primary" name="sendVideo" data-dismiss="modal">Envoyer</button>
		      	</form>
			</div>
			<br>
			<div class="col-12 row">
				<?php //faire un while pour pouvoir parcourir le tableau et afficher l'integralité du contenu
					$req = $bdd->query('SELECT * FROM gallery WHERE type = "video"');
					while ($vid = $req->fetch()){
				 ?>
				<div class="col-6">
					<iframe style="width: 100%;" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src=<?php echo $vid['url_video']; ?>></iframe>
					<form method="POST" action="../pages_php/imageGestion.php?id=<?php echo $vid['id']; ?>">
						<button type="submit" class="btn btn-danger" name="deleteVid">Supprimer</button>
					</form>
				</div>


				<?php }$req->closeCursor();?> <!--fermer la requete*/-->

			</div>
		</div>

	</div>

<?php include '../basDePage.php'; ?>