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
            <label for="nomIns">Nom</label><br>
            <input type="text" name="nomIns" id="nomIns"required/><br><br>
            <label for="prenomIns">Prenom</label><br>
            <input type="text" name="prenomIns" id="prenomIns"required/> <br><br>
            <label for="mailIns">Mail</label><br>
            <input type="email" name="mailIns" id="mailIns" required/><br><br>
            <label for="mdpIns">Mot de Passe</label><br>
            <input type="password" name="mdpIns" id="mdpIns"required/><br><br>
            <input type="submit" value="valider" name="submitIns">
        </form>
        _________________________ou__________________________
        <p>Vous avez déjà un compte?<a href="identification.php">Se connecter</a></p>
</div>
<br><br><br><br>
</body>
</html>

<?php
require ("databaseConnection.php");
   if (isset($_POST['submitIns'])) {
    $nomIns= htmlspecialchars(trim($_POST['nomIns']) );
    $prenomIns= htmlspecialchars(trim($_POST['prenomIns']) );
    $mailIns= htmlspecialchars(trim($_POST['mailIns']) );
    $pswdIns= $_POST['mdpIns'];

        $verif1="SELECT email From clients Where email = '$mailIns'";
        $d = $conn->query($verif1);
       
    if($d->num_rows==0)
    {
        $hashpswd = password_hash($pswdIns, PASSWORD_DEFAULT);
        $q1="INSERT INTO clients (nom,prenom,email,mot_de_passe) VALUES ('$nomIns','$prenomIns','$mailIns','$hashpswd')";
            if($conn->query($q1)==TRUE){
                    echo  '<script type="text/javascript">';
                    echo "alert('inscription réussie!');";
                    echo "window.location.href = 'identification.php';"; 
                    echo  ' </script> ';
                    $conn->close();
                  exit;
            }else{
                echo  '<script type="text/javascript">';
                echo "alert('inscription non reussie!');";
                echo  ' </script> ';
                $conn->close();
            }
    }else{
                echo  '<script type="text/javascript">';
                echo "alert('ce compte exite déjà!');";
                echo  ' </script> ';
    }
    $conn->close();
} 
?>

<?php
require "footer.php";
?>