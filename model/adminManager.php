<?php
    namespace billet_simple\Model;

    require_once 'model/Manager.php';

    class adminManager extends Manager {
        public function addChapter() {
            $db = $this->connect();

            $chapter = $db->prepare('INSERT INTO chapters(title, content, img_url, addition_date) VALUE (?, ?, ?, NOW())');

            $affectedlines = $chapter->execute(array());
        }
    }