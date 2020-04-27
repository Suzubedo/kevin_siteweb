<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>

		<div class="col-9">
			<br>
			<a href="ajouterservice.php" class="btn btn-primary">Ajouter un service</a><br><br>
			<div class="row">
				<input type="text" class="form-control col-6" id="findField" size="20" placeholder="Saisir un nom de serviece"/>
    			<button onclick="FindNext ();" class="col-2 btn btn-secondary" >Rechercher</button>
			</div>
		<div class="col-9">
			<h3 align="center">Liste des services</h3>
		<?php 
				//requete pour récupérer la liste de tout les utilisateurs
				$req = $bdd->query('SELECT * FROM service ORDER BY date DESC');
				while ($serviceInfo = $req->fetch()){

					$q = $bdd->prepare('SELECT * FROM users WHERE id = :x');
					$q->execute(array('x' =>$serviceInfo['id_entreprise'])); 
					while ($entrepriseInfo = $q->fetch()) {
						
					
			?>
			<button class="accordion"><?php echo $serviceInfo['name']; ?></button>
			<div class="panel">

			  <p>
			  	<em>ID : </em><?php echo $serviceInfo['id']; ?><br>
			  	<em>Type : </em><?php echo $serviceInfo['type']; ?><br>
				<em>Prix : </em><?php echo $serviceInfo['price']; ?><br>
				<em>Description : </em><?php echo $serviceInfo['description']; ?><br>

				<em>Nom de l'entreprise : </em><?php echo $entrepriseInfo['businessName']; ?><br>
				<em>Email : </em><?php echo $entrepriseInfo['email']; ?><br>
				<em>Numero de téléphone</em><?php echo $entrepriseInfo['phoneNumber']; ?><br>
			  </p>

			  <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=<?php echo '#id'.$serviceInfo['id'];?>>
			  Modifier ce service
			</button>

			<button type="button" class="btn btn-danger" data-toggle="modal" data-target=<?php echo '#idDelete'.$serviceInfo['id'];?>>
			  Supprimer ce service
			</button>

			  <!-- Modal -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id=<?php echo 'id'.$serviceInfo['id'];?>>
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modifier un service</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="POST" action="../pages_php/modifierService.php?id=<?php echo $serviceInfo['id']; ?>">
						<br>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Name</label>
								<input type="text" class="form-control" name="neWname" value=<?php echo $serviceInfo['name']; ?>>
							</div>
							<div class="col-md-6 mb-3">
							    <label>Prix</label>
							    <input type="text" class="form-control" name="neWprice" value=<?php echo $serviceInfo['price']; ?>>
							</div>
							</div>
							<div class="form-row">
						    <div class="col-md-6 mb-3">
						    	<label>Description</label>
						        <input type="text" class="form-control" name="neWdescription" value=<?php echo $serviceInfo['description']; ?>>
						    </div>
						    <div class="col-md-6 mb-3">
						        <label>Id entreprise</label>
						        <input type="text" class="form-control" name="neWid_entreprise" value=<?php echo $serviceInfo['id_entreprise']; ?>>
						    </div>
						    </div>
						    <button type="submit" class="btn btn-primary" name="modifier">Mettre à jour</button>
					  		<br><br>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			        <button type="button" class="btn btn-primary">Modifier</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal --> <!-- pour la pop-up supprimer -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id=<?php echo 'idDelete'.$serviceInfo['id'];?>>
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Supprimer ce service</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        Voulez vous vraiment supprimer ce service ?
			        
			      </div>
			      <div class="modal-footer">
			        <form method="POST" action="../pages_php/supprimerService.php?id=<?php echo $serviceInfo['id'];?>">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			        	<button type="submit" class="btn btn-danger" name="deleteService">Supprimer</button>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>

			</div>

			<?php 
				}$q->closeCursor();
				}$req->closeCursor();
			 ?>
		</div>	
	</div>

<?php include '../basDePage.php'; ?>