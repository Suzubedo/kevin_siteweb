<?php 
session_start();
	include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>nom du site</title>
	<meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://kit.fontawesome.com/5691792ff1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



   <script>
// $(function() {
//    var availableTags = [
//      "Paris",
//      "Madrid",
//      "Barcelone",
//      "Marseille",
//      "Varsovie",
//      "Berlin",
//      "Clojure",
//      "COBOL",
//      "ColdFusion",
//      "Erlang",
//      "Fortran",
//      "Groovy",
//      "Haskell",
//      "Java",
//      "JavaScript",
//      "Lisp",
//      "Perl",
//      "PHP",
//      "Python",
//      "Ruby",
//      "Scala",
//      "Scheme",
//    ];
//    $("#tags").autocomplete({
//    source: availableTags, 
//
//    });
//  } );
  </script>


</head>
<body>

	<header class="tete">
		<a href="index.php"><img src="img/logo.png" width="110px" height="100px"></a>

		<nav>
			<ul>
				<li><a href="pages/cgu.php">CGU</a></li>
				<?php  
					include 'config.php';
					//verifie si la session existe 
					if (isset($_SESSION['email'])) {
						/*$req = $bdd->prepare('SELECT * FROM users WHERE id = ?');
						$req->execute(array($_SESSION['id']));
						$session = $req->fetch();*/
					?>
					<li><a href="test.php"><?php echo $_SESSION['firstName']; ?></a></li>
					<li><a href="pages_php/logOut.php">Deconnexion</a></li>
					<li>
						<div class="btn-group">
						 
						    <i class="fas fa-align-justify text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
						  
						  <div class="dropdown-menu bg-success">
						    <a class="dropdown-item" href="profil.php">Mon profil</a>
						    <a class="dropdown-item" href="#">Mes Reservations</a>
						    <a class="dropdown-item" href="#">Favoris</a>
						  </div>
						</div>
					</li>
				<?php } else { ?>
					<li><a href="pages/connexion.php">Connexion</a></li>
					<li><a href="pages/register.php">Inscription</a></li>

				<?php } ?>
					
			</ul>
		</nav>

		<div class="bg-2"></div>
		<div class="bg-1"></div>
	</header>

	<main class="recherche">
			<form method="GET">
				<input class="recherche_p" name="q" type="text" placeholder="Rechercher une ville" id="tags">
				<button type="submit" class="recherche_p" value="Rechercher"><img src="SVG/loupe.svg" width="40px" height="40px"></button>
			</form>
			<script>

			<?php
				// Récupération des villes
				$req_get_ville = $bdd->prepare('SELECT city FROM service;');
				$req_get_ville->execute();
				$result = $req_get_ville->fetchAll();
			?>

				//Traduction de la réponse de la BDD en json
				var liste2 = <?php echo json_encode($result); ?>;
				var liste = [];
				
			
				//Création de la liste des villes existantes en testant l'unicité 
				liste2.forEach(function(city) {
				if(liste.indexOf(city.city) == -1) {
					liste.push(city.city);
}
				})

				$('#tags').autocomplete({
					source : liste,
					minLength : 1
				});

			</script>
	</main>

		<?php 
		 	if (isset($_GET['q'])) {
		 		$q = htmlspecialchars($_GET['q']);
				if ($q == "do a barrel roll")
				{
?>
				<script>
				  var doABarrelRoll = function(){var a="-webkit-",b='transform:rotate(1turn);',c='transition:4s;';document.head.innerHTML+='<style>body{'+a+b+a+c+b+c};
				  doABarrelRoll();
				  </script>
<?php
				}
				else
				{
					$req = $bdd->prepare('SELECT * FROM service WHERE city =?');
					$req->execute(array($q));
					$result = $req->fetch();

					if ($result) {
		?> 

	 <div class="maboite">
	 	<div>
	 		<div>
	 			<a href="pages/transport.php?city=<?php echo $result['city'];?>"><h3>Transports</h3></a>
	 			<a href="pages/transport.php?city=<?php echo $result['city'];?>"><img src="img/transports.jpg"></a>
	 		</div>
	 	</div>

	 	<div>
	 		<div>
	 			<a href="pages/hotel.php?city=<?php echo $result['city'];?>"><h3>Hôtels</h3></a>
	 			<a href="pages/hotel.php?city=<?php echo $result['city'];?>"><img src="img/hotels.jpg"></a>
	 		</div>
	 	</div>

	 	<div>
	 		<div>
		 		<a href="pages/restaurant.php?city=<?php echo $result['city'];?>"><h3>Restaurants</h3></a>
		 		<a href="pages/restaurant.php?city=<?php echo $result['city'];?>"><img src="img/restaurants.jpg"></a>
	 		</div>
	 	</div>

	 	<div>
	 		<div>
	 			<a href="pages/bar.php?city=<?php echo $result['city'];?>"><h3>Bars</h3></a>
	 			<a href="pages/bar.php?city=<?php echo $result['city'];?>"><img src="img/bars.png"></a>
	 		</div>
	 	</div>
	 </div>

		 <?php } else { ?> 

		<div class="maboite">
			<div>
				<div class="nope">
	 				<a href="index.php"><h3>Aucun resultat pour <?php echo $q; ?></h3></a>
	 				<a href="pages/bar.php?city=<?php echo $result['city'];?>"><img src="img/nope.png"></a>
	 			</div>
	 		</div>
		</div>

		<?php }}} ?>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	</body>
</html

