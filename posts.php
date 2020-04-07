<?php

require('controller/frontend.php');

if(isset($_GET['action'])){
    
    if($_GET['action'] == 'post'){

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $on = 0;
            post($on);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }

    } elseif ($_GET['action'] == 'submit'){
        if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['sample']) && !empty($_POST['editor'])){
            addPosts($_POST['author'], $_POST['title'], $_POST['sample'], $_POST['editor'] );
            
        } else { 
            echo "c'est non";
        }
    } elseif ($_GET['action'] == "editPosts"){
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $on = 1;
            post($on);
        } elseif(isset($_GET['id']) && $_GET['id'] == 'confirm'){
            if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['sample']) && !empty($_POST['editor']))
            {
                editPosts($_POST['author'], $_POST['title'], $_POST['sample'], $_POST['editor'], $_GET['postId']);
                
                
            } else {
                //ajouter message d'erreur
                echo 'test';
            }
           
        
        } else {
            $on = 1;
            listPosts($on);
        }
    }  elseif(isset($_GET['action']) == 'delete'){
        
        deletePosts($_GET['id']);
         
        }

}
