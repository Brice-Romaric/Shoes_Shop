<?php
session_start();
?> 
<?php
require "head.php";
?>  
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBRO'S</title>
    <link rel="stylesheet" href="forms.css">
</head>
<body>
    
<div class="formCl"> 
        <form action="" method="POST">  
            <label for="mailIden">Mail</label><br><br>
            <input type="email" name="mailIden" id="mailIden" required/> <br><br>
            <label for="mdpIden">Mot de Passe</label><br><br>
            <input type="password" name="mdpIden" id="mdpIden" required/><br><br> 
            <input type="submit" value="se connecter" name="submitIden">
        </form>
        _________________________ou__________________________
        <p>Vous n'avez pas de compte?<a href="inscription">S'inscrire</a></p>
    </div>
    <br><br> <br><br> 
</body>
</html>

<?php
    require ("databaseConnection.php");

    if (isset($_POST['submitIden'])) {
       $mailIden=$_POST['mailIden'];
       $pswdIden=$_POST['mdpIden'];
            $search="SELECT * FROM clients WHERE email = '$mailIden'";
        $res=$conn->query($search);
        if ($res->num_rows ===1){
            while ($row = $res->fetch_assoc()){        
            if (password_verify($pswdIden, $row['mot_de_passe'])){
                    $_SESSION["mail"]=$mailIden;           
                    $_SESSION["id"]=$row['id'];
                    $_SESSION["nom"]=$row['nom'];
                    $_SESSION["prenom"]=$row['prenom'];
                    echo  '<script type="text/javascript">';
                    echo "alert('connexion réussie!Bienvenue');";
                    echo "window.location.href = 'accueil.php';";
                    echo  ' </script> ';
                    $conn->close();
                exit;
            }
            else{ echo  '<script type="text/javascript">';
                echo "alert('mot de passe incorect');";
                echo  ' </script> ';
                $conn->close();
            }
        }   
        }
        else {
            echo  '<script type="text/javascript">';
            echo "alert('email inexistant');";
            echo  ' </script> ';
            $conn->close();
        }
    }
?>

<?php
require "footer.php";
?>