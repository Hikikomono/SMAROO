<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


$sensortyp = $_GET['Sensortyp']; // checkt welcher table


$get_temp_sql = "SELECT state FROM states WHERE sensor = '" . $timestamp . "'";


foreach ($pdo->query($get_temp_sql) as $row) {
$dataRequest = $row['state'];}

echo json_encode($dataRequest);
?>
