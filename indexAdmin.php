<?php

    require 'vendor/autoload.php';
    require 'controller/admin_frontend.php';
    require 'model/TwigExtensions.php';

    ob_start();

    $page = 'admin';

    // Routeur
    if (isset($_GET['p'])) {
        $page = $_GET['p'];
    }

    // Récupération des chapitres dans la base de données 
    $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', ''); // instance de PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // alerte si la requête échoue
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view/admin');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Extension());

    switch ($page) {
        case 'admin' : 
            echo $twig->render('admin.php');
            break;
        
        case 'addChapter' : 
            echo $twig->render('addChapter.php'/*, ['chapter' => addChapter()]*/);
            break;

        case 'adminListChapters' : 
            echo $twig->render('adminListChapters.php', ['chaptersAdmin' => listChaptersAdmin()]);
            break;

        case 'modifyChapter' : 
            echo $twig->render('modifyChapter.php', ['chapter' => chapterAdmin() /*'editedChapter' => editChapter()*/]); // + listChapters()
            break;

        case 'editChapter' : 
            echo $twig->render('editChapter.php', ['edited' => modifyChapterAdmin()]);
            break;

        case 'deleteChapter' : 
            echo $twig->render('deleteChapter.php', ['delete' => removeChapterAdmin()]);
            break;

        case 'adminComments' : 
            echo $twig->render('adminComments.php'/*, ['adminComments' => adminComments()]*/);
            break;

        case 'authorPage' : 
            echo $twig->render('authorPage.php'/*, ['authorPage' => adminAuthor()]*/);
            break;
            
        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.php');
            break;
    }


// ob_get_clean(); 