<?php

    require 'vendor/autoload.php';
    require 'model/ChapterManager.php';
    require 'model/CommentManager.php';
    require 'model/AdminManager.php';

    class FrontEnd {   
        
        function logOut() {
            if (isset($_SESSION['auth'])) {
                session_destroy();
                return true;
            } else {
                return false;
            }
        }

        // PAGE ACCUEIL
        function listChapters() {
            $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
            $chapters = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres

            return $chapters;
        }


        // PAGE CHAPITRE
        function chapter($id) {
            $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
            $chapter = $chapterManager->getChapter($id); // appel de la fonction qui sélectionne le chapitre selon son id
            
            return $chapter;
        }

        function nextChapter($id) {
            $chapterManager = new billet_simple\model\ChapterManager();
            $nextChapter = $chapterManager->getNextChapter($id);

            return $nextChapter;
        }

        function listComments($id) {
            $commentManager = new billet_simple\model\CommentManager(); // création d'un objet qui récupèrera les données des commentaires
            $comments = $commentManager->getComments($id); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre
    
            return $comments;
        }

        function addComment($chapterId, $author_comment, $comment) {
            $commentManager = new billet_simple\model\CommentManager();
            
            $newComment = $commentManager->postComment($chapterId, $author_comment, $comment);

            if ($newComment === false) {
                throw new Exception('Impossible d\'ajouter le commentaire');
            }
        }

        function alertComment($chapterId, $commentId) {
            $commentManager = new billet_simple\model\CommentManager();

            $reportedComment = $commentManager->reportComment($chapterId, $commentId);
            
            return $reportedComment;
        }
    }