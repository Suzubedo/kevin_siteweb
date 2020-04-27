<?php session_start(); ?>
<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>nom du site</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.css">
</head>
<body>

    <a href="../index.php"><img src="../SVG/maison.svg" alt="logo" height="40px"></a>

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

		<div class="col-md-8">

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerClient">
			  Inscription client
			</button>

			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#registerEntreprise">
			  Inscription entreprise
			</button>

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