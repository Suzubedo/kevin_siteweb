<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST" action="../pages_php/ajouterentreprise.php">
				<br>
				<h3 align="center">Ajouter une entreprise</h3>
				<br>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault01">Nom de l'entreprise</label>
			      <input type="text" class="form-control" id="validationDefault01" name="businessName">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault02">Numéro de siret</label>
			      <input type="text" class="form-control" id="validationDefault02" name="siretNumber">
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			  		<label for="#">Adresse</label>
			  		<textarea class="form-control" id="#" name="address"></textarea>
			  	</div>
			  	<div class="col-md-6 mb-3">
			      <label for="validationDefault05">Code Postale</label>
			      <input type="text" class="form-control" id="validationDefault05" name="postCode">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault03">Ville</label>
			      <input type="text" class="form-control" id="validationDefault03" name="city">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Pays</label>
			      <input type="text" class="form-control" id="#" name="country">
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			      <label for="#">Email</label>
			      <input type="email" class="form-control" id="#" name="email">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Numero de téléphone</label>
			      <input type="text" class="form-control" id="#" name="phoneNumber">
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="#">Mot de passe</label>
			      <input type="password" class="form-control" id="#" name="password">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Secteur d'activité</label>
			      <select name="activity" class="form-control">
             		 <option>Restaurant</option>
      				<option>Hôtel</option>
      				<option>Transport</option>
      				<option>Bar</option>
            </select>
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