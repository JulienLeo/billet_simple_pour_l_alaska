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
            echo $twig->render('addChapter.php');
            break;

        case 'addedChapter' :
            addChapterAdmin(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['img_url']));
            echo $twig->render('addedChapter.php');
            break;

        case 'adminListChapters' : 
            echo $twig->render('adminListChapters.php', ['chaptersAdmin' => listChaptersAdmin()]);
            break;

        case 'modifyChapter' : 
            echo $twig->render('modifyChapter.php', ['chapter' => chapterAdmin()]); // + listChaptersAdmin()
            break;

        case 'editChapter' : 
            modifyChapterAdmin($_GET['id'], htmlspecialchars($_POST['modifyChapterTitle']), htmlspecialchars($_POST['chapterText']));
            echo $twig->render('editedChapter.php', ['chapter' => chapterAdmin()]);
            break;

        case 'deleteChapter' : 
            echo $twig->render('deletedChapter.php', ['delete' => removeChapterAdmin()]);
            break;

        case 'adminComments' : 
            echo $twig->render('adminComments.php'/*, ['adminComments' => adminComments()]*/);
            break;
        
        case 'adminListChaptersComments' : 
            echo $twig->render('adminListChaptersComments.php', ['chaptersComments' => listChaptersAdmin()]);
            break;

        case 'adminListReportedComments' : 
            echo $twig->render('adminListReportedComments.php', ['reportedComments' => reportedCommentsAdmin()]);
            break;

        case 'adminChapterComments' : 
            echo $twig->render('adminChapterComments.php', ['chapter' => chapterAdmin(), 'chapterComments' => commentsAdmin()]);
            break;

        case 'adminChapterComment' :
            echo $twig->render('adminChapterComment.php', ['chapter' => chapterAdmin(), 'comment' => commentAdmin()]);
            break;
        
        case 'editComment' : 
            modifyCommentAdmin($_GET['id'], $_POST['commentText'], NULL);
            echo $twig->render('editedComment.php');
            break;
        
        case 'deleteComment' : 
            echo $twig->render('deletedComment.php', ['delete' => removeCommentAdmin()]);
            break;

        case 'authorPage' : 
            echo $twig->render('authorPage.php'/*, ['authorPage' => adminAuthor()]*/);
            break;
        
        case 'signIn' : 
            signingIn($_POST['username'], $_POST['password']);
            echo $twig->render('admin.php');
            break;
            
        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.php');
            break;
    }


// ob_get_clean(); 