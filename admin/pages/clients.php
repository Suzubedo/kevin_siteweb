<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>
		<div class="col-9">
			<br>
			<a href="ajouterclient.php" class="btn btn-primary">Ajouter un utilisateur</a><br><br>
			<div class="row">
				<input type="text" class="form-control col-6" id="findField" size="20" placeholder="Saisir un nom ou un prenom"/>
    			<button onclick="FindNext ();" class="col-2 btn btn-secondary" >Rechercher</button>
			</div>
			<h3 align="center">Liste des clients</h3>

			<?php 
				//requete pour récupérer la liste de tout les utilisateurs
				$req = $bdd->query('SELECT * FROM users WHERE role = "client" ORDER BY date DESC');
				while ($client = $req->fetch()){
			?>

			<button class="accordion"><?php echo $client['firstName']; ?> <?php echo $client['lastName']; ?></button>
			<div class="panel">
			  <p>
			  	<em>ID : </em><?php echo $client['id']; ?><br>
			  	<em>Email : </em><?php echo $client['email']; ?><br>
			  	<em>Numero de télélphone : </em><?php echo $client['phoneNumber']; ?><br>
			  	<em>Adresse : </em><?php echo $client['address']; ?><br>
			  	<em>Code postale : </em><?php echo $client['postCode']; ?><br>
			  	<em>Ville : </em><?php echo $client['city']; ?><br>
			  	<em>Pays : </em><?php echo $client['country']; ?><br>
			  	<!--<em>Mot de passe : </em><?php echo $client['password']; ?><br>
			  	<em>Date : </em><?php echo date_format($client['date'], 'd-m-Y'); ?><br>-->
			  </p>

			  <a href="modifierClient.php?id=<?php echo $client['id'];?>" class="btn btn-info" class="btn btn-info">Modifier cet utilisateur</a>
			  <a href="../pages_php/supprimerClient.php?id=<?php echo $client['id'];?>&nom=<?php echo $client['lastName'];?>&prenom=<?php echo $client['firstName'];?>" class="btn btn-danger">Supprimer cet utilisateur</a>

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
