<?php
include('connection.php'); 

$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    // Retrieve car_id and other form data
    $car_id = $_POST['car_id'];
    $car_name = $_POST['car_name'];
    $car_nameplate = $_POST['car_nameplate'];
    $ac_price = $_POST['ac_price'];
    $non_ac_price = $_POST['non_ac_price'];
    $ac_price_per_day = $_POST['ac_price_per_day'];
    $non_ac_price_per_day = $_POST['non_ac_price_per_day'];

    // Prepare and execute the update query
    $update_query = "UPDATE cars 
                    SET car_name='$car_name', 
                        car_nameplate='$car_nameplate', 
                        ac_price='$ac_price', 
                        non_ac_price='$non_ac_price', 
                        ac_price_per_day='$ac_price_per_day', 
                        non_ac_price_per_day='$non_ac_price_per_day' 
                    WHERE car_id='$car_id'";

    // Check if the query was executed successfully
    if(mysqli_query($conn, $update_query)) {
        header("Location: entercar.php");
            exit(); // Stop further execution
    } else {
        echo "Error updating car details: " . mysqli_error($conn);
    }
} else {
    echo "Form submission failed.";
}

// Close the database connection
mysqli_close($conn);
?>
