<?php 
	include '../hautDePage.php';
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);//on le fait en Get pck c'est l'administrateur mais c'est une faille de securité 
	$nom = htmlspecialchars($_GET['nom']);
	$prenom = htmlspecialchars($_GET['prenom']);
?>

<div class="col-4">
	<h3>Voulez vous vraiment supprimer cet utilisateur ? </h3>
	<p>
		<?php echo $id ;?><br>
		<?php echo $nom ;?><br>
		<?php echo $prenom ;?>
	</p>
	<form method="POST">
		<button class="btn btn-success" type="submit" name="supprimer">OUI</button>
		<a href="../pages/clients.php" class="btn btn-secondary">NON</a>
	</form>
</div>

<?php include '../basDePage.php'; ?>
<?php 
	//on verifie que la requete 'supprimer' a bien été faite puis il spprime l'utilisateur qui possède l'id envoyé
	if (isset($_POST['supprimer'])) {
		$req = $bdd->prepare('DELETE FROM users WHERE id = ?');
		$req->execute(array($id));
		header('Location: ../pages/clients.php');
	}
 ?>