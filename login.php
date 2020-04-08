<?php

require('controller/frontend.php');
require('controller/backend.php');

try {
    if($_GET['action']){
        if($_GET['action'] == 'adminLogin'){
            if( !empty($_POST['username'] ) && ( !empty($_POST['pwd'] ) ) ){
                $checkLog = new LogIn();
                $checkLog -> adminLogin($_POST['username'], $_POST['pwd']);
                
            } if( session_id() == "" && session_id() == NULL){
                session_start();
                if (isset($_SESSION['login']) && isset($_SESSION['password'])){                    
                    $checkLog = new LogIn();
                    $checkLog -> adminLogin($_SESSION['login'], $_SESSION['password']);
                }
                
            }elseif(isset($_SESSION['login']) && isset($_SESSION['password'])){
                $checkLog = new LogIn();
                $checkLog -> adminLogin($_SESSION['login'], $_SESSION['password']);
            }           
            
            else {
                var_dump($_SESSION);
            }
        }

    } else {
        require('login.php');
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}