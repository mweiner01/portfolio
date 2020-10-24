<?php


session_start();


require('blog.php');
require('mysql.php');

# get blogpost id
$id = $_GET['blogpost_id'];
$username = $_SESSION['username'];

if(isset($id)) {
    if(!blog::checkUserHasLikedPost($username, $id)) {
        blog::addLike($username, $id);
        blog::addblogpost($username, $id);
        echo blog::getLikes($id);
    } else {
        echo blog::getLikes($id);
    }
}

