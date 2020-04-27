<?php
    require('../../config.php');

    if(isset($_POST['sendFormRegister'])){
            $role = 'client';
            $lastName = htmlspecialchars($_POST['lastName']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $postCode = htmlspecialchars($_POST['postCode']);
            $city = htmlspecialchars($_POST['city']);
            $country = htmlspecialchars($_POST['country']);
            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $password = htmlspecialchars(sha1($_POST['password']));

            $businessName = 'null';
            $siretNumber = 1;
            $activity = 'null';
            $mailKey = md5(microtime(TRUE)*100000);
            $mailVerif = 0;

    
    //permet de verifier si l'utilisateur à déjà un compte.
    $verifEmail =  $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $verifEmail->execute(array($email));
    $mailExist = $verifEmail->rowCount();

    if($mailExist == 0) {

//créer un utilisateur et le rajoute dans la base de donnée
        $insertUser = $bdd->prepare('INSERT INTO users(role, lastName, firstName, email, address, postCode, city, country, phoneNumber, password, businessName, siretNumber, activity, mailKey, mailVerif) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertUser->execute(array($role, $lastName, $firstName, $email, $address, $postCode, $city, $country, $phoneNumber, $password, $businessName, $siretNumber, $activity, $mailKey, $mailVerif));
        header("Location: ../pages/clients.php");

    } else {
        echo "cet email est deja utilisé";
        
            } 
                                   
    }    
?>