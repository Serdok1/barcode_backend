<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$table = "employees";
$conn = new mysqli($servername, $username, $password, $dbname);

$db_data = array();
$query = $conn->query("SELECT * FROM `$table` ");
while ($rowData = $query->fetch_assoc()) {
    $db_data[] = $rowData;
}
echo json_encode($db_data);
$conn->close();
return;
