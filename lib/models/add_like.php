<?php


session_start();


require('blog.php');
require('mysql.php');

# get blogpost id
$id = $_GET['blogpost_id'];

if (isset($id)) {
    if(isset($_SESSION['username'])) {
        if (blog::checkUserHasLikedPost($_SESSION['username'], $id)) {
            echo blog::getLikes($id);
        } else {
            blog::addblogpost($_SESSION['username'], $id);
            blog::addLike($id);

            echo blog::getLikes($id);
        }
    }
}

