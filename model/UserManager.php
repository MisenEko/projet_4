<?php

require_once("model/manager.php");

class UserManager extends Manager{

    function getAdmin(){

        $db = $this -> dbConnect();
        $req = $db -> query('SELECT id, user, pwd FROM users');
        $login = $req -> fetch();
        return $login;
    }

}