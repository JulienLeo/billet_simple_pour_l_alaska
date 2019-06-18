<?php

    require 'vendor/autoload.php';
    require 'model/ChapterManager.php';
    require 'model/CommentManager.php';

    // PAGE ACCUEIL
    function listChapters() {
        $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $chapters = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres

        return $chapters;
        //require 'view/frontend/home.php';
    }


    // PAGE CHAPITRE
    function chapter() {
        $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $chapter = $chapterManager->getChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id
        
        return $chapter;
    }

    function nextChapter() {
        $one = 1;
        //$chapter = $chapterManager->getChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id
        //$nextChapter = $chapter + $one;

        //return $nextChapter;
    }

    function listComments() {
            $commentManager = new billet_simple\model\CommentManager(); // création d'un objet qui récupèrera les données des commentaires
            $comments = $commentManager->getComments($_GET['id']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre
    
            return $comments;
    }

    function addComment($chapterId, $author_comment, $comment) {
        $commentManager = new billet_simple\model\CommentManager();
        
        $newComment = $commentManager->postComment($chapterId, $author_comment, $comment);

        if ($newComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
    }

    function alertComment($commentId) {
        $commentManager = new billet_simple\model\CommentManager();

        $reportedComment = $commentManager->reportComment($commentId);
        
        return $reportedComment;
    }