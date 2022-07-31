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

if ("GET_ALL" == $action) {
    $db_data = array();
    $sql = "SELECT id, first_name, last_name from $table ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $db_data[] = $row;
        }

        echo json_encode($db_data);
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if ("ADD_EMP" == $action) {

    $sql = "INSERT INTO `$table` (`id`, `first_name`, `last_name`) VALUES ( '$emp_id', '$first_name', '$last_name')";
    if ($conn->query($sql) === TRUE) {
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
    $sql = "SELECT `id` FROM $table WHERE = '$emp_id')";
    $result = $conn->query($sql);
    if($result != '') {
        echo "succes";
    }else{
        echo "error";
    }

    $conn->close();
    return;
}
