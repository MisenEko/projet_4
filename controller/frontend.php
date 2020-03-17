<?php
error_reporting(-1);
require_once('model/showPost.php');
require_once('model/showComment.php');

function listPosts()
{
    $postManager = new ShowPostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/showPostView.php');
}

function post(){
    
    $commentManager = new ShowCommentManager();
    $postManager = new ShowPostManager();

    $singlePost = $postManager->getPost($_GET['id']);
    $comment = $commentManager -> getComments($_GET['id']);

    require("view/frontend/singlePostView.php");

}

function addComment($pseudo, $content, $idPost){

    $commentManager = new ShowCommentManager();
    $addLine = $commentManager -> addCommentDb($pseudo, $content, $idPost);

    if ($addLine === false) {
        die("Le commentaire n'a pas été ajouté.");
    }
    else {
        header('Location: index.php?action=post&id=' . $idPost);
    }


}

function getCommentByIds(){
    $commentManager = new ShowCommentManager();

    $contents = $commentManager ->getCommentById($_GET['comment_id']);
    $comId = $_GET['comment_id'];
    



    require("view/frontend/EditComment.php");
}

function editComments($editContent, $id){
    $commentManager = new ShowCommentManager();
    $editComment = $commentManager -> editComment($editContent, $id);

    if ($editComment === false) {
        die("Le commentaire n'a pas été ajouté.");
    }
    else {
        header('Location: index.php');
    }
}
