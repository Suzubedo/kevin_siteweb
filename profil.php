<?php 
session_start();
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon profil</title>
	<meta charset="utf-8">
</head>
<body>
	<div>
		<?php
			$id = $_SESSION['id'];
			$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
			$requser->execute(array($id));
			$userinfo = $requser->fetch();
		 ?>
		<h2>Profil de <?php echo $userinfo['firstName']; ?></h2>
		<div>Email :  <?php echo $userinfo['email']; ?></div>
		<div>Adresse :  <?php echo $userinfo['address']; ?></div>
		<div>Code postal :  <?php echo $userinfo['postCode']; ?></div>
		<div>ville :  <?php echo $userinfo['city']; ?></div>
		<div>Pays :  <?php echo $userinfo['country']; ?></div>
		<div>Numéro de téléphone :  <?php echo $userinfo['phoneNumber']; ?></div>

		<a href="modifierprofil.php">Editer mon profil</a>
		
	</div>
	
</body>
</html>
