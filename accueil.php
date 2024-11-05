<?php
session_start();
?> 
<?php
require "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBRO'S</title>
    <link rel="stylesheet" href="accueil.css">  
</head>
<body>
  <main>
        <section id="presentation">
          <div class="slideshoesContenaire">
            <div class="shoes ">
              <a href="produits.php" > <img src="img/imageChaussure1.jpeg"  alt="Image 2"> </a>
            </div>
            <div class="shoes ">
              <a href="produits.php" > <img src="img/imageChaussure2.jpg"  alt="Image 1"> </a>
            </div><div class="shoes ">
              <a href="produits.php" > <img src="img/imageChaussure3.jpg" alt="Image 3"> </a>
            </div>
            <div class="shoes ">
              <a href="produits.php" > <img src="img/imageChaussure4.jpg" alt="Image 4"> </a>
            </div>
          </div>
          <script src="accueil.js" defer></script>
        </section>
        <div style="background-color:antiquewhite; text-align: center;"><h1><strong>AVEC VOUS, PLUS PROCHE DE VOUS</strong></h1> </div>

        <section id="services">
          <div id="servicesDiv">
                <div  style="color:white ;padding: 30px; border-right:2px solid white;">
                      <ul style="list-style: none;"> 
                            <li><img src="img/paiement.svg"  alt=""></li>
                            <li><strong>Paiement cash</strong></li>
                            <li>à la livraison</li>
                      </ul>
                </div>  
                <div  style="color:white;padding: 30px;border-right:2px solid white;">
                      <ul style="list-style: none;">
                          <li><img src="img/livraison.svg"  alt=""></li>
                          <li><strong>Livraison partout</strong></li>
                          <li>à partir de 100dh</li>
                      </ul>
                </div>  
                <div  style="color:white;padding: 30px;border-right:2px solid white;">
                      <ul style="list-style: none;">
                      <li><img src="img/shop.svg"  alt=""></li>
                          <li><strong>Retrait gratuit</strong></li>
                          <li>en magasin</li>
                      </ul>
                </div>  
                <div  style="color:white;padding: 30px;border-right:2px solid white;">
                      <ul style="list-style: none;">
                          <li><img src="img/echange.svg"  alt=""></li>
                          <li><strong>Echange</strong></li>
                          <li>et  remboursement</li>
                      </ul>
                </div>  
                <div style="color:white;padding: 30px;">
                      <ul style="list-style: none;">
                        <li><img src="img/garanti.svg"  alt=""></li>
                        <li><strong>Garantie de 1 an</strong></li>
                        <li>sur tous les produits</li>
                      </ul>
                </div>
          </div>
        </section>
           <div style="background-color:antiquewhite; text-align: center;"><h1><strong>OFFRES ALLECHANTES</strong></h1> </div>     

        <section id="TypeProduits">
          <div id="TypeProduitsDiv">
                <div  style="color:white ;background-color: rgb(210, 66, 9); border-radius:7px;">
                      <ul style="list-style: none;">
                            <li><h2>HOMMES</h2></li> 
                            <li> <a href="produits.php"> <img src="img/imageChaussure2.jpg"  alt="shoes homme" width="100%" height="400"/></a></li> 
                      </ul>
                </div>  
                <div  style="color:white;background-color: rgb(210, 66, 9); border-radius:7px;">
                      <ul style="list-style: none;">
                          <li><h2>FEMMES</h2></li>
                          <li> <a href="produits.php"> <img src="img/imageChaussure3.jpg"  alt="shoes femme" width="100%" height="400"/> </a> </li>
                      </ul>
                </div>  
                <div  style="color:white;background-color: rgb(210, 66, 9); border-radius:7px;">
                      <ul style="list-style: none;">
                        <li><h2>ENFANTS</h2></li>
                        <li> <a href="produits.php"> <img src="img/imageChaussure4.jpg"  alt="shoes enfant" width="100%" height="400" /> </a> </li> 
                      </ul>
                </div>             
          </div>
        </section>
        <div style="background-color:antiquewhite; text-align: center;"><h1><strong>OFFRES ALLECHANTES</strong></h1> </div>     
  </main>
</body>
</html>
<?php
require "footer.php";
?>
       