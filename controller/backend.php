<?php
require('model/LoginManager.php');


class LogIn{

    public function adminLogin($user, $pwd){
        
        $checkLogin = new GetLogIn();
        $result = $checkLogin -> loginCheck();        
        

        if(($result['user'] == $user) && ($result['pwd'] == $pwd)){
            if( session_id() == "" && session_id() == NULL)
            session_start();
            $_SESSION['login'] = $result['user'];
            $_SESSION['password'] = $result['pwd'];

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