<?php
include "./dbconnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woody's Automotive - Ragister</title>
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
            <div class="form-title">Ragister </div>
            <div class="form-body">
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Username</strong></label>
                        <input type="text" name="username" placeholder="Enter Username" >
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Phone</strong></label>
                        <input type="number" name="phone" placeholder="Enter Phone" title="Enter Proper Formate" min="10" pattern="[0-9]{10}" required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Email</strong></label>
                        <input type="email" name="email" placeholder="Enter Email"  required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Address</strong></label>
                        <input type="text" name="Address" placeholder="Enter Address" required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Password</strong></label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Re-Password</strong></label>
                        <input type="password" name="repassword" placeholder="Enter Re-Password" required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Card Details</strong></label>
                        <input type="number" name="cardeatils" placeholder="Enter Card Details" title="Enter Proper Formate" pattern="[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}" min="12"  required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Car-Number</strong></label>
                        <input type="text" name="carno" placeholder="Enter Car-Number" required >
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Car Model</strong></label>
                        <input type="text" name="carmodel" placeholder="Enter Model" required>
                    </div>
                    <div class="row col-md-6">
                    <label style=" padding: 5px 22px; " ><strong >Car Type</strong></label>
                        <select name="cartype" required>
                          <option value="">Select Car Type</option>
                            <option value="MICRO">MICRO</option>
                            <option value="CUV">CUV</option>
                            <option value="SUV">SUV</option>
                            <option value="PICKUP">PICKUP</option>
                            <option value="VAN">VAN</option>
                            <option value="COUPE">COUPE</option>
                        </select>
                          
                    </div>
                </div>
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="userRagister" value="Ragister">
                </div>
                <div class="row w-75 text-start" style="margin: 8px; ">
                    <p>Already have an account? <a class="text-primary" href="login.php">Sign In</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>