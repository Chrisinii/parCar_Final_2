<?php

session_start();
require('config.php');

//Holt die User-ID der Session
if (isset($_SESSION['userID'])) {

        $user_id = $_SESSION['userID'];

        }


$nname = $_POST["nachname"];
$mail = $_POST["mail"];
$password = $_POST["password"];
$fz_nr = $_POST["fz_nr"];
$iban = $_POST["iban"];

if ($password == '') {

    //Nichts machen

} else {

    $password = password_hash($password, PASSWORD_DEFAULT); 

}



//IF(LENGTH) um leere Strings in der Datenbank zu vermeiden
$sql = "UPDATE user SET nachname=IF(LENGTH('$nname')=0, nachname, ?), mail=IF(LENGTH('$mail')=0, mail, ?), password=IF(LENGTH('$password')=0, password, ?), fz_nr=IF(LENGTH('$fz_nr')=0, fz_nr, ?), iban=IF(LENGTH('$iban')=0, iban, ?) WHERE user_id =?";
$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute([$nname, $mail, $password, $fz_nr, $iban, $user_id]);

if ($erfolg) {

        print_r('Änderungen wurden gespeichert!');

    } else {
    
        print_r($erfolg);
        print_r('Da ist was schief gelaufen!');
    };
