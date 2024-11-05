<?php
session_start();
if(empty($_SESSION))
{
    echo  '<script type="text/javascript">';
    echo "alert('Veuillez-vous connecter!');";
    echo "window.location.href = 'identification.php';";
    echo  ' </script> '; 
    
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
    .product-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;        
        }
    form {
        width: 300px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
    }
input[type="number"]{
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
require ("databaseConnection.php");
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $requete = "SELECT * FROM produits WHERE idproduit=$id ";
    $res = $conn->query($requete);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        echo '<div class="product-container">';

             echo '<div>';
                echo '<img src="' . $row["imageproduit"] . '" alt="' . $row["nomproduit"] . '">';
             echo '</div>';

             echo '<div  class="product">';
                echo '<h1>Détails du produit : ' . $row["nomproduit"] . '</h1>'; 
                echo '<p style="font-weight:bold">Prix : ' . $row["prixproduit"] . ' MAD</p><br>';
                echo '<form action="panier.php" method="post">';
                    echo '<input type="number" name="taille" placeholder="taille"  min="30" max="50" required/>';
                    echo '<input type="number" name="quantite" placeholder="quantité" min="1" required/>';
                    echo '<input type="hidden" name="idproduit" value="' . $row["idproduit"] . '">';
                    echo '<input type="hidden" name="nomproduit" value="' . $row["nomproduit"] . '">';
                    echo '<input type="hidden" name="prixproduit" value="' . $row["prixproduit"] . '">';
                    echo '<input type="hidden" name="imageproduit" value="' . $row["imageproduit"] . '">';
                    echo '<input type="submit" name="add"value="Ajouter au panier">';
                echo '</form>';
             echo '</div>';

        echo '</div>';
    }
}
$conn->close();
?>

<br><br>
</body>
</html>

<?php
require "footer.php"
?>