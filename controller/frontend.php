<?php
error_reporting(-1);
require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new ArticleManager();
    $posts = $postManager->getPosts();

    require('view/frontend/showPostView.php');
}

function post(){
    
    $commentManager = new CommentManager();
    $postManager = new ArticleManager();

    $singlePost = $postManager->getPost($_GET['id']);
    $comment = $commentManager -> getComments($_GET['id']);

    require("view/frontend/singlePostView.php");

}

function addComment($pseudo, $content, $idPost){

    $commentManager = new CommentManager();
    $addLine = $commentManager -> addCommentDb($pseudo, $content, $idPost);

    if ($addLine === false) {
        die("Le commentaire n'a pas été ajouté.");
    }
    else {
        header('Location: posts.php?action=post&id=' . $idPost);
    }


}

function getCommentByIds(){
    $commentManager = new CommentManager();

    $contents = $commentManager ->getCommentById($_GET['comment_id']);
    $comId = $_GET['comment_id'];
    



    require("view/frontend/EditComment.php");
}

function editComments($editContent, $id){
    $commentManager = new CommentManager();
    $editComment = $commentManager -> editComment($editContent, $id);

    if ($editComment === false) {
        die("Le commentaire n'a pas été ajouté.");
    }
    else {
        header('Location: index.php');
    }
}
