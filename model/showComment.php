<?php

require_once('model/manager.php');

class ShowCommentManager extends Manager {

    public function getComments($idPost)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT id, pseudo, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ?'); 
        $req -> execute(array($idPost));

        return $req;
    }

    public function addCommentDb($idPost){

    }

}