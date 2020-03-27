<?php

require('model/LoginManager.php');

class LogIn{

    public function adminLogin($user, $pwd){

        $checkLogin = new GetLogIn();
        $result = $checkLogin -> loginCheck();

        if(($result['user'] == $user) && ($result['pwd'] == $pwd)){
            session_start();
            $_SESSION['login'] = $result['user'];
            $_SESSION['pwd'] = $result['pwd'];
            
            
            header('location: ./view/frontend/adminTools/template.php');
            
            
        } else {
            require('view/frontend/non.php');
        }



    }
}