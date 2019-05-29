<?php

    require 'vendor/autoload.php';
    require_once 'model/ChapterManager.php';
    require_once 'model/CommentManager.php';

    // PAGE ACCUEIL
    function listChapters() {
        $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $chapters = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres

        return $chapters;
        //require 'view/frontend/home.php';
    }

    function listChaptersNav() {
        $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $navList = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres

        return $navList;
    }



    // PAGE CHAPITRE
    function chapter() {
        $chapterManager = new billet_simple\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $commentManager = new billet_simple\model\CommentManager(); // création d'un objet qui récupèrera les données des commentaires
        
        $chapter = $chapterManager->getChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id
        $comments = $commentManager->getComments($_GET['id']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

        return $chapter;
        return $comments;
        //require 'view/frontend/chapterView.php';
    }

    function nextChapter() {
        $one = 1;
        //$chapter = $chapterManager->getChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id
        //$nextChapter = $chapter + $one;

        //return $nextChapter;
    }

    function addComment($chapterId, $author_comment, $comment) {
        $commentManager = new billet_simple\model\CommentManager();
        
        $affectedLines = $commentManager->postComment($chapterId, $author_comment, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        } else {
            header('Location: index.php?action=post&id=' . $chapterId);
        }
    }

    function alertComment($chapterId, $commentId) {
        $commentManager = new billet_simple\model\CommentManager();

        $comment = $commentManager->getComments(($_GET['id']), ($_GET['chapter_id']));
        
        return $comment;
    }