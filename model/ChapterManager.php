<?php
    
    namespace Model;

    class ChapterManager extends Manager {
        
        public function getChapters() { // récupération de tous les derniers chapitres

            $db = $this->dbConnect();
            
            $req = $db->prepare('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters ORDER BY chapterNumber');

            $req->execute(array());
        
            return $req;
        }

        public function getChapter($chapterId) { // récupération d'un chapitre précis en fonction de son id
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, chapterNumber, title, content, img_url, DATE_FORMAT(addition_date, "%d-%m-%y") AS addition_date_fr FROM chapters WHERE id = ?');
            
            $req->execute(array($chapterId));
            
            $chapter = $req->fetch();
    
            return $chapter;
        }
    }