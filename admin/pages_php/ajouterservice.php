<?php
    require('../../config.php');

    if(isset($_POST['sendFormRegister'])){
            $type = htmlspecialchars($_POST['type']);
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $city = htmlspecialchars($_POST['city']);
            $id_entreprise = htmlspecialchars($_POST['id_entreprise']);
    
    //permet de verifier si l'utilisateur à déjà un compte.
   /* $verifEmail =  $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $verifEmail->execute(array($email));
    $mailExist = $verifEmail->rowCount();

    if($mailExist == 0) {*/

//créer un utilisateur et le rajoute dans la base de donnée
        $insertUser = $bdd->prepare('INSERT INTO service(type, name, description, price, city, id_entreprise) VALUES(?, ?, ?, ?, ?, ?)');
        $insertUser->execute(array($type, $name, $description, $price, $city, $id_entreprise));
       header('Location: ../pages/service.php');

   /* } else {
        echo "ce service existe deja";
        
            } */
                                   
    }    
?>