<?php

require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');

function listPosts($on)
{
    $postManager = new ArticleManager();
    $posts = $postManager->getPosts();

    //condition to know wich page has to be show. 0 to show the public post view, 1 to show the admin post view.
    if($on == 0){
    require('view/frontend/main.php');
    } elseif ($on == 1){
        include('view/frontend/adminTools/EditArticles.php'); 
    }
}

function post($on){

    //condition to know wich page has to be show. 0 to show the public single post view, 1 to show the article who need to be edit.
    if($on == 0){

        $commentManager = new CommentManager();
        $postManager = new ArticleManager();

        $singlePost = $postManager->getPost($_GET['id']);
        $comment = $commentManager -> getComments($_GET['id']);

        require("view/frontend/PostView.php");

    } elseif ($on == 1){

        $postManager = new ArticleManager();
        $singlePost = $postManager->getPost($_GET['id']);
        require('view/frontend/adminTools/AddArticles.php');
    }

}

function editPosts($author, $title, $postSample, $content, $postId){
    $postManager = new ArticleManager();
    $postManager -> editPost($author, $title, $postSample, $content, $postId);
    header('location: posts.php?action=editPosts');
}

function addPosts($author, $title, $sample, $editor){

    $postManager = new ArticleManager();
    $addArticle = $postManager ->addPost($author, $title, $sample, $editor);
    
    if ($addArticle === false) {
        die("L'article n'a pas été ajouté.");
    }
    else {
        header('Location: posts.php?action=editPosts');
    }
}

function deletePosts($id){

    $postManager = new ArticleManager();
    $postManager -> deletePost($id);
    header('Location: posts.php?action=editPosts');
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

function tagComments($commentId){
    
    $commentManager = new CommentManager();
    $commentManager -> tagComment($commentId);
    header('location: posts.php?action=post&id=' . $_GET['post_id']);

}

function untagComments($commentId){
    $commentManager = new CommentManager();
    $commentManager -> untagComment($commentId);
    header('location: comments.php?action=showReportComment');

}

function showTagComments(){
    
    $commentManager = new CommentManager();
    $reportComment = $commentManager -> showTagComment();
    require('view/frontend/adminTools/ReportComments.php');
}

function deleteTagComments($id){

    $commentManager = new CommentManager();
    $deleteComment = $commentManager -> deleteTagComment($id);
    header('location: comments.php?action=showReportComment');
    
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
