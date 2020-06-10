<?php

    namespace Controller;

    use \Model\ChapterManager;
    use \Model\CommentManager;
    use \Model\AdminManager;

    class FrontEnd {   
        
        // DECONNEXION ADMIN
        public function logOut() {
            if (isset($_SESSION['auth'])) {
                session_destroy();
                return true;
            } else {
                return false;
            }
        }

        // PAGE ACCUEIL
        public function listChapters() {
            $chapterManager = new ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
            $chapters = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres

            return $chapters;
        }


        // PAGE CHAPITRE
        public function chapter($id) {
            $chapterManager = new ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
            $chapter = $chapterManager->getChapter($id); // appel de la fonction qui sélectionne le chapitre selon son id
            
            if($chapter) {
                return $chapter;
            } else {
                header("Location: index.php?action=default");
            }
        }

        public function listComments($id) {
            $commentManager = new CommentManager(); // création d'un objet qui récupèrera les données des commentaires
            $comments = $commentManager->getComments($id); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre
    
            return $comments;
        }



        //FONCTIONS COMMENTAIRES

        public function verifCaptcha() {
	        $secret = "SECRET_KEY"; // clé privée
	        $response = $_POST['g-recaptcha-response']; // paramètre renvoyé par le recaptcha
            $remoteip = $_SERVER['REMOTE_ADDR']; // récupération IP de l'utilisateur

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip ;

            $decode = json_decode(file_get_contents($api_url), true);

            if ($decode['success'] == true) {
                return $decode['success'];
            } else {
                header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            }

            return $decode['success'];
        }

        public function addComment($chapterId, $author_comment, $comment) {
            if ($this->verifCaptcha() == true) {
                $commentManager = new CommentManager();

                if(empty($_POST['author']) || empty($_POST['comment'])) {
                    header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                } else {
                    $newComment = $commentManager->postComment($chapterId, $author_comment, $comment);
                }
            } else {
                header("Location: " . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            }
        }

        public function alertComment($chapterId, $commentId) {
            $commentManager = new CommentManager();

            $reportedComment = $commentManager->reportComment($chapterId, $commentId);
            
            return $reportedComment;
        }
    }