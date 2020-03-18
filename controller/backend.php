<?php

require('model/LoginManager.php');

class LogIn{

    public function adminLogin($user, $pwd){

        $checkLogin = new GetLogIn();
        $result = $checkLogin -> loginCheck();

        if(($result['user'] == $user) && ($result['pwd'] == $pwd)){
            require('view/frontend/oui.php');
        } else {
            require('view/frontend/non.php');
        }



    }
}