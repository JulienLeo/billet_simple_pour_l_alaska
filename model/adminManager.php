<?php
    namespace billet_simple\Model;

    require_once 'model/Manager.php';

    class AdminManager extends Manager {

        public function signingIn($admin) {
            $db = $this->dbConnect();

            $user = $db->prepare('SELECT * FROM admin_list WHERE admin_name = ?');

            $affectedLines = $user->execute(array($admin));

            return $user->fetch();
        }


        // CHAPITRES

        public function postChapter($title, $chapterNumber, $content, $img_url) {
            $db = $this->dbConnect();

            $chapter = $db->prepare('INSERT INTO chapters(title, chapterNumber, content, img_url, addition_date) VALUE (?, ?, ?, ?, NOW())');

            $affectedLines = $chapter->execute(array($title, $chapterNumber, $content, $img_url));

            return $affectedLines;
        }

        public function getChaptersAdmin() { // récupération de tous les derniers chapitres
            $db = $this->dbConnect();
            
            $req = $db->query('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters ORDER BY chapterNumber');
        
            return $req;
        }

        public function getChapterAdmin($chapterId) { // récupération d'un chapitre précis en fonction de son id
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters WHERE id = ?');
            
            $req->execute(array($chapterId));
            
            $chapter = $req->fetch();
    
            return $chapter;
        } 



        // MODIFICATION D'UN CHAPITRE

        public function getCurrentImg($id) { // => à appeler s'il y a modif' de l'image lors d'une modif' de chapitre
            $db = $this->dbConnect();

            $req = $db->prepare('SELECT img_url FROM chapters WHERE id = ?');

            $req->execute(array($id));

            $currentImg = $req->fetch();

            return $currentImg;
        }
    

        public function editChapterAdmin($id, $title, $chapterNumber, $content, $img_url) {
            $db = $this->dbConnect();

            if ($img_url != NULL) {
                $req = $db->prepare('UPDATE chapters SET title = ?, chapterNumber = ?, content = ?, img_url = ? WHERE id = ?');

                $editedChapter = $req->execute(array($title, $chapterNumber, $content, $img_url, $id));
            } else {
                $req = $db->prepare('UPDATE chapters SET title = ?, chapterNumber = ?, content = ? WHERE id = ?');

                $editedChapter = $req->execute(array($title, $chapterNumber, $content, $id));
            }

            return $editedChapter;
        }


        public function deleteChapterAdmin($id) {
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM chapters WHERE id = ?');

            $req->execute(array($id));
        }


        // COMMENTAIRES

        public function getCommentsAdmin($chapterId) { // récupération des commentaires d'un chapitre précis
            $db = $this->dbConnect();
    
            $comments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d/%m/%y à %H:%i") AS date_comment_fr FROM comments WHERE chapter_id = ? ORDER BY date_comment DESC');
    
            $comments->execute(array($chapterId));
    
            return $comments;
        }

        public function getCommentAdmin(/*$commentId, */$chapterId) {
            $db = $this->dbConnect();

            $req = $db->prepare('SELECT id, chapter_id, author_comment, comment, DATE_FORMAT(date_comment, "%d/%m/%y") AS date_comment_fr FROM comments WHERE id = ?');

            $req->execute(array(/*$commentId, */$chapterId));

            $comment = $req->fetch();

            return $comment;
        }

        public function getReportedCommentsAdmin($chapterId) {
            $db = $this->dbConnect();

            /*$reportedComments = $db->prepare('SELECT id, chapter_id, author_comment, comment, DATE_FORMAT(date_comment, "%d/%m/%y à %H:%i") AS date_comment_fr FROM comments WHERE moderate IS NOT NULL ORDER BY id');*/

            $reportedComments = $db->prepare('SELECT comments.id AS commentId, comments.chapter_id, comments.author_comment, comments.comment, chapters.id, chapters.title, DATE_FORMAT(comments.date_comment, "%d/%m/%y à %H:%i") AS date_comment_fr FROM comments INNER JOIN chapters ON comments.chapter_id = chapters.id WHERE comments.moderate IS NOT NULL ORDER BY comments.id');

            $reportedComments->execute(array($chapterId));
            
            return $reportedComments;
        }

        public function editCommentAdmin($commentId, $comment) {
            $db = $this->dbConnect();

            $req = $db->prepare('UPDATE comments SET comment = ?, moderate = NULL WHERE id = ?');

            $editedComment = $req->execute(array($comment, $commentId));

            return $editedComment;
        }

        public function deleteCommentAdmin($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM comments WHERE id = ?');

            $req->execute(array($commentId));
        }
    }