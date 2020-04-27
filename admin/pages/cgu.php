<?php 
	include '../../config.php';
	$req = $bdd->query('SELECT * FROM cgu');
	$cgu = $req->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/main.js"></script>

	<!-- BBCode -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
	<link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
	<script>
	$(document).ready(function() {
		let wbbOpt = {
			buttons: "bold,italic,underline,|,fontcolor,fontsize,|,justifyleft,justifycenter,justifyright,|,img,link,|,code,quote"
		}
		$("#editor").wysibb(wbbOpt);
		});
	</script>

</head>
<body>
	<div class="row">
		<?php include 'navigation.php'; ?>
		<div class="col-9">
			<form method="POST" action="../pages_php/cgu.php?id=<?php echo $cgu['id'];?>">
				<textarea id="editor" rows="20" name="cguContent"><?php echo $cgu['cguContent'];?></textarea><br>
				<button class="btn btn-primary" type="submit">Mettre à jour les CGU</button>
			</form>
		</div>
	</div>
</body>
</html>
