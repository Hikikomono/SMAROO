<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


    $timestamp = $_GET['Zeitpunkt']; //Zeitpunkt
    $key = $_GET['Key']; //checkt ob DAY, WEEK, MONTH
    $sensortyp = $_GET['Sensortyp']; // checkt welcher table


    $get_temp_sql = "SELECT AVG(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date) UNION ALL
 SELECT MAX(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date) UNION ALL
 SELECT MIN(data) FROM " . $sensortyp . " WHERE " . $key . "('" . $timestamp . "') = " . $key . "(date)";


    foreach ($pdo->query($get_temp_sql) as $row) {
        $dataRequest[] = $row['AVG(data)'];
    }
//echo json_encode($dataRequest);
    echo json_encode($dataRequest);
}catch (PDOException $e){
    echo "Error while connecting to Database: $e->getMessage()";
    die();
}
?>