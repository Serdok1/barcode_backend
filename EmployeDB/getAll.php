<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$table = "deneme";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$db_data = array();
$query = $conn->query("SELECT * FROM `$table`");
while ($rowData = $query->fetch_assoc()) {
    $db_data[] = $rowData;
}
echo json_encode($db_data);
$conn->close();
return;
