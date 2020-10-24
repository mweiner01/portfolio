<?php
/*
* All rights reserved, Copyright (c) by Max Weiner
*
* @author: Max Weiner
* @file: index.php
* @date: 06/10/2020
*/

// get the load_page function and Database functions
require('lib/init.php');
require('lib/models/mysql.php');
require('lib/models/blog.php');
require('lib/models/Account.php');

// define page with ?page=$page
$page = @$_GET['page'];

// if page exists by index.php?page=$page load page, else load index.php
if($page) {
    load_page($page);
} else {
    load_page("home");
    require('lib/models/mysql.php');
}