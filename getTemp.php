<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "faelb", "faelb");


$timestamp = $_GET['Zeitpunkt'];


//get user id via e-mail (@live via $_GET)
$get_temp_sql = "SELECT * FROM temperatur WHERE Zeitpunkt='" . $timestamp . "'";
$temp = $pdo->query($get_temp_sql)->fetch();
//$temp = $temp['temperatur']; //fetch gibt ein Tupel zurück


echo json_encode($temp);
?>