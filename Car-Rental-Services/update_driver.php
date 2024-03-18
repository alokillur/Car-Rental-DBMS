<?php
include('connection.php');
$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['driver_id'])) {
    $driver_id = $_POST['driver_id'];
    $driver_name = $_POST['driver_name'];
    $dl_number = $_POST['dl_number'];
    $driver_phone = $_POST['driver_phone'];
    $driver_address = $_POST['driver_address'];
    $driver_gender = $_POST['driver_gender'];

    $update_driver_sql = "UPDATE driver SET driver_name = '$driver_name', dl_number = '$dl_number', driver_phone = '$driver_phone', driver_address = '$driver_address', driver_gender = '$driver_gender' WHERE driver_id = $driver_id";

    if(mysqli_query($conn, $update_driver_sql)) {
        header("Location: enterdriver.php");
            exit();
    } else {
        echo "Error updating driver details: " . mysqli_error($conn);
    }
} else {
    echo "Driver ID not provided.";
}

mysqli_close($conn);
?>
