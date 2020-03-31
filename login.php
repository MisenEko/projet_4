<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try {
    if($_GET['action']){
        if($_GET['action'] == 'adminLogin'){
            if( !empty($_POST['username'] ) && ( !empty($_POST['pwd'] ) ) ){
                $checkLog = new LogIn();
                $checkLog -> adminLogin($_POST['username'], $_POST['pwd']);
                
            } elseif (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
                $checkLog = new LogIn();
                $checkLog -> adminLogin($_SESSION['login'], $_SESSION['pwd']);
                
            }else {
                throw new Exception('Tout les champs doivent être rempli');
            }
        }

    } else {
        require('login.php');
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}