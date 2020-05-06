<?php

    require 'vendor/autoload.php';
    require 'controller/admin_frontend.php';
    require 'model/TwigExtensions.php';

    session_start();
    ob_start();

    $page = 'admin';

    // Routeur
    if (isset($_GET['action'])) {
        $page = $_GET['action'];
    } else {
        $page = '';
    }

    // Récupération des chapitres dans la base de données 
    /*$db = new PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', ''); // instance de PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // alerte si la requête échoue
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);*/


    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view/admin');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Extension());

    $adminFrontEnd = new AdminFrontEnd();

    switch ($page) {

        case '' :
            $adminFrontEnd->index();
            echo $twig->render('admin.php');
            break;

        case 'logOut' : 
            $adminFrontEnd->signOut();
            break;
        
        case 'addChapter' :
            echo $twig->render('addChapter.php');
            break;

        case 'addedChapter' :
            $addChapterAdmin = $adminFrontEnd->addChapterAdmin(htmlspecialchars($_POST['title']), $_POST['chapterNumber'], $_POST['content'], htmlspecialchars($_POST['img_url']));
            echo $twig->render('addedChapter.php', ['chapter' => $chapter, 'error' => $addError, 'errorImg' => $addErrorImg]);
            break;

        case 'adminListChapters' : 
            $listChaptersAdmin = $adminFrontEnd -> listChaptersAdmin();
            echo $twig->render('adminListChapters.php', ['chaptersAdmin' => $listChaptersAdmin]);
            break;

        case 'modifyChapter' : 
            $chapterAdmin = $adminFrontEnd->chapterAdmin();
            echo $twig->render('modifyChapter.php', ['chapter' => $chapterAdmin]);
            break;

        case 'editChapter' :
            //$store = $adminFrontEnd->storeImg();
            $modifyChapterAdmin = $adminFrontEnd->modifyChapterAdmin($_GET['id'], htmlspecialchars($_POST['modifyChapterTitle']), $_POST['modifyChapterNumber'], $_POST['modifyChapterContent'], $_POST['img_url']);
            $chapter = $adminFrontEnd->chapterAdmin();
            echo $twig->render('editedChapter.php', ['chapter' => $chapter]);
            break;

        case 'deleteChapter' : 
            $removeChapterAdmin = $adminFrontEnd->removeChapterAdmin($_GET['id']);
            echo $twig->render('deletedChapter.php', ['delete' => $removeChapterAdmin]);
            break;

        case 'adminComments' : 
            echo $twig->render('adminComments.php');
            break;
        
        case 'adminListChaptersComments' :
            $listChaptersAdmin = $adminFrontEnd->listChaptersAdmin();
            echo $twig->render('adminListChaptersComments.php', ['chaptersComments' => $listChaptersAdmin]);
            break;

        case 'adminListReportedComments' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $reportedComments = $adminFrontEnd->reportedCommentsAdmin();
            echo $twig->render('adminListReportedComments.php', ['chapter' => $chapter,'reportedComments' => $reportedComments]);
            break;

        case 'adminChapterComments' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $chapterComments = $adminFrontEnd->commentsAdmin();
            echo $twig->render('adminChapterComments.php', ['chapter' => $chapter, 'chapterComments' => $chapterComments]);
            break;

        case 'adminChapterComment' :
            $chapter = $adminFrontEnd->chapterAdmin();
            $comment = $adminFrontEnd->commentAdmin();
            echo $twig->render('adminChapterComment.php', ['chapter' => $chapter, 'comment' => $comment]);
            break;

        case 'editComment' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $modifyComment = $adminFrontEnd->modifyCommentAdmin($_GET['id'], htmlspecialchars($_POST['commentText']), NULL);
            $comment = $adminFrontEnd->commentAdmin();
            echo $twig->render('editedComment.php', ['chapter' => $chapter, 'comment' => $comment]);
            break;
        
        case 'deleteComment' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $removeComment = $adminFrontEnd->removeCommentAdmin();
            echo $twig->render('deletedComment.php', ['chapter' => $chapter, 'delete' => $removeComment]);
            break;

        case 'signIn' :
            $signIn = $adminFrontEnd->signIn($_POST['admin'], $_POST['password']);
            //echo $twig->render('admin.php');
            break;

        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.php');
            break;
    }


// ob_get_clean(); 