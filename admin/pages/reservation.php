<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>
		<div class="col-9">
			<br>
			<a href="ajouterReservation.php" class="btn btn-primary">Ajouter une réservation</a><br><br>
			<div class="row">
				<input type="text" class="form-control col-6" id="findField" size="20" placeholder="Saisir un nom ou un prenom"/>
    			<button onclick="FindNext ();" class="col-2 btn btn-secondary">Rechercher</button>
			</div>
			<br>
			<h3 align="center">Liste des réservations</h3>

			<?php 
				//requete pour récupérer la liste de toutes les réservations
				$req = $bdd->query('SELECT * FROM reservation ORDER BY date DESC');
				while ($reservation = $req->fetch()){

					$q = $bdd->prepare('SELECT * FROM service WHERE id = :x');
					$q->execute(array('x' =>$reservation['id_service'])); 

					while ($serviceInfo = $q->fetch()) {

						$w = $bdd->prepare('SELECT * FROM users WHERE id = :x');
						$w->execute(array('x' =>$reservation['id_client']));
						 
						while ($clientInfo = $w->fetch()) {
					
			?>

			<button class="accordion"><?php echo $clientInfo['firstName']; ?> <?php echo $clientInfo['lastName']; ?></button>
			<div class="panel">
			  <p>
			  	<em>ID : </em><?php echo $reservation['id']; ?><br>
			  	<em>Nombre de personnes : </em><?php echo $reservation['number_of_person']; ?><br>
			  	<em>Date d'arrivée : </em><?php echo $reservation['date_arrival']; ?><br>
			  	<em>Date de retour : </em><?php echo $reservation['date_return']; ?><br>

			  	<em>Nom du service : </em><?php echo $serviceInfo['name']; ?><br>
			  	<em>Type : </em><?php echo $serviceInfo['type']; ?><br>
				<em>Prix : </em><?php echo $serviceInfo['price']; ?><br>
				<em>Description : </em><?php echo $serviceInfo['description']; ?><br>

				<em>Email : </em><?php echo $clientInfo['email']; ?><br>
				<em>Numero de téléphone</em><?php echo $clientInfo['phoneNumber']; ?><br>
			  </p>

			  <a href="modifierReservation.php?id=<?php echo $reservation['id'];?>" class="btn btn-info" class="btn btn-info">Modifier cet utilisateur</a>
			  <a href="../pages_php/supprimerReservation.php.php?id=<?php echo $reservation['id'];?>&nom=<?php echo $client['lastName'];?>&prenom=<?php echo $client['firstName'];?>" class="btn btn-danger">Supprimer cet utilisateur</a>

			</div>
			<?php 
				}$w->closeCursor();
				}$q->closeCursor();
			 	}$req->closeCursor();
			 ?> <!--fermer la requete*/-->

		</div>
	</div>

