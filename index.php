<?php

    require 'vendor/autoload.php';
    require 'controller/frontend.php';
    require 'controller/admin_frontend.php';
    require 'model/TwigExtensions.php';

    $page = 'home';

    // Routeur
    if (isset($_GET['action'])) {
        $page = $_GET['action'];
    }

    


    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view/frontend');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Extension());
    $twig->addGlobal('current_page', $page);

    // VARIABLES FRONTEND
    $frontEnd = new FrontEnd();
    $listNav = $frontEnd->listChapters();
    $listHome = $frontEnd->listChapters();

    switch ($page) {
        
        case 'home' : 
            echo $twig->render('home.php', ['navList' => $listNav, 'chapters' => $listHome]);
            break;

        case 'chapter' :
            $chapter = $frontEnd->chapter($_GET['id']);
            $postedComments = $frontEnd->listComments($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments]);
            break;
        
        case 'nextChapter' :
            $nextChapter = $frontEnd->nextChapter($_GET['id']);
            $chapter = $frontEnd->chapter($_GET['id']);
            $postedComments = $frontEnd->listComments($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments]);
            break;
        
        case 'addComment' :
            $addComment = $frontEnd->addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
            $postedComments = $frontEnd->listComments($_GET['id']);
            $chapter = $frontEnd->chapter($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments]);
            break;
        
        case 'reportComment' : 
            $chapter = $frontEnd->chapter($_GET['id']);
            $reportComment = $frontEnd->alertComment($_GET['id'], $_POST['commentId']);
            $postedComments = $frontEnd->listComments($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments]);
            break;
            
        case 'author' : 
            echo $twig->render('authorView.php', ['navList' => $listNav]);
            break;
        
        case 'admin' :
            echo $twig->render('signInView.php');
            break;

        case 'logOut' : 
            $logOut = $frontEnd->logOut();
            echo $twig->render('home.php', ['navList' => $listNav, 'chapters' => $listHome]);
            break;
        
        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.php', ['navList' => $listNav]);
            break;
    }   