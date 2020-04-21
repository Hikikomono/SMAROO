<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "faelb", "faelb");


$timestamp = $_GET['Zeitpunkt']; //Zeitpunkt
$key = $_GET['Key']; //checkt ob DAY, WEEK, MONTH
$sensortyp = $_GET['Sensortyp']; // checkt welcher table
//print_r($key);0

//TODO 
//get user id via e-mail (@live via $_GET)
$get_temp_sql = "SELECT AVG(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(Zeitpunkt)";
$temp = $pdo->query($get_temp_sql)->fetch();



//print_r(json_encode($temp));


echo json_encode($temp);
?>