<?php

require("blog.php");

session_start();

if($_SESSION['loggedin'] == false) {
    if(isset($_GET['blogpost_id'])) {
        if(blog::checkUserHasLikedPost($_SERVER['REMOTE_ADDR'], $_GET['blogpost_id']) == true) {
            header("Location: ../views/blogpost.php?blogpost_id=" . $_GET['blogpost_id'] . "#likesection");
        } else {
            blog::addblogpost($_SERVER['REMOTE_ADDR'], $_GET['blogpost_id']);
            blog::addLike($_SERVER['REMOTE_ADDR'], $_GET['blogpost_id']);
            header("Location: ../views/blogpost.php?blogpost_id=" . $_GET['blogpost_id'] . "#likesection");
        }
    }
}