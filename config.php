<?php
try
{ 
	$bdd = new PDO('mysql:host=localhost:3306;dbname=siteannuel', 'my_user', 'my_password'); 
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>
