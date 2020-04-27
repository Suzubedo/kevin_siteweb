<?php
    require('../../config.php');

    if(isset($_POST['sendFormRegister'])){
            $role = 'entreprise';
            $businessName = htmlspecialchars($_POST['businessName']);
            $siretNumber = htmlspecialchars($_POST['siretNumber']);
            $email = htmlspecialchars($_POST['email']);
            $address = htmlspecialchars($_POST['address']);
            $postCode = htmlspecialchars($_POST['postCode']);
            $city = htmlspecialchars($_POST['city']);
            $country = htmlspecialchars($_POST['country']);
            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $password = htmlspecialchars(sha1($_POST['password']));
            $activity = htmlspecialchars($_POST['activity']);

            $mailKey = md5(microtime(TRUE)*100000);
            $mailVerif = 0;
            $lastName = 'null';
            $firstName = 'null';

    
    //permet de verifier si l'utilisateur à déjà un compte.
    $verifEmail =  $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $verifEmail->execute(array($email));
    $mailExist = $verifEmail->rowCount();

    if($mailExist == 0) {

//créer un utilisateur et le rajoute dans la base de donnée
        $insertUser = $bdd->prepare('INSERT INTO users(role, businessName, siretNumber, email, address, postCode, city, country, phoneNumber, password, activity, lastName, firstName, mailKey, mailVerif) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertUser->execute(array($role, $businessName, $siretNumber,  $email, $address, $postCode, $city, $country, $phoneNumber, $password, $activity, $lastName, $firstName, $mailKey, $mailVerif));
       header('Location: ../pages/entreprise.php')

    } else {
        echo "cet email est deja utilisé";
        
            } 
                                   
    }    
?>