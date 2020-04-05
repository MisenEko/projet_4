<?php


require_once('model/manager.php');

class CommentManager extends Manager {

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

    public function editComment($content, $id){
        $db = $this -> dbConnect();
        $editComs = $db -> prepare ('UPDATE comments SET content= ? WHERE id = ?');
        $editCom = $editComs -> execute(array($content, $id));

        return $editCom;

    }

    public function getCommentById($id)
    {
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT content FROM comments WHERE id = ?'); 
        $req -> execute(array($id));
        $test = $req ->fetch();

        return $test;
    }

    public function tagComment($commentId){
        $db = $this -> dbConnect();
        $req = $db -> prepare('UPDATE comments set report_tag = 1 WHERE id = ?');
        $req -> execute(array($commentId));

    }

    public function showTagComment(){
        $db = $this -> dbConnect();
        $req = $db -> query('SELECT author, comment_date, content, id FROM comments WHERE report_tag = 1');
        return $req;
    }

    public function deleteTagComment($id){

        $db = $this -> dbConnect();
        $req = $db -> prepare('DELETE FROM comments WHERE id = ?');
        $req -> execute(array($id));
    }

    public function untagComment($commentId){
        $db = $this -> dbConnect();
        $req = $db -> prepare('UPDATE comments set report_tag = 0 WHERE id = ?');
        $req -> execute(array($commentId));

    }


}