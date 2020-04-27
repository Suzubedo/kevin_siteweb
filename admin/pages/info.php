<?php 
	include '../hautDePage.php';
	include '../../config.php';

	$req = $bdd->query('SELECT * FROM information');
	$info = $req->fetch();
?>

	
	<div class="row">
		<?php include 'navigation.php'; ?>
		<div class="col-9 row">
			<div class="col-12">
				<form class="col-6" method="POST" action="../pages_php/info.php?id=<?php echo $info['id'];?>"><br>
					<input class="form-control" type="text" name="websiteName" required value=<?php echo $info['websiteName'];?>><br>
					<input class="form-control" type="email" name="email" required value=<?php echo $info['email'];?>><br>
					<input class="form-control" type="number" name="phoneNumber" required value=<?php echo $info['phoneNumber'];?>><br>
					<button class=" btn btn-primary" type="submit">Mettre à jour</button>
				</form><br>
			</div>
			<div class="col-12 logo">
				<img width="400" height="250" src=<?php echo $info['linkLogo']; ?>><br><br>
				<form method="POST" action="../pages_php/info.php?id=<?php echo $info['id'];?>">
					<textarea class="form-control col-6" rows="4" name="linkLogo" required>
						<?php echo $info['linkLogo']; ?>
					</textarea><br>
					<button type="submit" class="btn btn-primary">Mettre à jour le logo</button>
				</form>
			</div>
			
		</div>
	</div>

<?php include '../basDePage.php'; ?>