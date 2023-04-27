<?php
session_start();
if (isset($_SESSION['userlogin']) && $_SESSION['userlogin'] = true) {
    $username = $_SESSION['username'];
} else {
    header("location:logout.php");
}

include "./dbconnection.php";

$sql = "SELECT * from user where username= '$username';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$userid = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woody's Automotive - User Deshbord</title>
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
            <a class="text-light" href="profile.php">Profile</a>
          </li>
          <br>
          <li class="navbar-dropdown">
            <a class="text-light" href="appointment.php">Book Appointment</a>
          </li>
          <li class="navbar-dropdown">
            <a class="text-light" href="usreviewappointment.php">View Appointment</a>
          </li>
          <li class="navbar-dropdown">
            <a class="text-light" href="viewbuliddetails.php?mydetails=.<?php echo urlencode(base64_encode($userid)) ?>">View Bulid</a>
          </li>
        </ul>
    </nav>
    <div class="d-flex">
        <h4 class="text-decoration-None mx-5 text-light" >Welcome <?php echo $username;?></h4>
        <a class="text-decoration-none text-dark  mx-5" href="logout.php"><i class="fa fa-sign-out" style="font-size: 29px; " aria-hidden="true"></i></a>
    </div>
</div>
    <script src="/WoodysAutomotive/assest/js/bootstrap.bundle.min.js" ></script>
    <script>
        $(document).ready(function () {
            $('#example,#example-Bed,#example-Staff-Pation').DataTable();
        });
    </script>
</body>
</html>