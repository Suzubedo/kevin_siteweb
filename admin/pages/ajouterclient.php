<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST" action="../pages_php/ajouterclient.php">
				<br>
				<h3 align="center">Ajouter un client</h3>
				<br>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault01">Nom</label>
			      <input type="text" class="form-control" id="validationDefault01" name="lastName" required>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault02">Prenom</label>
			      <input type="text" class="form-control" id="validationDefault02" name="firstName" required>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			  		<label for="#">Adresse</label>
			  		<textarea class="form-control" id="#" name="address" required></textarea>
			  	</div>
			  	<div class="col-md-6 mb-3">
			      <label for="validationDefault05">Code Postale</label>
			      <input type="text" class="form-control" id="validationDefault05" name="postCode" required>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault03">Ville</label>
			      <input type="text" class="form-control" id="validationDefault03" name="city" required>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Pays</label>
			      <input type="text" class="form-control" id="#" name="country" required>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			      <label for="#">Email</label>
			      <input type="email" class="form-control" id="#" name="email" required>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Numero de téléphone</label>
			      <input type="text" class="form-control" id="#" name="phoneNumber" required>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-12">
			      <label for="#">Mot de passe</label>
			      <input type="password" class="form-control" id="#" name="password" required>
			    </div>
			  </div>
			    <div class="col-md-12"><br></div>
			  <button class="btn btn-primary" name="sendFormRegister" type="submit">Ajouter</button>
			  <br><br>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>

<?php include '../basDePage.php'; ?>