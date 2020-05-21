<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


$sensortyp = $_GET['Sensortyp']; // checkt welcher table


//$get_temp_sql = "SELECT state FROM states WHERE sensor = '" . $timestamp . "'";
//$temp = $pdo->query($get_temp_sql)->fetch();
$statement = $pdo->prepare("SELECT state FROM states WHERE sensor = '" . $timestamp . "'");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


//foreach ($pdo->query($get_temp_sql) as $row) {
 //   $dataRequest[] = $row;
//}

echo json_encode($results);
?>
