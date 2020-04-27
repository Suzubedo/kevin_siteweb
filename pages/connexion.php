<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
 </head>
 <body>
    <div class="col-md-2">      
    <?php
      if (isset($_GET['error'])){
      $error = htmlspecialchars($_GET['error']);
      echo '<div style="color:white; position: absolute; bottom: 25%; right: 12%; padding: 5px; font-size:1.2em; text-decoration: underline; text-transform: uppercase;">'.$error.'</div>';
      }
    ?>
    </div>
    <a href="../index.php" id="retour"><img src="../SVG/maison.svg" width="40px" height="40px" color="white"></a>

   	<section class="left_side">
   		<ul>
   			<li></li>
   			<li></li>
   			<li class="img_active"></li>
   		</ul>

   		<div>
   			<img src="../img/logo.png" id="img1" class="deuxieme_position">
   			<img src="../SVG/svg1.svg" width="800px" height="700px" id="img2"class="troisieme_position">   <!-- Images à changer -->
   			<img src="../SVG/svg2.svg" width="800px" height="700px" id="img3" class="premiere_position">    <!-- Images à changer -->
   		</div>
   	</section>



  	<section class="right_side" >

      <h1>Travel'N</h1>
      <h2>Ready to Login</h2>

  		<form method="POST" action="../pages_php/connexion.php">

		    <input type="email" class="" name="email" placeholder="Email" required><img src="">
		    <input type="password" class="" name="password" placeholder="Password" required>
        <button type="submit" class="" name="login" id="bouton">connexion</button>

  		</form>

  	</section>


    <script type="text/javascript" src="../js/connexion.js"></script>




</body>
</html>
