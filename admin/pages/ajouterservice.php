<?php 
	include '../hautDePage.php';
	include '../../config.php';
?>

	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST" action="../pages_php/ajouterservice.php">
				<br>
				<h3 align="center">Ajouter un service</h3>
				<br>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault01">Nom du service</label>
			      <input type="text" class="form-control" id="validationDefault01" name="name">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="validationDefault02">Description</label>
			      <input type="text" class="form-control" id="validationDefault02" name="description">
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			  		<label for="#">Prix</label>
			  		<textarea class="form-control" id="#" name="price"></textarea>
			  	</div>
			  	<div class="col-md-6 mb-3">
			      <label for="validationDefault05">Ville</label>
			      <input type="text" class="form-control" id="validationDefault05" name="city">
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="col-md-6 mb-3">
			      <label for="validationDefault05">ID de l'entrerprise</label>
			      <input type="text" class="form-control" id="validationDefault05" name="id_entreprise">
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="#">Type de service</label>
			      <select name="type" class="form-control">
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