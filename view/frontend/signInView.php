<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Administration du site de Jean Forteroche</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div class="signInContainer">
            <div class="websiteLinkDiv">
                <a class="websiteLink" href="index.php?p=home"><i class="fas fa-arrow-circle-left"></i> Retour sur le site</a>
            </div>
            <div class="signInDiv">
                <form action="">
                    <div class="usernameDiv">
                        <input type="text" id="username" name="username" placeholder="ID"/>
                    </div>
                    <div class="passwordDiv">
                        <input type="text" id="password" name="password" placeholder="Code"/>
                    </div>
                    <div class="validAdmin">
                        <input type="submit" id="validAdminButton" value="Valider"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<!--CONDITION A METTRE AU BON ENDROIT-->
<?php
    if (isset($_POST['username']) AND $_POST['username'] == 'username' AND isset($_POST['password']) AND $_POST['password'] == 'password') {
        // PAGE A TELECHARGER
        // indexAdmin.php OU admin.php
    } else {
        echo 'Impossible de se connecter';
        // OU PAGE D'IMPOSSIBILITE DE CONNEXION
    }