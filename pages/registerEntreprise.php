<div class="modal fade" id="registerEntreprise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscription entreprise</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<form method="POST" action="../pages_php/registerEntreprise.php">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault01">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="validationDefault01" name="businessName" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault02">Numéro de siret</label>
            <input type="number" class="form-control" id="validationDefault02" name="siretNumber" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="#">Email</label>
            <input type="email" class="form-control" id="#" name="email" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="#">Confirmer l'email</label>
            <input type="email" class="form-control" id="#" name="emailConfirm" required>
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
            <label for="#">Numero de téléphone</label>
            <input type="text" class="form-control" id="#" name="phoneNumber" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="#">Confirmation de numero de téléphone</label>
            <input type="text" class="form-control" id="#" name="phoneNumberConfirm" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="#">Mot de passe</label>
            <input type="password" class="form-control" id="#" name="password" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="#">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="#" name="passwordConfirm" required>
          </div>
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
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              <a href=''>Accepter les conditions générales d'utilisation</a>
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="sendFormRegister">S'inscrire</button>
        <br><br>
      </form>

       </div>
	<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>