<?php
session_start();
if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] = true) {
    $username = $_SESSION['adminame'];
} else {
    header("location:logout.php");
}

include "..\dbconnection.php";

$sql = "SELECT * from admin where username= '$username';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woody's Automotive - Dashbord</title>
    <link rel="icon" type="image/x-icon" href="/WoodysAutomotive/assest/img/favicorn.ico">
    <link href="/WoodysAutomotive/assest/css/index.css" rel="stylesheet">
    <link href="/WoodysAutomotive/assest/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/WoodysAutomotive/assest/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="/WoodysAutomotive/assest/js/jquery-3.5.1.js"></script>
    <script src="/WoodysAutomotive/assest/js/jquery.dataTables.min.js"></script>
    <script src="/WoodysAutomotive/assest/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
<?php
if (isset($_GET['status'])) {
  $status = $_GET['status'];
  $class = $_GET['class'];
  $message = $_GET['message'];
  ?>
                                    <div class="message_alert alert alert-<?php echo $class; ?>" role="alert" style="position: absolute;left: 33%;top: 3%;width: 35%;text-align: center;"><b><?php echo $message; ?></b></div>
                                
                                <script>
                                $(document).ready(function () {
                                    setTimeout(function () {
                                        $(".message_alert").fadeOut();
                                    }, 4000);
                                });
                            </script>
                                <?php
}
?>
    
<div class="menu d-flex justify-content-between align-items-center mb-5">
    <nav class="navbar">
        <ul class="navbar-links">
          <li class="navbar-dropdown">
            <a class="text-light" href="#">Add</a>
            <div class="dropdown">
                <a href="addspareparts.php">Add Spare Parts</a>
                <a href="addservice.php">Add Service</a>
                <a href="addemp.php">Add Employee</a>
            </div>
          </li>
          <br>
          <li class="navbar-dropdown">
            <a class="text-light" href="#">View</a>
            <div class="dropdown">
                <a href="viewspareparts.php">View Spare Parts</a>
                <a href="viewuserdetails.php">View User </a>
                <a href="viewempdetails.php">View Employee </a>
                <a href="viewservices.php">View Services </a>
                <a href="viewappointment.php">View Pending Appointment </a>
                <a href="viewdeclineappointment.php">View Decline Appointment </a>
                <a href="paymentdetails.php">View Payment History </a>
            </div>
          </li>
          <li class="navbar-dropdown">
            <a class="text-light" href="viewacceptappointment.php">Accept Appointment</a>
          </li>
          <li class="navbar-dropdown">
            <a class="text-light" href="ingarage.php">In Garage</a>
          </li>
        </ul>
    </nav>
    <div class="d-flex">
        <h4 class="text-decoration-None mx-5 text-light" >Welcome <?php echo $username;?>(<?= $row['Branch'] ?>)</h4>
        <a class="text-decoration-none text-dark  mx-5" href="logout.php"><i class="fa fa-sign-out" style="font-size: 29px; " aria-hidden="true"></i></a>
    </div>
</div>
    