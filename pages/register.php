<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>nom du site</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../css/enregistrement.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
</head>
<body>

    <header class="tete">
		<a href="../index.php"><img src="../img/logo.png" width="110px" height="100px"></a>

		<nav>
			<ul>
				<?php  
					//include 'config.php';
					//verifie si la session existe 
					if (isset($_SESSION['email'])) {
						/*$req = $bdd->prepare('SELECT * FROM users WHERE id = ?');
						$req->execute(array($_SESSION['id']));
						$session = $req->fetch();*/
					?>
					<li><a href="../pages_php/logOut.php">Deconnexion</a></li>
					<li><a href="#"><?php echo $_SESSION['firstName']; ?></a></li>
				<?php } else { ?>
					<li><a href="connexion.php">Connexion</a></li>
					<li><a href="register.php">Inscription</a></li>

				<?php } ?>
					<li><a href="cgu.php">CGU</a></li>
			</ul>
		</nav>

		<div class="bg-2"></div>
		<div class="bg-1"></div>
	</header>

	<div class="container-fluid">
		<div class="row register">

		<!--//recupere le msg dans l'url et afficher le message d'erreur dans la page -->
		<div class="col-md-2">      
			<?php
				if (isset($_GET['error'])){
				$error = htmlspecialchars($_GET['error']);
				echo '<div style="background-color: grey; color:white">'.$error.'</div>';
				}
			?>
	    </div>

		<div class="boite">

			<!-- Button trigger modal -->
			<button type="button" class="" data-toggle="modal" data-target="#registerClient"><h2>Inscription client</h2></button>

			<button type="button" class="" data-toggle="modal" data-target="#registerEntreprise"><h2>Inscription entreprise</h2></button>

			<!-- Modal client -->
			<?php include 'registerClient.php'; ?>

			<!--modal entreprise -->
			<?php include 'registerEntreprise.php'; ?>

		</div>

	</div>



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>