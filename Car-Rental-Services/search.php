<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Services</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">CAR RENTAL SERVICES</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                
                <?php
                if(isset($_SESSION['login_client'])){
                    echo '<li><a href="search.php"><span class="glyphicon glyphicon-user"></span> Welcome ' . $_SESSION['login_client'] . '</a></li>';
                    echo '<li><ul class="nav navbar-nav navbar-right">';
                    echo '<li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a href="entercar.php">Add Car</a></li>';
                    echo '<li><a href="enterdriver.php">Add Driver</a></li>';
                    echo '<li><a href="clientview.php">View</a></li>';
                    echo '</ul></li></ul></li>';
                    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } elseif (isset($_SESSION['login_customer'])){
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="search.php"><span class="glyphicon glyphicon-user"></span> Welcome ' . $_SESSION['login_customer'] . '</a></li>';
                    echo '<li><a href="#">History</a></li>';
                    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="clientlogin.php">Client</a></li>';
                    echo '<li><a href="customerlogin.php">Customer</a></li>';
                    echo '<li><a href="#">FAQ</a></li>';
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Car Search Section -->
<div class="container" style="margin-top: 65px;">
    <h2>Search Cars</h2>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Enter car name">
        <button type="submit">Search</button>
    </form>

    <!-- Display Search Results -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Car Name</th>
                <th>Car Nameplate</th>
                <th>AC Price</th>
                <th>Non-AC Price</th>
                <th>AC Price Per Day</th>
                <th>Non-AC Price Per Day</th>
                <th>Car Availability</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection.php');
            $conn = Connect();

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $search_query = "SELECT * FROM cars WHERE car_name LIKE '%$search%'";
                $result = mysqli_query($conn, $search_query);

                // Check if the query executed successfully
                if (!$result) {
                    die("Error executing query: " . mysqli_error($conn));
                }
            } else {
                // If search form is not submitted, fetch all cars
                $result = mysqli_query($conn, "SELECT * FROM cars");

                // Check if the query executed successfully
                if (!$result) {
                    die("Error executing query: " . mysqli_error($conn));
                }
            }

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_name'] . "</td>";
                    echo "<td>" . $row['car_nameplate'] . "</td>";
                    echo "<td>" . $row['ac_price'] . "</td>";
                    echo "<td>" . $row['non_ac_price'] . "</td>";
                    echo "<td>" . $row['ac_price_per_day'] . "</td>";
                    echo "<td>" . $row['non_ac_price_per_day'] . "</td>";
                    echo "<td>" . $row['car_availability'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No cars found</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
