<?php
include "..\dbconnection.php";
session_start();
if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']) {
	header("Location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woody's Automotive - Login</title>
    <link rel="icon" type="image/x-icon" href="/WoodysAutomotive/assest/img/favicorn.ico">
    <link href="/WoodysAutomotive/assest/css/index.css" rel="stylesheet">
    <link href="/WoodysAutomotive/assest/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/WoodysAutomotive/assest/js/jquery.min.js"></script>
</head>
<body>
<?php
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $class = $_GET['class'];
    $message = $_GET['message'];
    ?>
            <div class="message_alert alert alert-<?php echo $class; ?>" role="alert" style="position: absolute;left: 34%;top: 3%;width: 32%;text-align: center;"><b><?php echo $message; ?></b></div>
                <script>
                                $(document).ready(function () {
                                    setTimeout(function () {
                                        $(".message_alert").fadeOut();
                                    }, 4000);
                                });
                            </script>
            <?php } ?>
    <div class="card-form">
        <form action="query.php" method="POST">
        
            <div class="form-title">Login For Admin!</div>
            <div class="form-body">
                <div class="row">
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <div class="row">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="adminlogin" value="Login">
                </div>
            </div>
        </form>
    </div>
</body>
</html>