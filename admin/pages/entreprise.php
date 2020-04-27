<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>
		<div class="col-9">
			<br>
			<a href="ajouterentreprise.php" class="btn btn-primary">Ajouter une entreprise</a><br><br>
			<div class="row">
				<input type="text" class="form-control col-6" id="findField" size="20" placeholder="Saisir le nom d'une entreprise"/>
    			<button onclick="FindNext ();" class="col-2 btn btn-secondary" >Rechercher</button>
			</div>
			<h3 align="center">Liste des Entreprise</h3>

			<?php 
				//requete pour récupérer la liste de tout les utilisateurs
				$req = $bdd->query('SELECT * FROM users WHERE role = "entreprise" ORDER BY date DESC');
				while ($entreprise = $req->fetch()){
			?>

			<button class="accordion"><?php echo $entreprise['businessName']; ?></button>
			<div class="panel">
			  <p>
			  	<em>ID : </em><?php echo $entreprise['id']; ?><br>
			  	<em>Numero de siret : </em><?php echo $entreprise['siretNumber']; ?><br>
			  	<em>Email : </em><?php echo $entreprise['email']; ?><br>
			  	<em>Numero de télélphone : </em><?php echo $entreprise['phoneNumber']; ?><br>
			  	<em>Adresse : </em><?php echo $entreprise['address']; ?><br>
			  	<em>Code postale : </em><?php echo $entreprise['postCode']; ?><br>
			  	<em>Ville : </em><?php echo $entreprise['city']; ?><br>
			  	<em>Pays : </em><?php echo $entreprise['country']; ?><br>
			  	<em>Secteur d'activité : </em><?php echo $entreprise['activity']; ?><br>
			  	<!--<em>Mot de passe : </em><?php echo $entreprise['password']; ?><br>
			  	<em>Date : </em><?php echo date_format($entreprise['date'], 'd-m-Y'); ?><br>-->
			  </p>

			  <a href="modifierEntreprise.php?id=<?php echo $entreprise['id'];?>" class="btn btn-info" class="btn btn-info">Modifier cette entreprise</a>
			  <a href="../pages_php/supprimerEntreprise.php?id=<?php echo $entreprise['id'];?>&businessName=<?php echo $entreprise['businessName'];?>" class="btn btn-danger">Supprimer cette entreprise</a>

			</div>

			<?php }$req->closeCursor();?> <!--fermer la requete*/-->

		</div>
	</div>

<?php include '../basDePage.php'; ?>
<style type="text/css">
	.accordion {
	  background-color: #eee;
	  color: #444;
	  cursor: pointer;
	  padding: 18px;
	  width: 100%;
	  border: none;
	  text-align: left;
	  outline: none;
	  font-size: 15px;
	  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 25px;
  display: none;
  background-color: white;
  overflow: hidden;
}

</style>
