<?php

    require '../vendor/autoload.php';
    require '../Config.php';

    use \Controller\FrontEnd as F;
    use \Controller\AdminFrontEnd as A;

    session_start();

    $page = 'home';

    // Routeur
    if (isset($_GET['action'])) {
        $page = $_GET['action'];
    }

    // Rendu du template
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../view/frontend');
    
    $twig = new Twig_Environment($loader, [
        'cache' => false // __DIR__ . '/tmp' // penser à mettre le cache à false pour qu'à l'actualisation il y ait rechargement de la page
    ]);

    $twig->addExtension(new Twig_Extensions_Extension_Number());
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    $twig->addGlobal('current_page', $page);

    // VARIABLES FRONTEND
    $frontEnd = new F;
    $listNav = $frontEnd->listChapters();
    $listHome = $frontEnd->listChapters();

    //VARIABLE ADMIN
    $adminFrontEnd = new A;
    
    // GENERATION TOKEN ADMIN
    function generateToken() {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;

        return $token;
    }

    switch ($page) {
    
    /* PARTIE FRONT */

        case 'home' : 
            echo $twig->render('home.php', ['navList' => $listNav, 'chapters' => $listHome]);
            break;

        case 'chapter' :
            $chapter = $frontEnd->chapter($_GET['id']);
            $postedComments = $frontEnd->listComments($_GET['id']);
            $noComments = $frontEnd->listComments($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments,'noComments' => $noComments]);
            break;
        
        case 'addComment' :
            $addComment = $frontEnd->addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
            $postedComments = $frontEnd->listComments($_GET['id']);
            $noComments = $frontEnd->listComments($_GET['id']);
            $chapter = $frontEnd->chapter($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments, 'noComments' => $noComments]);
            break;
        
        case 'reportComment' : 
            $chapter = $frontEnd->chapter($_GET['id']);
            $reportComment = $frontEnd->alertComment($_GET['id'], $_POST['commentId']);
            $postedComments = $frontEnd->listComments($_GET['id']);
            $noComments = $frontEnd->listComments($_GET['id']);
            echo $twig->render('chapterView.php', ['navList' => $listNav, 'chapter' => $chapter, 'postedComments' => $postedComments, 'noComments' => $noComments]);
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

/* PARTIE ADMIN */

            case 'homeAdmin' :
                $adminFrontEnd->index();
                echo $twig->render('admin.php');
                break;
    
            case 'logOut' : 
                $adminFrontEnd->signOut();
                break;
            
            case 'addChapter' :
                $adminFrontEnd->verification();
                $token = generateToken();
                echo $twig->render('addChapter.php',['token' => $token]);
                break;
    
            case 'addedChapter' :
                $addChapterAdmin = $adminFrontEnd->addChapterAdmin($_POST['title'], $_POST['chapterNumber'], $_POST['content'], $_POST['img_url']);
                echo $twig->render('addedChapter.php', ['chapter' => $chapter, 'error' => $addError, 'errorImg' => $addErrorImg, 'token' => $token]);
                break;
    
            case 'adminListChapters' : 
                $adminFrontEnd->verification();
                $listChaptersAdmin = $adminFrontEnd -> listChaptersAdmin();
                echo $twig->render('adminListChapters.php', ['chaptersAdmin' => $listChaptersAdmin]);
                break;
    
            case 'modifyChapter' : 
                $token = generateToken();
                $chapterAdmin = $adminFrontEnd->chapterAdmin();
                echo $twig->render('modifyChapter.php', ['chapter' => $chapterAdmin, 'token' => $token]);
                break;
    
            case 'editChapter' :
                $modifyChapterAdmin = $adminFrontEnd->modifyChapterAdmin($_GET['id'], $_POST['modifyChapterTitle'], $_POST['modifyChapterNumber'], $_POST['modifyChapterContent'], $_POST['img_url']);
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
                $modifyComment = $adminFrontEnd->modifyCommentAdmin($_GET['id'], $_POST['commentText'], NULL);
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
            echo $twig->render('404.php', ['navList' => $listNav]);
            break;
        

    /* PARTIE ADMIN */
        


}