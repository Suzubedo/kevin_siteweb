<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>

		<div class="col-9 row">

			<div class="col-6"><br>
				<h4 align="center">Ajouter une image</h4>
				<form method="POST" action="../pages_php/imageGestion.php">
		      		<div class="form-group">
		      			<label class="control-label">Type : </label>
		      			<select class="form-control" name="type">
		      				<option>image</option>
		      			</select>
		      		</div>
		      		<div class="form-group">
		      			<label class="control-label">Id service</label>
		      			<input type="number" class="form-control" name="id_service" required>
		      		</div>
		      		<div class="form-group">
		      			<label class="control-label">Url Image</label>
		      			<textarea name="url_image" class="form-control" rows="3" required></textarea>
		      		</div>
		      		<button type="submit" class="btn btn-primary" name="sendImage" data-dismiss="modal">Envoyer</button>
		      	</form>
			</div>
			<br>
			<div class="col-12 row">
				<?php //faire un while pour pouvoir parcourir le tableau et afficher l'integralité du contenu
					$req = $bdd->query('SELECT * FROM gallery WHERE type = "image"');
					while ($img = $req->fetch()){
				 ?>
				<div class="col-4">
					<a href="#" type="button" data-toggle="modal" data-target=<?php echo '#id'.$img['id']; ?>>
						<img style="width: 100%" src=<?php echo $img['url_image']; ?>>
					</a>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target=<?php echo '#id'.$img['id']; ?>>
					  Supprimer
					</button>
				</div>


				<!-- Modal -->
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id=<?php echo 'id'.$img['id']; ?>>
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <img style="width: 100%" src=<?php echo $img['url_image']; ?>>
				      </div>
				      <div class="modal-footer">
				      	<form method="POST" action="../pages_php/imageGestion.php?id=<?php echo $img['id'];?>">
					      	<button type="submit" name="deleteImg" class="btn btn-danger">Supprimer</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				      	</form>
				      </div>
				    </div>
				  </div>
				</div>

				<?php }$req->closeCursor();?> <!--fermer la requete*/-->

			</div>
		</div>

	</div>

<?php include '../basDePage.php'; ?>