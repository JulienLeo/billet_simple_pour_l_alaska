<?php
    namespace billet_simple\Model;

    require_once 'model/Manager.php';

    class AdminManager extends Manager {

        // CHAPITRES

        public function postChapter() {
            $db = $this->dbConnect();

            $chapter = $db->prepare('INSERT INTO chapters(title, content, img_url, addition_date) VALUE (?, ?, ?, NOW())');

            $affectedLines = $chapter->execute(array());

            return $affectedLines;
        }

        public function getChaptersAdmin() { // récupération de tous les derniers chapitres

            $db = $this->dbConnect();
            
            $req = $db->query('SELECT id, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters ORDER BY id');
        
            return $req;
        }

        public function getChapterAdmin($chapterId) { // récupération d'un chapitre précis en fonction de son id
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters WHERE id = ?');
            
            $req->execute(array($chapterId));
            
            $chapter = $req->fetch();
    
            return $chapter;
        }

        public function editChapter($chapterId) {
            $db = $this->dbConnect();

            $req = $db->prepare('UPDATE chapters SET content = ? WHERE id = ?');

            $req->execute(array($chapterId));

            $chapter = $req->fetch();

            return $chapter;
        }

        public function deleteChapter($chapterId) {
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM chapters WHERE id = ?');

            $req->execute(array($chapterId));

            $chapter = $req->fetch();
        }


        // COMMENTAIRES

        public function getCommentsAdmin($chapterId) { // récupération des commentaires d'un chapitre précis
            $db = $this->dbConnect();
    
            $comments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d-%m-%y à %H-%i") AS date_comment_fr FROM comments WHERE chapter_id = ? ORDER BY date_comment DESC');
    
            $comments->execute(array($chapterId));
    
            return $comments;
        }

        public function getCommentAdmin($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d-%m-%y") AS date_comment_fr FROM comments WHERE chapter_id = ?');

            $req->execute(array($commentId));

            $comment = $req->fetch();

            return $comment;
        }

        public function editComment($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');

            $req->execute(array($commentId));

            $affectedLines = $req->fetch();

            return $affectedLines;
        }

        public function deleteComment($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM comments WHERE id = ?');

            $req->execute(array($commentId));

            $comment = $req->fetch();
        }

        public function adminAuthor() {

        }
    }