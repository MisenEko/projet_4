<?php
require('model/LoginManager.php');


class LogIn{

    public function adminLogin($user, $pwd){
        
        //function to check if the admin login is right
        $checkLogin = new GetLogIn();
        $result = $checkLogin -> loginCheck();        
        
        //condition to start a session or not
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
    
            require('view/frontend/adminTools/Template.php');
            
            
        } else {
            
            echo 'Vous n\'êtes pas autorisé à voir cette page, si ce problème est survenu après avoir entré vos identifiant, contacter le développeur.';
              
        }



    }

    //just a little function to count the number of comments for the admin dashboard
    private function tagCount($comments, $count){

        while ($data = $comments -> fetch()){
           
                $count = $count + 1;
        }

            return $count;
    }
    

}