<?php

    require 'vendor/autoload.php';
    require 'controller/frontend.php';
    require 'model/TwigExtensions.php';

    

    $page = 'home';

    // Routeur
    if (isset($_GET['action'])) {
        $page = $_GET['action'];
    }

    // Récupération des chapitres dans la base de données 
    $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', ''); // instance de PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // alerte si la requête échoue
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view/frontend');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Extension());
    $twig->addGlobal('current_page', $page);

    switch ($page) {
        
        case 'home' : 
            echo $twig->render('home.php', ['navList' => listChapters(), 'chapters' => listChapters()]);
            break;


        case 'chapter' :
            echo $twig->render('chapterView.php', ['navList' => listChapters(), 'chapter' => chapter($_GET['id']), 'comments' => listComments($_GET['id'])]);
            break;
        
        case 'addComment' : 
            addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
            echo $twig->render('chapterView.php', ['chapter' => chapter($_GET['id']), 'navList' => listChapters(), 'comments' => listComments($_GET['id'])]);
            break;
        
        case 'reportComment' : 
            alertComment($_POST['commentId']);
            echo $twig->render('chapterView.php', ['chapter' => chapter($_POST['id']), 'navList' => listChapters(), 'comments' => listComments($_POST['id'])]);
            break;
            
        case 'author' : 
            echo $twig->render('authorView.php', ['navList' => listChapters()]);
            break;
        
        case 'admin' :
            echo $twig->render('signInView.php');
            break;
        
        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.php');
            break;
    }   