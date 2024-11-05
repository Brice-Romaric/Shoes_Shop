<?php
session_start();
?> 
<?php
require "head.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
           .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            width: 300px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Nos Produits</h1>
    <?php
    require ("databaseConnection.php");
    $requete = "SELECT * FROM produits";
    $res = $conn->query($requete);

    if ($res->num_rows > 0) { 
        echo '<div class="product-container">';
         while ($row = $res->fetch_assoc()) {  
            echo '<div class="product">'; 
                    echo '<a href="detailsproduit.php?id=' . $row["idproduit"] . '">';
                    echo '<img src="'. $row["imageproduit"] .'" alt="' . $row["nomproduit"] . '"></a>';
                    echo'<p>'. $row["prixproduit"]. ' MAD</p>';
                    echo'<p><strong>'.$row["nomproduit"].'</strong></p>';            
            echo '</div>'; 
         }
        echo '</div>';
    } else {
        echo "Aucun produit trouvé dans la base de données.";
    }
    $conn->close();
    ?><br><br>
</body>
</html>
    <?php
    require "footer.php"
    ?>