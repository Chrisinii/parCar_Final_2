<?php

//echo "alle PP";

require('config.php');

$plz = $_POST["plz"];
$startdatum = $_POST["startdatum"];
$enddatum = $_POST["enddatum"];

// $plz = "7000";
// $startdatum = "13.01.2023";
// $enddatum = "21.02.2023";

$sql = "SELECT * FROM ppreg WHERE plz = '$plz' AND startdatum <= '$startdatum' AND enddatum >= '$enddatum';";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute();

if ($erfolg) {

    $array = $stmt->fetchAll();

    $jsonArray = json_encode($array);

    print_r($jsonArray);
}

// $plz = $_POST["plz"];

// // $plz = "7000";

// $sql = "SELECT * FROM ppreg WHERE plz like '%$plz%';";

// $stmt = $pdo->prepare($sql);

// $erfolg = $stmt->execute();

// if ($erfolg) {

//     $array = $stmt->fetchAll();

//     $jsonArray = json_encode($array);

//     print_r($jsonArray);
// }