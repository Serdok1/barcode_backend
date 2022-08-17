<?php $db = mysqli_connect('localhost','root','','barcode');
if (!$db) {
    echo "Database connection failed";
}

$image = $_FILES['image']['name'];
$name = $_POST['name'];

$imagePath = 'EmployeDB/uploads/'.$image;
$tmp_name = $_FILES['image']['name'];

move_uploaded_file($tmp_name, $imagePath);

$db->query("INSERT INTO `images` (`name`, `image`) VALUES ('$name', '$image')");

?>