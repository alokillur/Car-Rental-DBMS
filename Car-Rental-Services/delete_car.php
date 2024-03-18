<?php
include('connection.php'); 

$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    $delete_clientcars_sql = "DELETE FROM clientcars WHERE car_id = '$car_id'";
    if(mysqli_query($conn, $delete_clientcars_sql)) {
        $delete_cars_sql = "DELETE FROM cars WHERE car_id = '$car_id'";
        if(mysqli_query($conn, $delete_cars_sql)) {
            header("Location: entercar.php");
            exit(); 
        } else {
            echo "Error deleting car: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting associated client records: " . mysqli_error($conn);
    }
} else {
    echo "Car ID not provided.";
}

mysqli_close($conn);
?>
