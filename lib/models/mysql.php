<?php

#$user = "root";
#$password = "";
# dbname: id15201087_portfolio
$user = "id15201087_root";
$password = "m(7ozoZ&R0VHgyo!";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=id15201087_portfolio', $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}