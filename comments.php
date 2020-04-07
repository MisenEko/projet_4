<?php

require('controller/frontend.php');

if(isset($_GET['action'])){
            if (($_GET['action']) == 'addComment') {
                if(isset($_GET['id']) && $_GET['id'] > 0){

                    if(!empty($_POST['author']) && !empty($_POST['content']) ){

                        addComment($_POST['author'], $_POST['content'], $_GET['id']);

                    } else {
                        throw new Exception('Votre comment n\'a pas été ajouté car il manquait des informtions.');
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
            } elseif(($_GET['action']) == 'reportComment'){
                if(isset($_GET['comment_id']) && $_GET['comment_id'] > 0){
                    tagComments($_GET['comment_id']);
                } elseif($_GET['action'] == 'showReportComment') {
                    showTagComments();                
                } elseif($_GET['action'] == 'deleteComment'){
                    deleteTagComments($id);
                }
            }  elseif(($_GET['action']) == 'showReportComment') {

            showTagComments(); 

            }  elseif($_GET['action'] == 'deleteComment'){

                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    deleteTagComments($_GET['id']);
                }
            } elseif($_GET['action'] == 'validComment'){

                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    untagComments($_GET['id']);
                }
            }
    }