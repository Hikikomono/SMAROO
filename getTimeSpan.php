<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


    $fromDate = $_GET['From']; //dateFrom
    $toDate = $_GET['To']; //dateTo
    $sensortyp = $_GET['Sensortyp']; // checkt welcher table


    $get_temp_sql = "SELECT CONVERT(DATE, date), AVG(data) FROM " . $sensortyp . " WHERE date BETWEEN '" . $fromDate . "' AND '" . $toDate . "' GROUP BY CONVERT(DATE, date)";


    foreach ($pdo->query($get_temp_sql) as $row) {
        $dataRequest[] = $row['AVG(data)'];
    }

    echo json_encode($dataRequest);
}catch (PDOException $e){
    echo "Error while connecting to Database: $e->getMessage()";
    die();
}
