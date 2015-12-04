<?php


require_once('connexionBDD.php');



try {
    if ($_POST) { 
        
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    // trim supprime les espaces en début et en fin de chaîne de caractères

    if( filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) ) {
	$password = password_hash($password, PASSWORD_DEFAULT);
    
       
        $stmt = $db->prepare("INSERT INTO membres (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute(array($_POST["nom"], $_POST["prenom"], $_POST["email"], $password)); // on peut reprendre directement la variable $password

    }
    }// fin du if
} catch(PDOException $ex) {
    echo $ex->getMessage(); // debug
} // fin du catch

if(isset($_POST["go"]) ) {// "go" est le name du bouton
    
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);
    
    $message_erreur = "";

    if( empty($_POST["nom"]) ) {
        //      echo "le champ nom est obligatoire !!!!<br/>";
        $message_erreur .- "le champ nom est obligatoire !!!!<br/>";
    }

    if( empty($_POST["prenom"]) ) {
        //      echo "Le champ prenom est obligatoire !!!!<br/>";
        $message_erreur .- "le champ prenom est obligatoire !!!!<br/>";
    }


    if( empty($_POST["email"]) ) {
        //      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "le champ email est obligatoire !!!!<br/>";
    }

    if( empty($_POST["password"]) ) {
        //      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "le champ password est obligatoire !!!!<br/>";
    }

session_start();
    
}



?>
<!DOCTYPE html>


<html>

    <head>
        <title>Formulaire dinscription</title>
    </head>

    <body>
    
    <?php
        if (isset($_SESSION["user"])) {
            echo "Bonjour " . $_SESSION["user"]["prenom_nom"];
        }
    ?>
       
       
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="nom" value="<?= (isset($nom)) ? $nom : '' ?>"><br/><!-- permet en cas d'erreur que la saisie reste en place -->
            <input type="text" name="prenom" placeholder="prenom" value="<?= (isset($prenom)) ? $prenom : '' ?>"><br/>
            
            <input type="email" name="email" placeholder="email" value="<?= (isset($email)) ? $email : '' ?>"><br/>
            <input type="password" name="password" placeholder="password" value="<?= (isset($password)) ? $password : '' ?>"><br/>
            
            <input type="submit" name="go" value="S'inscrire">
            <a href="deconnexion.php">Déconnexion</a>
        </form>

    </body>

</html>