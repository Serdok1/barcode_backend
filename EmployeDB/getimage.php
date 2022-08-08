<?php
$db = mysqli_connect('localhost','root','','barcode');
if(!$db) {
    echo "Database connection failed";
}
$id = $_POST['id'];
$person = $db->query("SELECT * FROM `images` WHERE `id` = $id;
");
$list = array();
$result = $rowdata = $person->fetch_assoc();

echo json_encode($result);
?>