<?php

    namespace Model;

    class CommentManager extends Manager {

        public function getComments($chapterId) { // récupération des commentaires d'un chapitre précis
            $db = $this->dbConnect();

            $comments = $db->prepare('SELECT id, chapter_id, author_comment, comment, moderate, DATE_FORMAT(date_comment, "%d-%m-%y à %H:%i") AS date_comment_fr FROM comments WHERE chapter_id = ? ORDER BY date_comment DESC');

            $comments->execute(array($chapterId));

            return $comments;
        }

        public function postComment($chapterId, $author_comment, $content) { // envoi d'un commentaire écrit dans un certain chapitre, par un certain auteur
            $db = $this->dbConnect();

            $comment = $db->prepare('INSERT INTO comments(chapter_id, author_comment, comment, date_comment) VALUES (?, ?, ?, NOW())');

            $newComment = $comment->execute(array($chapterId, $author_comment, $content));

            return $newComment;
        }

        public function reportComment($chapterId, $commentId) { // signaler un commentaire précis
            $db = $this->dbConnect();
            
            $req = $db->prepare('UPDATE comments SET moderate = 1 WHERE id = ?');

            $req->execute(array($commentId));

            return $req;
        }
    }