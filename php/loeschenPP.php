<?php

session_start();
require('config.php');
require('auth.php');

//Holt die User-ID der Session
if (isset($_SESSION['userID'])) {

        $user_id = $_SESSION['userID'];

        } 

$pp_id = $_POST["pp_id"];

$sql = "DELETE FROM ppreg WHERE pp_id = $pp_id";


$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute();


if ($erfolg) {

        print_r("PP deleted successfully");

} else {

        print_r($erfolg);

};

