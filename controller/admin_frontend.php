<?php 
    require 'vendor/autoload.php';
    require_once 'model/AdminManager.php';

    class AdminFrontEnd { 

        function __construct() {
            if(isset($_GET['action'])) {
                if(!$this->isLogged() && $_GET['action'] !== 'signIn') {
                    $this->forbidden();
                }
            } else {
                if(!$this->isLogged()) {
                    $this->forbidden();
                }
            }
        } 

        function index() {
            return true;
        }

        function signIn($admin, $password) {
            $adminManagerAdmin = new billet_simple\model\AdminManager();

            $user = $adminManagerAdmin->signingIn($admin);

            $long = strlen($password);
            $password =  "jemmo" . $long . $password . "hoofnye";
            $password = hash('sha512', $password);

            if ($user) {
                if ($user->admin_password === $password) {
                    $_SESSION['auth'] = $user->id;
                    header("Location: indexAdmin.php");
                } else {
                    header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                }
            } else {
                header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            }
            return false;
        }

        function isLogged() {
            if (isset($_SESSION['auth'])) {
                return true;
            } else {
                return false;
            }
        }

        function forbidden() {
            header('HTTP/1.0 403 Forbidden');
            die('Vous n\'avez pas accès à ces fonctions.');
        }

        function logOut() {
            session_destroy();
        }

        // CHAPITRES

        function listChaptersAdmin() { // liste des chapitres dans la partie admin
            $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre
            $chaptersAdmin = $chapterManagerAdmin->getChaptersAdmin(); // appel de la fonction créant la liste des chapitres

            return $chaptersAdmin;
        }

        function chapterAdmin() { // accès à un chapitre dans la partie admin

            $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre
  
            $chapterAdmin = $chapterManagerAdmin->getChapterAdmin($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id

            $chapterCommentAdmin = $chapterManagerAdmin->getChapterAdmin($_GET['chapterId']); // appel de la fonction qui sélectionne le chapitre selon son id

            if ($chapterCommentAdmin) {
                return $chapterCommentAdmin;
            } else if ($chapterAdmin) {
                return $chapterAdmin;
            } else {
                header("Location: indexAdmin.php?action=default");
            }
        }


        function addChapterAdmin($title, $chapterNumber, $content, $img_url) { // ajout d'un chapitre
            $token = $_GET['token'];

            if ($_SESSION['token'] === $token) {
                $chapterManagerAdmin = new billet_simple\model\AdminManager();
                
                if (empty($_POST['title']) || empty($_POST['chapterNumber'])) {
                    header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                } else {
                    if (!empty($_FILES) && $_FILES['img_url']['error'] == 0) {
                        $file_name = $_FILES['img_url']['name']; //var_dump($file_name); => string(28) "tess park anton newcombe.png"
                        $file_extension = strrchr($file_name, '.'); //var_dump($file_extension); => string(4) ".png"
                        $file_extension_nb = strlen($file_extension); //var_dump($file_extension_nb); => int(4);
                        $file_name_no_extension = substr($file_name, 0, -$file_extension_nb); //var_dump($file_name_no_extension); //=> string(11)
        
                        $file_tmp_name = $_FILES['img_url']['tmp_name']; //var_dump($file_tmp_name); => string(36) "/Applications/MAMP/tmp/php/phpVG122H"
                        
                        $new_file_name = round(microtime(true));
                        //var_dump($new_file_name); //=> string(47) "1588321616"

                        $img_url = 'public/img/chapter_img/' . $file_name_no_extension . '-' . $new_file_name . $file_extension; 
                        //var_dump($img_url); //string(49) "public/img/chapter_img/beatles1973-1588327326.jpg"
        
                        $authorized_extensions = array('.png', '.PNG', '.jpeg', '.JPEG', '.jpg', '.JPG');
        
                        if (in_array($file_extension, $authorized_extensions)) {
                            if (move_uploaded_file($file_tmp_name, $img_url) && $_FILES['img_url']['error'] == 0) {
                                $affectedLines = $chapterManagerAdmin->postChapter($title, $chapterNumber, $content, $img_url);
                                if ($affectedLines === false) {
                                    throw new Exception('Impossible d\'ajouter le chapitre');
                                }
                            } else {
                                throw new Exception('Impossible d\'ajouter le chapitre');
                            }
                        } else {
                            throw new Exception('Seuls les fichiers PNG et JPG sont autorisés...');
                        }
                    } else {
                        header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                    }
                }
            } else {
                header('HTTP/1.1 503 Service Temporarily Unavailable');
            }
        }


        function modifyChapterAdmin($id, $title, $chapterNumber, $content, $img_url) { // modification d'un chapitre
            $token = $_GET['token'];

            if ($_SESSION['token'] === $token){
                $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

                if (!empty($_FILES) && $_FILES['img_url']['error'] == 0) {
                    //$chapterImage = $chapterManagerAdmin->getCurrentImg($id); // variable qui récupère l'image initiale
                    //unlink($chapterImage->img_url); // suppression de l'image initiale

                    $file_name = $_FILES['img_url']['name']; 
                    $file_extension = strrchr($file_name, '.');
                    $file_extension_nb = strlen($file_extension);
                    $file_name_no_extension = substr($file_name, 0, -$file_extension_nb);

                    $file_tmp_name = $_FILES['img_url']['tmp_name']; 
                    $new_file_name = round(microtime(true));

                    $img_url = 'public/img/chapter_img/' . $file_name_no_extension . '-' . $new_file_name . $file_extension;

                    $authorized_extensions = array('.png', '.PNG', '.jpeg', '.JPEG', '.jpg', '.JPG');

                    if (in_array($file_extension, $authorized_extensions)) {
                        if (move_uploaded_file($file_tmp_name, $img_url) && $_FILES['img_url']['error'] == 0) {
                            $chapterImage = $chapterManagerAdmin->getCurrentImg($id); // variable qui récupère l'image initiale
                            unlink($chapterImage->img_url); // suppression de l'image initiale
                            $chapterAdmin = $chapterManagerAdmin->editChapterAdmin($id, $title, $chapterNumber, $content, $img_url); // appel de la fonction qui modifie le chapitre selon son id et son nouveau contenu
                            if ($affectedLines === false) {
                                throw new Exception('Impossible d\'ajouter le chapitre');
                            }
                        } else {
                            throw new Exception('Impossible d\'ajouter le chapitre');
                        }
                    } else {
                        throw new Exception('Seuls les fichiers PNG et JPG sont autorisés...');
                    }
                } else if ($_FILES['img_url']['error']) {
                    $chapterAdmin = $chapterManagerAdmin->editChapterAdmin($id, $title, $chapterNumber, $content, NULL); // appel de la fonction qui modifie le chapitre selon son id et son nouveau contenu
                }

                return $chapterAdmin;
            } else {
                header('HTTP/1.1 503 Service Temporarily Unavailable');
            }
        }


        function removeChapterAdmin() {
            $token = $_GET['token'];

            if ($_SESSION['token'] === $token) {
                $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

                $chapterImage = $chapterManagerAdmin->getCurrentImg($_GET['id']); // variable qui récupère l'image initiale
                unlink($chapterImage->img_url);

                $chapterAdmin = $chapterManagerAdmin->deleteChapterAdmin($_GET['id']); // appel du chapitre et suppression par son id

                $commentsAdmin = $chapterManagerAdmin->deleteAllComments($_GET['id']); // suppression des commentaires du chapitre supprimé
                
                return $chapterAdmin;
            } else {
                header('HTTP/1.1 503 Service Temporarily Unavailable');
            }
        }


        // COMMENTAIRES

        function commentsAdmin() {
            $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

            $commentsAdmin = $commentsManagerAdmin->getCommentsAdmin($_GET['id']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

            return $commentsAdmin;
        }

        function commentAdmin() { // consultation d'un commentaire dans la partie admin
            $commentManagerAdmin = new billet_simple\model\AdminManager();

            $commentAdmin = $commentManagerAdmin->getCommentAdmin($_GET['id']); // appel du commentaire par son id
            
            if ($commentAdmin) {
                return $commentAdmin;
            } else {
                header("Location: indexAdmin.php?action=default");
            }
        }

        function reportedCommentsAdmin() {
            $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

            $reportedCommentsAdmin = $commentsManagerAdmin->getReportedCommentsAdmin($_GET['id'],$_GET['chapterId']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

            return $reportedCommentsAdmin;
        }

        function modifyCommentAdmin($id, $comment, $moderate) {
            $token = $_GET['token'];

            if ($_SESSION['token'] === $token){
                $commentManagerAdmin = new billet_simple\model\AdminManager();

                $commentAdmin = $commentManagerAdmin->editCommentAdmin($id, $comment); // appel du commentaire par son id

                return $commentAdmin;
            } else {
                header('HTTP/1.1 503 Service Temporarily Unavailable');
            }
        }

        function removeCommentAdmin() {
            $token = $_GET['token'];

            if ($_SESSION['token'] === $token){
                $commentManagerAdmin = new billet_simple\model\AdminManager();

                $commentAdmin = $commentManagerAdmin->deleteCommentAdmin($_GET['id']); // appel du commentaire par son id

                return $commentAdmin;
            } else {
                header('HTTP/1.1 503 Service Temporarily Unavailable');
            }
        }
    }