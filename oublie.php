<?php
    // connexion à la BDD
    // vérification de l'email : est-il dans la table membres
    // si oui alors on envoie un mail à cette personne
    // si non, on ne fait rien

    // la construction du mail
    // génération d'un token (jeton) : chaîne de caratères 
    // $token = md5(uniqid(rand()), true);
    // récupérer l'identifiant du membre (son id)

    // table jetons (id du membres, token)
    // insertion de l'id et du jeton/token
    // envoie du mail (lien : mot_de_passe_oublie.php?id=X&token=XXXXXX)

    // création d'une page mot_de_passe_oublie.php
    // on vérifie que les id et token sont dans la bases de données
    // si oui, on propose à l'utilisateur un formulaire pour ressaisir son password (+ confirmation du password)


?>


<!DOCTYPE html>
<html lang="en">

    <head>

	    <title>Réinitialisation du mot de passe</title>

    </head>

    <body>

        <form method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="submit" name="go" value="Valider">
        </form>

    </body>

</html>