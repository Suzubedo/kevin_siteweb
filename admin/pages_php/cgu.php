<?php 
	include '../../config.php';

	if (isset($_POST['cguContent'])) {
		$id = htmlspecialchars($_GET['id']);
		$cguContent = htmlspecialchars($_POST['cguContent']);

		$req = $bdd->prepare('UPDATE cgu SET cguContent=? WHERE id=?');
		$req->execute(array($cguContent, $id));
		header('Location: ../pages/cgu.php');
	}

 ?>
 