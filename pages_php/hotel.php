<?php 
	include '../config.php';

	if (isset($_POST['sendForm'])) {
		$city = htmlspecialchars($_GET['city']);
		$id_client = htmlspecialchars($_POST['id_client']);
		$id_service = htmlspecialchars($_POST['id_service']);
		$number_of_person = htmlspecialchars($_POST['number_of_person']);
		$date_arrival = htmlspecialchars($_POST['date_arrival']);
		$date_return = htmlspecialchars($_POST['date_return']);

		$verifReservation = $bdd->prepare('SELECT * FROM reservation WHERE id_service = ? AND id_client = ?');
		$verifReservation->execute(array($id_service, $id_client));
		$result = $verifReservation->rowCount();

		if ($result != 1) {
			$req = $bdd->prepare('INSERT INTO reservation(number_of_person, date_arrival, date_return, id_service, id_client) VALUES(?, ?, ?, ?, ?)');
			$req->execute(array($number_of_person, $date_arrival, $date_return, $id_service, $id_client));
			header('Location: ../pages/hotel.php?city='.$city);
		} else{
			echo "Cette réservation a déjà été éffectuée";
		}
	}		
?>