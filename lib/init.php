<?php
/*
* All rights reserved, Copyright (c) by Max Weiner
*
* @author: Max Weiner
* @file: init.php
* @date: 06/10/2020
*/


// if files $page.class.php and $page.php exist include them, else include 404 page.
function load_page($page) {
    if(file_exists("lib/controllers/" . $page . ".class.php") && file_exists("lib/views/" . $page . ".php")) {
        include('controllers/' . $page .'.class.php');
        include('views/' . $page . '.php');
    } else {
        include('controllers/404.class.php');
        include('views/404.php');
    }
}
