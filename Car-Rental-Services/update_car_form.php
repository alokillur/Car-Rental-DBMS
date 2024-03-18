<?php
include('session_client.php');
// include('connection.php'); 
require_once('connection.php');
if(isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    $sql = "SELECT * FROM cars WHERE car_id = $car_id";
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
                <form role="form" action="update_car_process.php" enctype="multipart/form-data" method="POST">
                    
                    <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
                    
                    <div class="form-group">
                        <label for="car_name">Car Name:</label>
                        <input type="text" class="form-control" id="car_name" name="car_name" value="<?php echo $row['car_name']; ?>" required autofocus>
                    </div>
                    <div class="form-group">
                    <label for="car_name">Vehicle Number:</label>
                        <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" value="<?php echo $row['car_nameplate']; ?>" required autofocus>
                    </div>     

                    <div class="form-group">
                    <label for="car_name">AC Fare per km (in rupees):</label>
                        <input type="text" class="form-control" id="ac_price" name="ac_price" value="<?php echo $row['ac_price']; ?>" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="car_name">Non-AC Fare per km (in rupees):</label>
                        <input type="text" class="form-control" id="non_ac_price" name="non_ac_price" value="<?php echo $row['non_ac_price']; ?>" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="car_name">AC Fare per day (in rupees):</label>
                        <input type="text" class="form-control" id="ac_price_per_day" name="ac_price_per_day" value="<?php echo $row['ac_price_per_day']; ?>" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="car_name">Non-AC Fare per day (in rupees):</label>
                        <input type="text" class="form-control" id="non_ac_price_per_day" name="non_ac_price_per_day" value="<?php echo $row['non_ac_price_per_day']; ?>" required autofocus>
                    </div>

                    <!-- <div class="form-group">
                    <label for="car_name">Upload Image:</label>
                        <input name="uploadedimage" type="file">
                    </div> -->

                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Update Car</button>    
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
        echo "No car found with the provided ID.";
    }
} else {
    echo "Car ID is not provided.";
}
?>
