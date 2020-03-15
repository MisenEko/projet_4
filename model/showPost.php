
<?php


require_once("model/manager.php");

class ShowPostManager extends Manager{

    public function getPosts(){
        $db = $this -> dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($idPost){

        $db = $this -> dbConnect();
        $req = $db -> prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req -> execute(array($idPost));
        $post = $req ->fetch();

        return $post;

    }



} ?>
