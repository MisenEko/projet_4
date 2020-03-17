<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require('controller/frontend.php');

try{
    if(isset($_GET['action'])){
        if($_GET['action'] == 'post'){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } elseif (($_GET['action']) == 'addComment') {

                if(isset($_GET['id']) && $_GET['id'] > 0){

                    if(!empty($_POST['author']) && !empty($_POST['content']) ){

                        addComment($_POST['author'], $_POST['content'], $_GET['id']);

                    } else {
                        throw new Exception('c\'est non (add comment)');
                    }
                }

            } elseif (($_GET['action']) == 'editComment') {

                if(isset($_GET['comment_id']) && $_GET['comment_id'] > 0){
                    getCommentByIds();
                } elseif( isset($_GET['edit_id']) && $_GET['edit_id'] > 0) {
                    editComments($_POST['editContent'], $_GET['edit_id']);
                    
                    
                }else {
                    throw new Exception('c\'est non (edit comment)');
                }
        }

    } else {
        listPosts();
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}






