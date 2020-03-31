<?php

require('model/LoginManager.php');
require_once('model/manager.php');

class LogIn{

    public function adminLogin($user, $pwd){
        
        $checkLogin = new GetLogIn();
        $result = $checkLogin -> loginCheck();
        session_destroy();

        if(($result['user'] == $user) && ($result['pwd'] == $pwd)){
            session_start();
            $_SESSION['login'] = $result['user'];
            $_SESSION['pwd'] = $result['pwd'];
            
            $count = 0;
            $postsDd = new ArticleManager;
            $articles = $postsDd -> getPosts();
    
            $commentsDb = new CommentManager;
            $comments = $commentsDb -> showTagComment();
            
    
            $count = $this -> tagCount($comments, $count);
    
            require('view/frontend/adminTools/template.php');
            
            
        } else {
            require('view/frontend/non.php');
        }



    }

    private function tagCount($comments, $count){

        while ($data = $comments -> fetch()){
           
                $count = $count + 1;
        }

            return $count;
    }
    

}