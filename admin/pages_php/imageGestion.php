<?php 
	include '../../config.php';

	//ajouter une image
	if (isset($_POST['sendImage'])) {
		$type = htmlspecialchars($_POST['type']);
		$url_image = htmlspecialchars($_POST['url_image']);
		$id_service = htmlspecialchars($_POST['id_service']);

		$url_video = 'none';

		$req = $bdd->prepare('INSERT INTO gallery(type, url_image, id_service, url_video) VALUES(?, ?, ?, ?)');
		$req->execute(array($type, $url_image, $id_service, $url_video));
		header('Location: ../pages/imageGestion.php');
	}
 
     //suppression de l'image 
	if (isset($_POST['deleteImg'])) {
		$id = htmlspecialchars($_GET['id']);
		$req = $bdd->prepare('DELETE FROM gallery WHERE id = ?');
		$req->execute(array($id));
		header('Location: ../pages/imageGestion.php');
	}

	//ajouter une video
	if (isset($_POST['sendVideo'])) {
		$type = htmlspecialchars($_POST['type']);
		$url_video = htmlspecialchars($_POST['url_video']);
		$id_service = htmlspecialchars($_POST['id_service']);

		$url_image = 'none';

		$req = $bdd->prepare('INSERT INTO gallery(type, url_video, id_service, url_image) VALUES(?, ?, ?, ?)');
		$req->execute(array($type, $url_video, $id_service, $url_image));
		header('Location: ../pages/videoGestion.php');
	}
 
     //suppression de l'image 
	if (isset($_POST['deleteVid'])) {
		$id = htmlspecialchars($_GET['id']);
		$req = $bdd->prepare('DELETE FROM gallery WHERE id = ?');
		$req->execute(array($id));
		header('Location: ../pages/videoGestion.php');
	}
 ?>