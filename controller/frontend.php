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
