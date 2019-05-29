<?php

namespace billet_simple\Model;

require_once 'model/Manager.php';

class CommentManager extends Manager {

    public function getComments($chapterId) { // récupération des commentaires d'un chapitre précis
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d-%m-%y à %H-%i") AS date_comment_fr FROM comments WHERE chapter_id = ? ORDER BY date_comment DESC');

        $comments->execute(array($chapterId));

        return $comments;
    }

    public function postComment($chapterId, $author_comment, $comment) { // envoi d'un commentaire écrit dans un certain chapitre, par un certain auteur
        $db = $this->dbConnect();

        $comment = $db->prepare('INSERT INTO comments(chapter_id, author_comment, comment, date_comment) VALUES (?, ?, ?, NOW())');

        $affectedLines = $comments->execute(array($chapterId));

        return $affectedLines;
    }

    public function reportComment($chapterId, $author_comment, $comment) { // signaler un commentaire précis
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d-%m-%y à %H-%i") AS date_comment_fr FROM comments WHERE id = ?');

        $req->execute(array($chapterId));

        return $req;
    }

}