<?php
function listPosts()
{
    $posts = getPosts();
    require('./views/listPostView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comment = getComments($_GET['id']);

    require_once('./views/postView.php');
}

function addPost()
{
    setComment();

    $post = getPost($_GET['id']);
    $comment = getComments($_GET['id']);

    require_once('./views/postView.php');
}
