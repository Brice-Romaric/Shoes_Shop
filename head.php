<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBRO'S</title>
    <link rel="stylesheet" type="text/css" href="head.css">
    <script src="index.js" defer></script>
  </head>
<body>
<?php
?>
  <header>
    <div id="headerfirstdiv">
        <div id="headerseconddiv">
            <img id="logo" src="img/cupcake4.jpg" alt="logo" height="70px" width="70px"/>
        </div>
        <div id="headerthirddiv">
            <ul>
                <li><a href="accueil.php">Accueil |</a></li>
                <li><a href="produits.php">Produits |</a></li>
                <li><a href="contact.php">Contact |</a></li>
                <?php
                    if(!empty($_SESSION)){
                     echo "<li><a href='deconnexion.php'>Se deconnecter |</a></li>";
                     echo "<li><a href='panier.php'>voir panier</a></li>";
                    }
                    else{
                      echo "<li><a href='identification.php'>Se connecter </a></li>";
                    }        
                ?>              
            </ul> 
        </div>        
    </div>
      <div id="title"> <h1><strong>OBRO'S </strong></h1> </div>
      
  </header>
</body>
</html>     