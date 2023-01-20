<?php

session_start();
require('config.php');
require('auth.php');

//Holt die User-ID der Session
if (isset($_SESSION['userID'])) {

        $user_id = $_SESSION['userID'];

        } 


$sql = "DELETE FROM ppreg WHERE user_id = $user_id;
        DELETE FROM user WHERE user_id = $user_id;";
// $sql.= "DELETE FROM user WHERE user_id = $user_id";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute();


if ($erfolg) {

        print_r("Record deleted successfully");

} else {

        print_r($erfolg);

};

// session_destroy();