<?php

//echo "alle PP";

session_start();
require('config.php');

if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];

    }

$sql = "SELECT * FROM ppreg WHERE user_id = $userID";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute();

if ($erfolg) {

    $array = $stmt->fetchAll();

    $jsonArray = json_encode($array);

    print_r($jsonArray);
}