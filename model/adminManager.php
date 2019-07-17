<?php
    namespace billet_simple\Model;

    require_once 'model/Manager.php';

    class AdminManager extends Manager {

        public function signingIn($admin, $password) {
            $db = $this->dbConnect();

            $signIn = $db->prepare('SELECT admin_name, admin_password FROM admin_list');

            $signIn->execute(array());

            return $signIn;

            if (isset($_POST['admin_name']) AND $_POST['admin_name'] == 'admin_name' AND isset($_POST['admin_password']) AND $_POST['admin_password'] == 'admin_password') {
                sleep(1);
                if (isset($_POST['admin_name']) AND $_POST['admin_name'] == 'admin_name' AND isset($_POST['admin_password']) AND $_POST['admin_password'] == 'admin_password') {
                    // PAGE A TELECHARGER
                    // indexAdmin.php
                } else {
                    echo 'Impossible de se connecter';
                    // OU PAGE D'IMPOSSIBILITE DE CONNEXION
                }
            } else {
                echo 'Impossible de se connecter';
                // OU PAGE D'IMPOSSIBILITE DE CONNEXION
            }

            // CONDITIONS A METTRE AU BON ENDROIT

            session_start();

            /* if (isset($_SESSION['statut']) AND $_SESSION['statut'] == "administrateur") {
                echo "Le code secret est 351633135153";
            }

            else {
                echo "Vous n'avez pas le droit d'être ici !";
            }

            {% if is_granted('ROLE_MANAGER') == false %}
                my message 
            {% endif %} */

            $password;

            $salt = strlen($password);

            $password =  "jemmo" . $salt . $password . "hoofnye";

            $hashed = hash('sha512', $password);

            if ($password == $hashed) {
                // OK
            } else {
                // CONNEXION IMPOSSIBLE
            }
        }

        // CHAPITRES

        public function postChapter($title, $content, $img_url) {
            $db = $this->dbConnect();

            $chapter = $db->prepare('INSERT INTO chapters(title, content, img_url, addition_date) VALUE (?, ?, ?, NOW())');

            $affectedLines = $chapter->execute(array($title, $content, $img_url));

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

        public function editChapterAdmin($chapterId, $title, $content) {
            $db = $this->dbConnect();

            $req = $db->prepare('UPDATE chapters SET title = ?, content = ? WHERE id = ?');

            $editedChapter = $req->execute(array($title, $content, $chapterId));

            return $editedChapter;
        }

        public function deleteChapterAdmin($chapterId) {
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM chapters WHERE id = ?');

            $req->execute(array($chapterId));
        }


        // COMMENTAIRES

        public function getCommentsAdmin($chapterId) { // récupération des commentaires d'un chapitre précis
            $db = $this->dbConnect();
    
            $comments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d/%m/%y à %H:%i") AS date_comment_fr FROM comments WHERE chapter_id = ? ORDER BY date_comment DESC');
    
            $comments->execute(array($chapterId));
    
            return $comments;
        }

        public function getCommentAdmin($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare('SELECT id, chapter_id, author_comment, comment, DATE_FORMAT(date_comment, "%d-%m-%y") AS date_comment_fr FROM comments WHERE id = ?');

            $req->execute(array($commentId));

            $comment = $req->fetch();

            return $comment;
        }

        public function getReportedCommentsAdmin() {
            $db = $this->dbConnect();

            $reportedComments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT(date_comment, "%d/%m/%y à %H:%i") AS date_comment_fr FROM comments WHERE moderate IS NOT NULL ORDER BY id');

            $reportedComments->execute();
            
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

        public function adminAuthor() {

        }
    }