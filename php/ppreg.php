<?php

require('config.php');

$strasse = $_POST["strasse"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$startdatum = $_POST["startdatum"];
$enddatum = $_POST["enddatum"];

session_start();

if(isset($_SESSION['userID'])) {
    $userid = $_SESSION['userID'];
}else{
    echo 'Du bist nicht eingeloggt.';
    return;
}

// $strasse = "Goldgasse 23";
// $plz = "7000";
// $ort = "Chur";
// $startdatum = "12.01.2023";
// $enddatum = "22.01.2023";

print_r($userid);

$sql = "INSERT INTO ppreg (strasse, plz, ort, user_id, startdatum, enddatum) VALUES (:Strasse, :PLZ, :Ort, :User_Id, :Startdatum, :Enddatum)";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute(array('Strasse' => $strasse, 'PLZ' => $plz, 'Ort' => $ort, 'User_Id' => $userid, 'Startdatum' => $startdatum, 'Enddatum' => $enddatum));

if ($erfolg) {

    print_r('Parkplatz erfasst.');
} else {
    print_r($erfolg);
};