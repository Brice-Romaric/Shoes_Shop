<?php
session_start();
if(empty($_SESSION))
{
    header('Location:identification.php');
}
if(!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array(); 
}
?> 
<?php
require "head.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .principale{
            display: flex;
            justify-content: space-around;     
        }
    .vuepanier{
        display: flex;
        /*border: 2px solid #ccc; */  
    }
    .vuepanierImage {
        padding:10px 20px;
            max-width: 40%;
            height: auto;
            margin-bottom: 5px;
        }
    .vuepanierImage img{
        max-width: 70%;
        height: auto;
        margin-bottom: 5px;
    }
    .vuepanierDescription {
        padding:30px;
        height: auto;
        margin-bottom: 5px;    
    }

    form {
        width: 300px;
        text-align: center;
        /*border: 1px solid #ccc;*/
        padding: 10px;
    }
input[type="number"],input[type="text"],input[type="tel"]{
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom:10px;
}
input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>

<body>  
<?php
$detailcommandes="";
    if (isset($_POST['idproduit']) && !empty($_POST['idproduit'])) {
        $idproduit = $_POST['idproduit'];
        $nomproduit = $_POST['nomproduit'];
        $prixproduit = $_POST['prixproduit'];
        $imageproduit = $_POST['imageproduit'];
        $quantite = $_POST['quantite'];
        $taille = $_POST['taille'];
        $totalproduit=($quantite)*($prixproduit);

        if(isset($_SESSION['panier'][$idproduit][$taille] )) {
            $_SESSION['panier'][$idproduit][$taille]['quantite']=$_SESSION['panier'][$idproduit][$taille]['quantite']+($quantite);
            $_SESSION['panier'][$idproduit][$taille]['totalproduit']=($_SESSION['panier'][$idproduit][$taille]['quantite'])*($prixproduit);
        } 
        else {     
            $_SESSION['panier'][$idproduit][$taille] = array(
                'quantite' => $quantite,
                'nomproduit' => $nomproduit,
                'prixproduit' => $prixproduit,
                'imageproduit' => $imageproduit,
                'totalproduit' => $totalproduit,
                'idproduit' => $idproduit,
                'taille' => $taille,
            );         
        }
        echo  '<script type="text/javascript">';
        echo "alert('Ajout au panier reussie');";
        echo  ' </script> ';
    }
?>

<div  class="principale">
    <div  class="vuepanier">   
        <div class="vuepanierImage">
            <?php 
            foreach ($_SESSION as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $idproduit => $produit) {
                        foreach ($produit as $taille => $details) {
                echo '<img src="'. $_SESSION["panier"][$idproduit][$taille]["imageproduit"].'"><br/><br/><br/>';
                        }
                    }
                }
            }
            ?>
        </div>  

        <div  class="vuepanierDescription">
            <?php 
            $prixGlobal=0;
                foreach ($_SESSION as $key => $value) {
                    if (is_array($value)) {
                        foreach ($value as $idproduit => $produit) {
                            foreach ($produit as $taille => $details) {
                                echo "  nom:".$_SESSION['panier'][$idproduit][$taille]['nomproduit']."<br/><br/>";
                                echo "  taille:".$_SESSION['panier'][$idproduit][$taille]['taille']."<br/><br/>";
                                echo "  prix:" .$_SESSION['panier'][$idproduit][$taille]['prixproduit']." MAD "."<br/><br/>";
                                echo " QTE:".$_SESSION['panier'][$idproduit][$taille]['quantite']."<br/><br/>";
                                echo "Total: ".$_SESSION['panier'][$idproduit][$taille]['totalproduit']. " MAD<br/><br/><br/><br/><br/>";
                                $prixGlobal=($prixGlobal)+($_SESSION['panier'][$idproduit][$taille] ['totalproduit']);

                                $detailcommandes .= " " . $_SESSION['panier'][$idproduit][$taille]['nomproduit']. " taille: " .   
                                $_SESSION['panier'][$idproduit][$taille]['taille']. " QTE: " .
                                $_SESSION['panier'][$idproduit][$taille]['quantite'];
                            }
                        }
                    }
                }
          ?>
        </div>
    </div>
    <?php
    if(empty($detailcommandes)){
        echo  '<script type="text/javascript">';
        echo "alert('pas de produits dans le panier');";
        echo "window.location.href = 'produits.php';"; 
        echo  ' </script> '; 
        $conn->close();
        exit();
    }
    ?>
    <div  class="resumeCommande">
    <h2 style="text-align:center">Ma commande</h2>
        <form action="" method="post">
            <span>Total: </span> <span> <?php echo $prixGlobal . " MAD"?></span> <br><br>
            <input type="tel" name="telephone" placeholder="telephone"  required/>
            <input type="text" name="adresse" placeholder="lieu de livraison" required />
            <input type="hidden" name="detailcom" value="<?php echo $detailcommandes?>"/>
            <input type="hidden" name="nomclient"  value="<?php echo $_SESSION["nom"] ?> "/>
            <input type="hidden" name="prenomclient"  value=" <?php echo $_SESSION["prenom"] ?>"/>
            <input type="hidden" name="mailclient"  value="<?php echo $_SESSION["mail"] ?> "/>
            <input type="submit" name="valider" value="valider commande"/>
        </form>
    </div>
</div>
<br><br>
</body>
</html>

<?php
require ("databaseConnection.php");
if (isset($_POST['valider']) && !empty($_POST['valider'])) {

    $telephone= htmlspecialchars(trim($_POST['telephone']) );
    $adresse= htmlspecialchars(trim($_POST['adresse']) );
    $detailcom= htmlspecialchars(trim($_POST['detailcom']) );
    $mailclient= htmlspecialchars(trim($_POST['mailclient']) );
    $nomclient= htmlspecialchars(trim($_POST['nomclient']) );
    $prenomclient= htmlspecialchars(trim($_POST['prenomclient']) );

    $q1="INSERT INTO commandes (nomClient,prenomClient,mailClient,adresse,tel,detailsCommande) 
    VALUES ('$nomclient','$prenomclient','$mailclient','$adresse','$telephone','$detailcom')";
 if($conn->query($q1)==TRUE){
    echo  '<script type="text/javascript">';
    echo "alert('commande validée');";
    echo "window.location.href = 'accueil.php';"; 
    echo  ' </script> '; 
    unset($_SESSION['panier']);
    }
    $conn->close();
}
?>

<?php
require "footer.php"
?>