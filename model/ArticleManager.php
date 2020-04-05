
<?php


require_once('model/manager.php');

class ArticleManager extends Manager{

    public function getPosts(){
        $db = $this -> dbConnect();
        $req = $db->query('SELECT id, author, title, content, post_sample, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($idPost){

        $db = $this -> dbConnect();
        $req = $db -> prepare('SELECT id, author, title, content, post_sample, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req -> execute(array($idPost));
        $post = $req ->fetch();

        return $post;

    }

    public function addPost($author, $title, $sample, $editor){
        $db = $this -> dbConnect();
        $insert = $db->prepare("INSERT INTO posts (author, title, post_sample, content, creation_date) VALUES (?,?,?,?, NOW())");
        $insert -> execute(array($author, $title, $sample , $editor ));
        
    }

    public function editPost($author, $title, $postSample, $content, $postId){
        $db = $this -> dbConnect();
        $edit = $db -> prepare ('UPDATE posts SET author= ?, title= ?, post_sample= ?, content= ? WHERE id = ?');
        $edit -> execute(array($author, $title, $postSample, $content, $postId));
    }

    public function deletePost($id){

        $db = $this -> dbConnect();
        $req = $db -> prepare('DELETE FROM posts WHERE id = ?');
        $req -> execute(array($id));
    }



} ?>
