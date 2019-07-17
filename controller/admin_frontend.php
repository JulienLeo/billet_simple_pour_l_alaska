<?php 
    require 'vendor/autoload.php';
    require 'model/AdminManager.php';

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

    function addChapterAdmin($title, $content, $img_url) { // ajout d'un chapitre
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); 

        $affectedLines = $chapterManagerAdmin->postChapter($title, $content, $img_url);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le chapitre');
        }
    }

    function modifyChapterAdmin($id, $title, $content) {
        $chapterManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données d'un chapitre

        $chapterAdmin = $chapterManagerAdmin->editChapterAdmin($id, $title, $content); // appel de la fonction qui modifie le chapitre selon son id et son nouveau contenu

        return $chapterAdmin;
    }

    function removeChapterAdmin() {
        $chapterManagerAdmin = new billet_simple\model\AdminManager();

        $chapterAdmin = $chapterManagerAdmin->deleteChapterAdmin($_GET['id']); // appel du commentaire par son id

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

        $commentAdmin = $commentManagerAdmin->getCommentAdmin($_GET['id'], $_GET['chapterId']); // appel du commentaire par son id

        return $commentAdmin;
    }

    function reportedCommentsAdmin() {
        $commentsManagerAdmin = new billet_simple\model\AdminManager(); // création d'un objet qui récupèrera les données des commentaires

        $reportedCommentsAdmin = $commentsManagerAdmin->getReportedCommentsAdmin(); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre

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