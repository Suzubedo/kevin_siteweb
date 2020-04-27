<?php 
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);

	$req = $bdd->prepare('SELECT * FROM service WHERE id=?');
	$req->execute(array($id));
	$serviceInfo = $req->fetch();

		//
	if (isset($_POST['neWname']) AND $_POST['neWname'] != $serviceInfo['name']) {
		$req = $bdd->prepare('UPDATE service SET name=? WHERE id=?');//modifie le nom du service qui possede cette id 
		$req->execute(array($_POST['neWname'], $id));
	}
	if (isset($_POST['neWprice']) AND $_POST['neWprice'] != $serviceInfo['price']) {
		$req = $bdd->prepare('UPDATE service SET price=? WHERE id=?');//modifie le prix du service qui possede cette id 
		$req->execute(array($_POST['neWprice'], $id));
	}
	if (isset($_POST['neWdescription']) AND $_POST['neWdescription'] != $serviceInfo['description']) {
		$req = $bdd->prepare('UPDATE service SET description=? WHERE id=?');//modifie la description du service qui possede cette id 
		$req->execute(array($_POST['neWdescription'], $id));
	}
	if (isset($_POST['neWid_entreprise']) AND $_POST['neWid_entreprise'] != $serviceInfo['id_entreprise']) {
		$req = $bdd->prepare('UPDATE service SET id_entreprise=? WHERE id=?');//modifie le nom du service qui possede cette id 
		$req->execute(array($_POST['neWid_entreprise'], $id));
	}


	header('Location: ../pages/service.php');
 ?>