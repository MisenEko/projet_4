<?php
error_reporting(-1);
require_once('model/showPost.php');
//require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new ShowPostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/showPostView.php');
}
