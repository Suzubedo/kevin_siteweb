<?php 
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);
	if (isset($_POST['deleteService'])) {
		$req = $bdd->prepare('DELETE FROM service WHERE id = ?');
		$req->execute(array($id));
		header('Location: ../pages/service.php');
	}
 ?>