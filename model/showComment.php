<?php

require_once('model/manager.php');

class ShowCommentManager extends Manager {

    public function getComments($idPost)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC'); 
        $req -> execute(array($idPost));

        return $req;
    }

    public function addCommentDb($pseudo, $content, $idPost){

        $db = $this -> dbConnect();
        $comment= $db -> prepare ('INSERT INTO comments(author, content, id_post, comment_date) VALUE(?,?,?,NOW()) ');
        $addLine = $comment -> execute(array($pseudo, $content, $idPost));

        return $addLine;
    }

}