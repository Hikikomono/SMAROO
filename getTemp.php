<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "faelb", "faelb");


$timestamp = $_GET['Zeitpunkt'];
$key = $_GET['Key'];

//print_r($key);
//hier noch code um zu prüfen ob Tag Monat oder Jahr gefragt ist, je nachdem das statement variabel gestalten

//get user id via e-mail (@live via $_GET)
$get_temp_sql = "SELECT AVG(data) FROM temperatur WHERE " . $key . "('" . $timestamp . "') = " . $key . "(Zeitpunkt)";
$temp = $pdo->query($get_temp_sql)->fetch();

//print_r(json_encode($temp));


echo json_encode($temp);
?>