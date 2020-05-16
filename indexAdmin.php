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

    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view/admin');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Extension());

    // VARIABLE FRONTEND
    $adminFrontEnd = new AdminFrontEnd();

    // GENERATION TOKEN
    function generateToken() {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;

        return $token;
    }

    switch ($page) {

        case '' :
            $adminFrontEnd->index();
            echo $twig->render('admin.php');
            break;

        case 'logOut' : 
            $adminFrontEnd->signOut();
            break;
        
        case 'addChapter' :
            $token = generateToken();
            echo $twig->render('addChapter.php',['token' => $token]);
            break;

        case 'addedChapter' :
            $addChapterAdmin = $adminFrontEnd->addChapterAdmin(htmlspecialchars($_POST['title']), $_POST['chapterNumber'], $_POST['content'], htmlspecialchars($_POST['img_url']));
            echo $twig->render('addedChapter.php', ['chapter' => $chapter, 'error' => $addError, 'errorImg' => $addErrorImg, 'token' => $token]);
            break;

        case 'adminListChapters' : 
            $listChaptersAdmin = $adminFrontEnd -> listChaptersAdmin();
            echo $twig->render('adminListChapters.php', ['chaptersAdmin' => $listChaptersAdmin]);
            break;

        case 'modifyChapter' : 
            $token = generateToken();
            $chapterAdmin = $adminFrontEnd->chapterAdmin();
            echo $twig->render('modifyChapter.php', ['chapter' => $chapterAdmin, 'token' => $token]);
            break;

        case 'editChapter' :
            $modifyChapterAdmin = $adminFrontEnd->modifyChapterAdmin($_GET['id'], htmlspecialchars($_POST['modifyChapterTitle']), $_POST['modifyChapterNumber'], $_POST['modifyChapterContent'], $_POST['img_url']);
            $chapter = $adminFrontEnd->chapterAdmin();
            echo $twig->render('editedChapter.php', ['chapter' => $chapter, 'token' => $token]);
            break;

        case 'deleteChapter' : 
            $removeChapterAdmin = $adminFrontEnd->removeChapterAdmin($_GET['id']);
            echo $twig->render('deletedChapter.php', ['delete' => $removeChapterAdmin, 'token' => $token]);
            break;

        case 'adminComments' : 
            echo $twig->render('adminComments.php');
            break;
        
        case 'adminListChaptersComments' :
            $listChaptersAdmin = $adminFrontEnd->listChaptersAdmin();
            echo $twig->render('adminListChaptersComments.php', ['chaptersComments' => $listChaptersAdmin]);
            break;

        case 'adminListReportedComments' : 
            $reportedComments = $adminFrontEnd->reportedCommentsAdmin();
            echo $twig->render('adminListReportedComments.php', ['reportedComments' => $reportedComments]);
            break;

        case 'adminChapterComments' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $chapterComments = $adminFrontEnd->commentsAdmin();
            echo $twig->render('adminChapterComments.php', ['chapter' => $chapter, 'chapterComments' => $chapterComments]);
            break;

        case 'adminChapterComment' :
            $token = generateToken();
            $chapter = $adminFrontEnd->chapterAdmin();
            $comment = $adminFrontEnd->commentAdmin();
            echo $twig->render('adminChapterComment.php', ['chapter' => $chapter, 'comment' => $comment, 'token' => $token]);
            break;

        case 'editComment' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $modifyComment = $adminFrontEnd->modifyCommentAdmin($_GET['id'], htmlspecialchars($_POST['commentText']), NULL);
            $comment = $adminFrontEnd->commentAdmin();
            echo $twig->render('editedComment.php', ['chapter' => $chapter, 'comment' => $comment, 'token' => $token]);
            break;
        
        case 'deleteComment' : 
            $chapter = $adminFrontEnd->chapterAdmin();
            $removeComment = $adminFrontEnd->removeCommentAdmin();
            echo $twig->render('deletedComment.php', ['chapter' => $chapter, 'delete' => $removeComment, 'token' => $token]);
            break;

        case 'signIn' :
            $signIn = $adminFrontEnd->signIn($_POST['admin'], $_POST['password']);
            break;

        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404Admin.php');
            break;
        }