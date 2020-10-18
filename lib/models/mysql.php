<?php

$user = "root";
$password = "";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=portfolio', $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}