<?php
include('session_client.php');
$conn = Connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['driver_id'])) {
    $driver_id = $_GET['driver_id']; // Correct variable name here

    $sql = "SELECT * FROM driver WHERE driver_id = $driver_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- Add your custom stylesheets and scripts here -->
</head>
<body>
    <!-- Navigation -->
    <!-- Your navigation code goes here -->

    <div class="container" style="margin-top: 65px;">
        <div class="col-md-7" style="float: none; margin: 0 auto;">
            <div class="form-area">
                <form role="form" action="update_driver.php" enctype="multipart/form-data" method="POST">
                    
                    <input type="hidden" name="driver_id" value="<?php echo $row['driver_id']; ?>">
                    
                    
          <div class="form-group">
          <label for="car_name">Driver Name:</label>
            <input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php echo $row['driver_name']; ?>" required autofocus>
          </div>

          <div class="form-group">
          <label for="car_name">License Number:</label>
            <input type="text" class="form-control" id="dl_number" name="dl_number" value="<?php echo $row['dl_number']; ?>" required autofocus>
          </div>     

          <div class="form-group">
          <label for="car_name">Contact:</label>
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" value="<?php echo $row['driver_phone']; ?>" required autofocus>
          </div>

          <div class="form-group">
          <label for="car_name">Address:</label>
            <input type="text" class="form-control" id="driver_address" name="driver_address" value="<?php echo $row['driver_address']; ?>" required autofocus>
          </div>

          <div class="form-group">
          <label for="car_name">Gender:</label>
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" value="<?php echo $row['driver_gender']; ?>" required autofocus>
          </div>
                    
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Update</button>    
                </form>
            </div>
        </div>
    </div>

    <!-- Footer --> 
    <!-- Your footer code goes here -->
</body>
</html>
<?php
    } else {
        echo "No driver found for the specific id";
    }
} else {
    echo "Driver ID is not provided.";
}
?>
