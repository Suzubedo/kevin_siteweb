<?php 
	include '../hautDePage.php';
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);

	$req = $bdd->prepare('SELECT * FROM users WHERE id=?');
	$req->execute(array($id));
	$userinfo = $req->fetch();
?>

		<div class="col-md-8">
			<form method="POST" action="../pages_php/modifierEntreprise.php?id=<?php echo $userinfo['id']; ?>">
				<br>
				<h3 align="center">Modifier les infromation de cette entreprise</h3>
				<br>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label>Rôle</label>
						<select class="form-control" name="neWrole">
							<option>entreprise</option>
							<option>client</option>
							<option>admin</option>
						</select>
					</div>
				</div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Nom de l'entreprise</label>
			      <input type="text" class="form-control" name="neWbusinessName" value=<?php echo $userinfo['businessName']; ?> >
			    </div>
			    <div class="col-md-6 mb-3">
			      <label>Numéro de siret</label>
			      <input type="text" class="form-control" name="neWsiretNumber" value=<?php echo $userinfo['siretNumber']; ?>>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Email</label>
			      <input type="email" class="form-control" name="neWemail" value=<?php echo $userinfo['email']; ?>>
			    </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			  		<label>Adresse</label>
			  		<textarea class="form-control" name="neWaddress"><?php echo $userinfo['address']; ?></textarea>
			  	</div>
			  	<div class="col-md-6 mb-3">
			      <label>Code Postale</label>
			      <input type="text" class="form-control" name="neWpostCode" value=<?php echo $userinfo['postCode']; ?>>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Ville</label>
			      <input type="text" class="form-control" name="neWcity" value=<?php echo $userinfo['city']; ?>>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label>Pays</label>
			      <input type="text" class="form-control" name="neWcountry" required value=<?php echo $userinfo['country']; ?>>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Numero de téléphone</label>
			      <input type="text" class="form-control" name="neWphoneNumber" reuired value=<?php echo $userinfo['phoneNumber']; ?>>
			    </div>
			    <div>
			      <label>Secteur d'activité</label>
			      <select name="neWactivity">
			      	<option>Hôtel</option>
			      	<option>Restaurant</option>
			      	<option>Transport</option>
			      	<option>Bar</option>
			      </select>
			    </div>
			</div>
			<div class="col-md-6 mb-3">
			  <button type="submit" class="btn btn-primary" name="modifier">Mettre à jour</button>
			</div>
			  <br><br>
			</form>
		</div>

<?php include '../basDePage.php'; ?>