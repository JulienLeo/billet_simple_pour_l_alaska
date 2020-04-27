<?php

    $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $_SESSION['token'] = $token;

    if(isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if($_SESSION['token'] == $_POST['token']) {

        }
    } else {
        echo 'Erreur';
    }