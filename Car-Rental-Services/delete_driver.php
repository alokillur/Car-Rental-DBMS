<?php
include('connection.php');
$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['driver_id']) && !empty($_GET['driver_id'])) {
    $driver_id = $_GET['driver_id'];

    $delete_rentedcars_sql = "DELETE FROM rentedcars WHERE driver_id = $driver_id";
    if(mysqli_query($conn, $delete_rentedcars_sql)) {
        $delete_driver_sql = "DELETE FROM driver WHERE driver_id = $driver_id";
        if(mysqli_query($conn, $delete_driver_sql)) {
            header("Location: enterdriver.php");
            exit();
        } else {
            echo "Error deleting driver: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting associated rented cars: " . mysqli_error($conn);
    }
} else {
    echo "Driver ID not provided.";
}

mysqli_close($conn);
?>
