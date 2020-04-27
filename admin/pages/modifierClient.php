<?php 
	include '../hautDePage.php';
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);

	$req = $bdd->prepare('SELECT * FROM users WHERE id=?');
	$req->execute(array($id));
	$userinfo = $req->fetch();
?>

		<div class="col-md-8">
			<form method="POST" action="../pages_php/modifierClient.php?id=<?php echo $userinfo['id']; ?>">
				<br>
				<h3 align="center">Modifier les infromations de cet utilisateur</h3>
				<br>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label>Rôle</label>
						<select class="form-control" name="neWrole">
							<option>client</option>
							<option>entreprise</option>
							<option>admin</option>
						</select>
					</div>
				</div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Nom</label>
			      <input type="text" class="form-control" name="neWlastName" value=<?php echo $userinfo['lastName']; ?> >
			    </div>
			    <div class="col-md-6 mb-3">
			      <label>Prenom</label>
			      <input type="text" class="form-control" name="neWfirstName" value=<?php echo $userinfo['firstName']; ?>>
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
			      <input type="text" class="form-control" name="neWcountry" value=<?php echo $userinfo['country']; ?>>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label>Numero de téléphone</label>
			      <input type="text" class="form-control" name="neWphoneNumber" value=<?php echo $userinfo['phoneNumber']; ?>>
			    </div>
			  <button type="submit" class="btn btn-primary" name="modifier">Mettre à jour</button>
			  <br><br>
			</form>
		</div>

<?php include '../basDePage.php'; ?>