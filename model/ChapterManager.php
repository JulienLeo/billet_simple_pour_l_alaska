<?php
    namespace billet_simple\Model;

    require_once 'model/Manager.php';

    class ChapterManager extends Manager {
        
        public function getChapters() { // récupération de tous les derniers chapitres

            $db = $this->dbConnect();
            
            $req = $db->query('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters ORDER BY chapterNumber');
        
            return $req;
        }

        public function getChapter($chapterId) { // récupération d'un chapitre précis en fonction de son id
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters WHERE id = ?');
            
            $req->execute(array($chapterId));
            
            $chapter = $req->fetch();
    
            return $chapter;
        }

        public function getNextChapter($chapterId, $chapterNumber) { // chapitre suivant selon le numéro du chapitre en cours
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters WHERE chapterNumber > $chapter ORDER BY chapterNumber ASC LIMIT 0,1');
            
            $req->execute(array($chapterId));
            
            $nextChapter = $req->fetch();
    
            return $nextChapter;
        }
    }