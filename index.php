<?php
require_once('connexionBDD.php');

try {

    if(isset($_POST["go"])) {

//                                            $stmt = $db->query("SELECT password, prenom FROM membres WHERE email='".$_POST["email"]."'");
        $stmt = $db->prepare("SELECT * FROM membres WHERE email=?");
        $stmt->execute(array($_POST["email"]));
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//        var_dump($result);

//                                            $db_password = $stmt->fetch();
//                                            print_r($db_password);
//                                            echo "sql : ".$db_password["password"] . "<br/>";
//                                            echo "input : " .password_hash($password, PASSWORD_DEFAULT). "<br/>" ;
                                    //        if(password_verify($password, $db_password["password"])) {
                                    //            
                                    //            echo "password Ok.";
                                    //        } else {
                                    //            echo "password no Ok.";
                                    //        }
        if($result) {
            if (password_verify($_POST["password"], $result["password"])) {
                session_start();
                echo "Bienvenue " . $result["nom"] . "  " . $result["prenom"];
                $_SESSION["user"]["id"] = $result["id"];
                $_SESSION["user"]["prenom_nom"] = $result["prenom"] . "  " . $result["nom"];
            } else {
                echo "Qui es-tu étranger ?";    
            }   
        
    }
    }
    
} catch(PDOException $ex) {



}

?>




<!DOCTYPE html>


<html>

    <head>
        <title>Formulaire de connexion</title>
        <a href="login.php"></a>
    </head>

    <body>
    
      <nav >
        <ul>
            <li><a href="page1.php">page 1</a></li>
            <li><a href="page2.php">page 2</a></li>
            <li><a href="page3.php" >page 3</a></li>

        </ul>
    </nav>
    
    <?php 
        if (isset($_SESSION["user"])) {
            echo "Bonjour " . $_SESSION["user"]["prenom_nom"];
        }
    ?>
       
        <form method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="go" value="Se connecter">
            <a href="deconnexion.php">Déconnexion</a>
        </form>

    </body>




</html>