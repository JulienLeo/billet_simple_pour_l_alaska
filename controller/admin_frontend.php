<?php 
    require 'vendor/autoload.php';
    require_once 'model/AdminManager.php';

    // CHAPITRES

    function listChaptersAdmin() { // liste des chapitres dans la partie admin
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $chaptersAdmin = $chapterManagerAdmin->getChaptersAdmin(); // appel de la fonction créant la liste des chapitres

        return $chaptersAdmin;
    }

    function chapterAdmin() { // accès à un chapitre dans la partie admin
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre
        
        $chapterAdmin = $chapterManagerAdmin->getChapterAdmin($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id

        return $chapterAdmin;
    }

    function addChapterAdmin($content) { // ajout d'un chapitre
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); 

        $affectedLines = $chapterManagerAdmin->postChapter($content);

        if($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le chapitre');
        } else {
            header('Location: index.php?action=post&id=' . $chapterId);
        }
    }

    function modifyChapterAdmin() {
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre
        
        $chapterAdmin = $chapterManagerAdmin->editChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id

        return $chapterAdmin;
    }

    function removeChapterAdmin() {
        $chapterManagerAdmin = new billet_simple\model\AdminManager();

        $chapterAdmin = $chapterManagerAdmin->deleteChapter($_GET['id']); // appel du commentaire par son id

        return $chapterAdmin;
    }


    // COMMENTAIRES

    function commentsAdmin() {
        $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

        $commentsAdmin = $commentManagerAdmin->getCommentsAdmin(); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

        return $commentsAdmin;
    }

    function commentAdmin() { // consultation d'un commentaire dans la partie admin
        $commentManagerAdmin = new billet_simple\model\AdminManager();

        $commentAdmin = $commentManagerAdmin->getCommentAdmin($_GET['id']); // appel du commentaire par son id

        return $commentAdmin;
    }

    function modifyCommentAdmin() {
        $commentManagerAdmin = new billet_simple\model\AdminManager();

        $commentAdmin = $commentManagerAdmin->editComment($_GET['id']); // appel du commentaire par son id

        return $commentAdmin;
    }

    function removeCommentAdmin() {
        $commentManagerAdmin = new billet_simple\model\AdminManager();

        $commentAdmin = $commentManagerAdmin->deleteComment($_GET['id']); // appel du commentaire par son id

        return $commentAdmin;
    }