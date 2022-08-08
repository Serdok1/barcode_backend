<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$table = "employees";

$action = $_POST["action"];
$emp_id = $_POST['emp_id'];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$id = $_POST['id'];
$dateTime = $_POST['dateTime'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ("CREATE_TABLE" == $action) {
    $sql = "CREATE TABLE $dbname.$table ( `id` INT(6) NOT NULL ,
     `first_name` VARCHAR(30) NOT NULL , `last_name` VARCHAR(30) NOT NULL )";

    if ($conn->query($sql) === true) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if ("ADD_EMP" == $action) {

    $sql = "INSERT INTO `$table` (`id`, `first_name`, `last_name`) VALUES ( '$emp_id', '$first_name', '$last_name')";
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    /* if ($conn->query($sql) === true) {
    echo "succes";
    } else {
    echo "error";
    } */
    $conn->close();
    return;
}

if ("ADD_HISTORY" == $action) {

    $sql = "INSERT INTO `history` (`id`, `dateTime`) VALUES ( '$id', '$dateTime')";
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    /* if ($conn->query($sql) === true) {
    echo "succes";
    } else {
    echo "error";
    } */
    $conn->close();
    return;
}


if ("UPDATE_EMP" == $action) {
    $emp_id = $_POST['$emp_id'];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $sql = "UPDATE $table SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$table.$emp_id'";
    if ($conn->query($sql) === true) {
        echo "succes";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if ('DELETE_EMP' == $action) {
    $sql = "DELETE FROM `$table` WHERE `id` = $emp_id";
    if ($conn->query($sql) === true) {
        echo "succes";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if ("CHECK_ID" == $action) {
    $sql = "SELECT * FROM `$table` WHERE `id` = $emp_id";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

      if ($count>0) {
    echo "exist";
    } else {
    echo "notexist";
    }
 
    $conn->close();
    return;
}

if ("GET_ID" == $action) {
    $sql = "SELECT * FROM `history`";
    $result = $conn->query($sql);

    echo $result;
 
    $conn->close();
    return;
}
