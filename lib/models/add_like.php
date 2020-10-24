<?php

require('blog.php');
require('mysql.php');

# get blogpost id
$id = $_GET['blogpost_id'];

# add like to blogpost
blog::addLike($_SERVER['REMOTE_ADDR'], $id);
blog::addblogpost($_SERVER['REMOTE_ADDR'], $id);

# return likes from blogpost
echo blog::getLikes($id);

