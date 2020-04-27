<?php 
	include '../../config.php';
	$id = htmlspecialchars($_GET['id']);
	if (isset($_POST['websiteName'])) {
		$req = $bdd->prepare('UPDATE information SET websiteName = ? WHERE id = ?');
		$req->execute(array($_POST['websiteName'], $id));
		header('Location: ../pages/info.php');
	}
	if (isset($_POST['email'])) {
		$req = $bdd->prepare('UPDATE information SET email = ? WHERE id = ?');
		$req->execute(array($_POST['email'], $id));
		header('Location: ../pages/info.php');
	}
	if (isset($_POST['phoneNumber'])) {
		$req = $bdd->prepare('UPDATE information SET phoneNumber = ? WHERE id = ?');
		$req->execute(array($_POST['phoneNumber'], $id));
		header('Location: ../pages/info.php');
	}
	if (isset($_POST['linkLogo'])) {
		$req = $bdd->prepare('UPDATE information SET linkLogo = ? WHERE id = ?');
		$req->execute(array($_POST['linkLogo'], $id));
		header('Location: ../pages/info.php');
	}

 ?>

