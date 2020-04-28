<?php 
	session_start();
	include '../config.php';

	if (isset($_POST['login'])) { //isset verifie !!!
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars(sha1($_POST['password']));


		//verification de la taille
		if (strlen($email) <= 255 AND strlen($password) <= 255) {

			//verifie que l'email et le mot de passe existe donc on prepare la requête ...
			$req = $bdd->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
			$req->execute(array($email, $password));

			//recupere le nombre d'utilisateur ayant cet email et ce mdp(integrer) 
			$userinfo = $req->rowCount();
			if ($userinfo == 1) {
				// recupere tout les informations lié à cet utilisateur sous forme de tableau  
				$userinfo = $req->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['lastName'] = $userinfo['lastName'];
				$_SESSION['email'] = $userinfo['email'];
				$_SESSION['firstName'] = $userinfo['firstName'];
				$_SESSION['mailVerif'] = $userinfo['mailVerif'];

				if ($userinfo['role'] == 'client') {
					header("Location: ../index.php");

				} else if ($userinfo['role'] == 'entreprise') {
					header("Location: ../pages/entreprise.php");

					} else{
					$error = "connexion impossible : vérifier vos informations";
					header("Location: ../pages/connexion.php?error=$error");
					}
				} else{
					$error = "adresse email ou mot de passe trop long";
					header("Location: ../pages/connexion.php?error=$error");
				}
			}
		}
 ?>
 
