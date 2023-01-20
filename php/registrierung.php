<?php   

require('config.php');

$mail = $_POST["mail"];
$vname = $_POST["vname"];
$nname = $_POST["nname"];
$password = $_POST["password"];
$fznr = $_POST["fznr"];
$iban = $_POST["iban"];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (vorname, nachname, mail, password, fz_nr, iban) VALUES (:Vorname, :Nachname, :Email, :Password, :Fz_Nr, :Iban)";

$stmt = $pdo->prepare($sql);

$erfolg = $stmt->execute(array('Vorname' => $vname, 'Nachname' => $nname, 'Email' => $mail, 'Password' => $password, 'Fz_Nr' => $fznr,'Iban' => $iban,));

if ($erfolg) {

    print_r('Registrierung erfolgreich.');
    
} else {

    print_r($erfolg);
};