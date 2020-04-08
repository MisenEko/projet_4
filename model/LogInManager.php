<?php

require_once('model/manager.php');

class GetLogIn extends Manager{

    public function loginCheck(){

        $db = $this -> dbConnect();
        $req = $db -> query('SELECT user, pwd FROM users');
        $result = $req -> fetch(); 
        return $result;

    }
 }