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
	if (isset($_POST['neWbusinessName']) AND $_POST['neWbusinessName'] != $userinfo['businessName']) {
		$req = $bdd->prepare('UPDATE users SET businessName=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWbusinessName'], $id));
	}
	if (isset($_POST['neWsiretNumber']) AND $_POST['neWsiretNumber'] != $userinfo['siretNumber']) {
		$req = $bdd->prepare('UPDATE users SET siretNumber=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWsiretNumber'], $id));
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
	if (isset($_POST['neWactivity']) AND $_POST['neWactivity'] != $userinfo['activity']) {
		$req = $bdd->prepare('UPDATE users SET activity=? WHERE id=?');//modifie le nom du user qui possede cette id 
		$req->execute(array($_POST['neWactivity'], $id));
	}

	header('Location: ../pages/entreprise.php');
 ?>