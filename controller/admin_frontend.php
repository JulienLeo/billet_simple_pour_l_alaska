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

            //$password = "zzz";
            $long = strlen($password);
            $password =  "jemmo" . $long . $password . "hoofnye";
            $password = hash('sha512', $password);

            if ($user) {
                if ($user->admin_password === $password) {
                    $_SESSION['auth'] = $user->id;
                    var_dump($user);
                    header("Location: indexAdmin.php");
                }
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
            } else {
                return $chapterAdmin;
            }
        }

        function addChapterAdmin($title, $chapterNumber, $content, $img_url) { // ajout d'un chapitre
            $chapterManagerAdmin = new billet_simple\model\AdminManager();
            $addError = "";
            
            if (empty($_POST['title']) || empty($_POST['chapterNumber'])) {
                header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                $addError = "* Ce champ n'a pas été rempli";
            } else {
                if (!empty($_FILES)) {
                    $file_name = $_FILES['img_url']['name']; //var_dump($file_name); => string(28) "tess park anton newcombe.png"
                    $file_extension = strrchr($file_name, '.'); //var_dump($file_extension); => string(4) ".png"
    
    
                    $file_tmp_name = $_FILES['img_url']['tmp_name']; //var_dump($file_tmp_name); => string(36) "/Applications/MAMP/tmp/php/phpVG122H"
                    $img_url = 'public/img/chapter_img/' . $file_name; //var_dump($img_url); => string(51) "public/img/chapter_img/tess park anton newcombe.png"
    
                    $authorized_extensions = array('.png', '.PNG', '.jpeg', '.JPEG', '.jpg', '.JPG');
    
                    if (in_array($file_extension, $authorized_extensions)) {
                        if (move_uploaded_file($file_tmp_name, $img_url) && $_FILES['img_url']['error'] == 0) {
                            $affectedLines = $chapterManagerAdmin->postChapter($title, $chapterNumber, $content, $img_url);
                            if ($affectedLines === false) {
                                throw new Exception('Impossible d\'ajouter le chapitre');
                            }
                            //header("Location: view/frontend/admin/addedChapter.php");
                        } else {
                            throw new Exception('Impossible d\'ajouter le chapitre');
                        }
                    } else {
                        throw new Exception('Seuls les fichiers PNG et JPG sont autorisés...');
                    }
    
                    /* CHECK S'IL Y A DEJA UN CHAPITRE NUMERO ? */
                    /*if (file_exists($chapterNumber)) {
                        throw new Exception('Un chapitre avec ce numéro existe déjà.');
                    }*/
                } 
            }
        }


        /* CHECK SI IL Y A UNE NOUVELLE IMAGE ENVOYEE (A METTRE DANS FONCTION MODIFIER) */
        function modifyChapterAdmin($id, $title, $chapterNumber, $content, $img_url) {
            $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

            /*if (!empty($_FILES)) {
                // appel de la fonction qui récupère l'image qui va être modifiée
                $chapterImage = $chapterManagerAdmin->getCurrentImg($chapterId);


                $file_name = $_FILES['img_url']['name']; 
                $file_extension = strrchr($file_name, '.');

                $file_tmp_name = $_FILES['img_url']['tmp_name']; 
                $img_url = 'public/img/chapter_img/' . $file_name; 

                $authorized_extensions = array('.png', '.PNG', '.jpeg', '.JPEG', '.jpg', '.JPG');

                if (in_array($file_extension, $authorized_extensions)) {
                    if (move_uploaded_file($file_tmp_name, $img_url) && $_FILES['img_url']['error'] == 0) {
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
            } else {*/
                $chapterAdmin = $chapterManagerAdmin->editChapterAdmin($id, $title, $chapterNumber, $content); // appel de la fonction qui modifie le chapitre selon son id et son nouveau contenu
            //}

            return $chapterAdmin;
        }


        function currentImg($id) { // récupérer url image par l'id du chapitre et la stocker dans une variable ($ancienneImage)
            $ancienneImageAdmin = new billet_simple\model\AdminManager();

            
        }


        public function replaceImg($chapterId) {
            $db = $this->dbConnect();
        }
















        /*function modifyChapterAdmin($id, $title, $chapterNumber, $content, $img_url) {
            $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

            $chapterAdmin = $chapterManagerAdmin->editChapterAdmin($id, $title, $chapterNumber, $content, $img_url); // appel de la fonction qui modifie le chapitre selon son id et son nouveau contenu

            return $chapterAdmin;
        }*/

        function removeChapterAdmin() {
            $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

            $chapterAdmin = $chapterManagerAdmin->deleteChapterAdmin($_GET['id']); // appel du commentaire et suppression par son id

            return $chapterAdmin;
        }


        // COMMENTAIRES

        function commentsAdmin() {
            $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

            $commentsAdmin = $commentsManagerAdmin->getCommentsAdmin($_GET['id']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

            return $commentsAdmin;
        }

        function commentAdmin() { // consultation d'un commentaire dans la partie admin
            $commentManagerAdmin = new billet_simple\model\AdminManager();

            $commentAdmin = $commentManagerAdmin->getCommentAdmin($_GET['id']/*, $_GET['chapterId']*/); // appel du commentaire par son id

            return $commentAdmin;
        }

        function reportedCommentsAdmin() {
            $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

            $reportedCommentsAdmin = $commentsManagerAdmin->getReportedCommentsAdmin($_GET['id'],$_GET['chapterId']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

            return $reportedCommentsAdmin;
        }

        function modifyCommentAdmin($id, $comment, $moderate) {
            $commentManagerAdmin = new billet_simple\model\AdminManager();

            $commentAdmin = $commentManagerAdmin->editCommentAdmin($id, $comment); // appel du commentaire par son id

            return $commentAdmin;
        }

        function removeCommentAdmin() {
            $commentManagerAdmin = new billet_simple\model\AdminManager();

            $commentAdmin = $commentManagerAdmin->deleteCommentAdmin($_GET['id']); // appel du commentaire par son id

            return $commentAdmin;
        }
    }