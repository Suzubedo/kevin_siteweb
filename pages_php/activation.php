<?php 
	include '../config.php';

	$mail = htmlspecialchars($_GET['mail']);
	$mailKey = htmlspecialchars($_GET['cle']);

	$req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
	$req->execute(array($mail));
	$verifUser = $req->fetch();

	if ($mailKey == $verifUser['mailKey']) {
		$mailVerif = 1;
		$q = $bdd->prepare('UPDATE users SET mailVerif = ? WHERE email = ?');
		$q->execute(array($mailVerif, $mail));
		echo 'Votre email a été vérifié veillez vous '.'<a href="../pages/connexion.php">'.'connecter'.'</a>'.''
	} else{
		echo "l'email envoyé n'a pas été verifié veillez vous réinscrire";
	}
 ?>