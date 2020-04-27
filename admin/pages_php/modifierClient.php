<?php 
	include '../../config.php';

	$id = htmlspecialchars($_GET['id']);

	$req = $bdd->prepare('SELECT * FROM users WHERE id=?');
	$req->execute(array($id));
	$userinfo = $req->fetch();

		//
	if (isset($_POST['neWrole']) AND $_POST['neWrole'] != $userinfo['role']) {
		$req = $bdd->prepare('UPDATE users SET role=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWrole'], $id));
	}
	if (isset($_POST['neWlastName']) AND $_POST['neWlastName'] != $userinfo['lastName']) {
		$req = $bdd->prepare('UPDATE users SET lastName=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWlastName'], $id));
	}
	if (isset($_POST['neWfirstName']) AND $_POST['neWfirstName'] != $userinfo['firstName']) {
		$req = $bdd->prepare('UPDATE users SET firstName=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWfirstName'], $id));
	}
	if (isset($_POST['neWemail']) AND $_POST['neWemail'] != $userinfo['email']) {
		$req = $bdd->prepare('UPDATE users SET email=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWemail'], $id));
	}
	if (isset($_POST['neWaddress']) AND $_POST['neWaddress'] != $userinfo['address']) {
		$req = $bdd->prepare('UPDATE users SET address =? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWaddress'], $id));
	}
	if (isset($_POST['neWpostCode']) AND $_POST['neWpostCode'] != $userinfo['postCode']) {
		$req = $bdd->prepare('UPDATE users SET  postCode=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWpostCode'], $id));
	}
	if (isset($_POST['neWcity']) AND $_POST['neWcity'] != $userinfo['city']) {
		$req = $bdd->prepare('UPDATE users SET city =? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWcity'], $id));
	}
	if (isset($_POST['neWcountry']) AND $_POST['neWcountry'] != $userinfo['country']) {
		$req = $bdd->prepare('UPDATE users SET country =? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWcountry'], $id));
	}
	if (isset($_POST['neWphoneNumber']) AND $_POST['neWphoneNumber'] != $userinfo['phoneNumber']) {
		$req = $bdd->prepare('UPDATE users SET phoneNumber =? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWphoneNumber'], $id));
	}

	header('Location: ../pages/clients.php');
 ?>