<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");

//holt sich die aktuellen states aus der Datenbank und returned diese als Array


    $get_temp_sql = "SELECT state FROM states";


    foreach ($pdo->query($get_temp_sql) as $row) {
        $dataRequest[] = $row['state'];
    }


    echo json_encode($dataRequest);
}catch (PDOException $e){
    echo "Error while connecting to Database: $e->getMessage()";
    die();
}
?>
