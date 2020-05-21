<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


$timestamp = $_GET['Zeitpunkt']; //Zeitpunkt
$key = $_GET['Key']; //checkt ob DAY, WEEK, MONTH
$sensortyp = $_GET['Sensortyp']; // checkt welcher table
//print_r($key);0

//TODO 
//get user id via e-mail (@live via $_GET)
$get_temp_sql = "SELECT AVG(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date) UNION ALL
 SELECT MAX(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date) UNION ALL
 SELECT MIN(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date)";
//$temp = $pdo->query($get_temp_sql)->fetch();


foreach ($pdo->query($get_temp_sql) as $row) {
    $dataRequest[] = $row['AVG(data)'];
}

echo json_encode($dataRequest);
?>