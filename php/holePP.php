<?php

//echo "alle PP";

require('config.php');

$sql = "SELECT * FROM ppreg";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute();

if ($erfolg) {

    $array = $stmt->fetchAll();

    $jsonArray = json_encode($array);

    print_r($jsonArray);
}