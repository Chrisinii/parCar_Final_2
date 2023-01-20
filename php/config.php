<?php

$host = "localhost";
$user = "530624_3_1";
$password = "vRS2xJ6NKmB9";
$dbname = "530624_3_1";

$pdo = new PDO('mysql:host='. $host . '; dbname=' . $dbname . ';charset=utf8', $user, $password);
$pdo->exec("set names utf8");
