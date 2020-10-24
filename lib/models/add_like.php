<?php


session_start();


require('blog.php');
require('mysql.php');

# get blogpost id
$id = $_GET['blogpost_id'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($id)) {
    if(!blog::checkUserHasLikedPost($ip, $id)) {
        blog::addLike($ip, $id);
        blog::addblogpost($ip, $id);
        echo blog::getLikes($id);
    }
}

