<?php
        require('../config.php');

        if(isset($_POST['sendFormRegister'])){
                $role = 'client';
                $lastName = htmlspecialchars($_POST['lastName']);
                $firstName = htmlspecialchars($_POST['firstName']);
                $email = htmlspecialchars($_POST['email']);
                $emailConfirm = htmlspecialchars($_POST['emailConfirm']);
                $address = htmlspecialchars($_POST['address']);
                $postCode = htmlspecialchars($_POST['postCode']);
                $city = htmlspecialchars($_POST['city']);
                $country = htmlspecialchars($_POST['country']);
                $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                $phoneNumberConfirm = htmlspecialchars($_POST['phoneNumberConfirm']);
                $password = htmlspecialchars(sha1($_POST['password']));
                $passwordConfirm = htmlspecialchars(sha1($_POST['passwordConfirm']));

                $businessName = 'null';
                $siretNumber = 1;
                $activity = 'null';
                
                // verification de la taille de la chaîne de caractère
                if (strlen($lastName) <= 255 AND strlen($firstName) <= 255 AND strlen($email) <= 255 AND strlen($address) <= 255 AND strlen($city) <= 255 AND strlen($country) <= 255 AND strlen($password) <= 255) {
                        if ($email == $emailConfirm) {
                                if ($phoneNumber == $phoneNumberConfirm) {
                                        if ($password == $passwordConfirm) {
                                            
                                            //permet de verifier si l'utilisateur à déjà un compte.
                                            $verifEmail =  $bdd->prepare('SELECT * FROM users WHERE email = ?');
                                            $verifEmail->execute(array($email));
                                            $mailExist = $verifEmail->rowCount();

                                            if($mailExist == 0) {

                        //créer un utilisateur et le rajoute dans la base de donnée

                                                //verification par mail
                                                $mailKey = md5(microtime(TRUE)*100000);
                                                $mailVerif = 0;

                                                $insertUser = $bdd->prepare('INSERT INTO users(role, lastName, firstName, email, address, postCode, city, country, phoneNumber, password, businessName, siretNumber, activity, mailKey, mailVerif) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                                $insertUser->execute(array($role, $lastName, $firstName, $email, $address, $postCode, $city, $country, $phoneNumber, $password, $businessName, $siretNumber, $activity, $mailKey, $mailVerif));

                                                $verifUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                                                $verifUser->execute(array($email));
                                                $confirm = $verifUser->rowCount();

                                                if ($confirm == 1 ) {
                                                    $to = $email;
                                                    $subject = "Confirmation d'inscription";
                                                    $txt = "Bienvenue,
 
                                                    Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
                                                    ou copier/coller dans votre navigateur Internet.
                                                     
                                                    http://traveln.site/pages_php/activation.php?mail=".$email."&cle=".urlencode($mailKey)."
                                                    ---------------
                                                    Ceci est un mail automatique, Merci de ne pas y répondre.";//remplacer localhost par le chemin de mon site 
                                                    $headers = "From: travelnconfirmation@gmail.com" . "\r\n" .
                                                    "CC: ".$email;
                                                    mail($to,$subject,$txt,$headers);

                                                    header('Location: ../pages/merci.php');
                                                    /*pages_php/activation.php?mail=<?php echo $email; ?>&cle=<?php echo urlencode($mailKey); ?>*/
                                                }
                                            } else {
                                                $error = "cet email est deja utilisé";
                                                header("Location: ../pages/register.php?error=$error");
                                                    } 
                                        } else {
                                        $error = "vos mots de passe doivent être identique";
                                        header("Location: ../pages/register.php?error=$error");
                                         }
                                    } else {
                                    $error =  "vos numeros de téléphone doivent être identique";
                                    header("Location: ../pages/register.php?error=$error");
                                    }
                                } else {
                                 $error =  "vos adresse email doivent être identique";
                                 header("Location: ../pages/register.php?error=$error");
                               }
                      } else {
                        $error = "Vos informations ne doivent pas dépasser 255 caractères";
                       header("Location: ../pages/register.php?error=$error");
                        }
        }    
?>