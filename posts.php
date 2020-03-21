<?php

require('controller/frontend.php');

if(isset($_GET['action'])){
    if($_GET['action'] == 'post'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } elseif ($_GET['action'] == 'submit'){
        if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['sample']) && !empty($_POST['editor'])){
            addPosts($_POST['author'], $_POST['title'], $_POST['sample'], $_POST['editor'] );
            
        }
    }

}
