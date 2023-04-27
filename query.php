
<?php include('dbconnection.php') ?>
<?php

  // user Ragister
  if (isset($_POST['userRagister'])) {

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['Address'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $cardeatils = $_POST['cardeatils'];
    $carno = $_POST['carno'];
    $carmodel = $_POST['carmodel'];
    $cartype = $_POST['cartype'];
    $md5password = md5($_POST['password']);
      

    $cardpattern = '/[0-9]{12}/';
    $cardresult = preg_match($cardpattern,$cardeatils,$cardinfo);

    
  
    if (!$cardresult) {
      header("Location:ragister.php?status=success&class=success&message=Enter%20Properly%20Card%Number");
    }
    if ($password != $repassword) {
      header("Location:ragister.php?status=danger&class=danger&message=Password%20Or%20Re-Password%20Not%20Match");
    }else{
      $checkuser = "SELECT * FROM user WHERE username='$username'";
      $result = $conn->query($checkuser);
      if ($result->num_rows == 0) {
        $sql = "INSERT INTO `user` (username,phone,email,carno,isactive,upassword,address,cardnumber,carmodel,cartype) VALUES ('$username',$phone,'$email','$carno',1,'$md5password','$address',$cardeatils,'$carmodel','$cartype')";
        $rows = $conn->query($sql);
        if ($rows) {
          header("Location:login.php?status=success&class=success&message=Ragister%20Successfully");
        } else {
          header("Location:ragister.php?status=success&class=danger&message=Ragister%20Fail");
        }
      } else {
        header("Location:ragister.php?status=success&class=danger&message=UserName%20Already%20Exists!");
      }
    }
  }

  // addmin Login
  if (isset($_POST['UserLogin'])) {

    $username = $_POST['username'];
    $md5password = md5($_POST['password']);
  
    $sql = "SELECT * FROM user where username='$username' and upassword='$md5password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      session_start();
      $_SESSION["userlogin"] = true;
      $_SESSION["username"] = $row['username'];
      header("Location:index.php?status=success&class=success&message=Login%20Successfully");
    } else {
      header("Location:login.php?status=danger&class=danger&message=UserName%20Password%20Check!");
    }
  }

  // Profile Update
  if (isset($_POST['uupdate'])) {

    $uid = $_POST['uid'];
    $username = $_POST['uuname'];
    $phone = $_POST['uuphone'];
    $email = $_POST['uuemail'];
    $carno = $_POST['uucarno'];
    $address = $_POST['uuaddress'];
    $cardeatils = $_POST['uucardeatils'];
    $carmodel = $_POST['uucarmodel'];
    $cartype = $_POST['uucartype'];

    $pattern = '/[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}/';
    $result = preg_match( $pattern,  $carno , $matches );

    $cardpattern = '/[0-9]{12}/';
    $cardresult = preg_match($cardpattern,$cardeatils,$cardinfo);

    
    if (!$result) {
      header("Location:profile.php?status=success&class=success&message=Enter%20Properly%20Car%Number");
    }
    if (!$cardresult) {
      header("Location:profile.php?status=success&class=success&message=Enter%20Properly%20Card%Number");
    }
    $sql = "update user set username='$username',phone=$phone,email='$email',carno='$carno',address='$address',cardnumber=$cardeatils,cartype='$cartype',carmodel='$carmodel'  where id=$uid";
    $rows = $conn->query($sql);
    if ($rows) {
      session_start();
      $_SESSION["userlogin"] = true;
      $_SESSION["username"] = $username;
      header("Location:profile.php?status=success&class=success&message=Profile%20Update%20Successfully");
    } else {
      header("Location:profile.php?status=success&class=danger&message=Profile%20Update%20Fail");
    }
  }
  
  // Book Appointment 
  if (isset($_POST['appointment'])) {
    $date = $_POST['date'];
    $time = $_POST['time']; 
    $serviceid = $_POST['servicetype']; 
    $selectcity = $_POST['selectcity']; 
    session_start();
    $username = $_SESSION['username'];
    $sql = "SELECT * from user where username= '$username';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userid=$row['id'];
    $checkbookappointment = "SELECT * FROM appointment WHERE userid=$userid and paymentstatus = 0 ";
    $checkbookappointmentresult = $conn->query($checkbookappointment);
    if($checkbookappointmentresult->num_rows == 1){
      header("Location:appointment.php?status=danger&class=danger&message=Appointment%20Already%20Book");
      exit();
    }
    $Appointmentid = rand(pow(10, 6-1), pow(10, 6)-1);
    $sql = "insert into appointment(date,time,userid,status,appointmentid,servicesid,location) values('$date','$time','$userid','Pending',$Appointmentid,$serviceid,'$selectcity')";
    $rows = $conn->query($sql);
    if ($rows) {
      header("Location:appointment.php?status=success&class=success&message=Appointment%20Book%20Successfully");
    } else {
      header("Location:appointment.php?status=success&class=danger&message=Appointment%20Book%20UnSuccessfully");
    }
  }
  
  // get city for services 
  if (isset($_POST['servicecitygetid'])) {
    $id = $_POST['servicecitygetid'];
    $sql = "SELECT * FROM carservices where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    print_r($row['location']);
  }

  // payment
  if (isset($_POST['Payment'])) {

    $cardnumber = $_POST['cardnumber'];
    $userid = $_POST['userid'];
    $paytotal = $_POST['total'];
    $paymentid = rand(pow(10, 12-1), pow(10, 12)-1);
    $sql = "insert into paymentdetails(paymetid,cardnumber,userid,amount) values($paymentid,$cardnumber,$userid,$paytotal)";
    $rows = $conn->query($sql);
    if ($rows) {
      $updatepaymnet = "update appointment set paymentstatus=1 where userid=$userid";
      if ($conn->query($updatepaymnet) === TRUE) {
        $deletebulisql = "delete from carbulid  where userid=$userid ";
        $conn->query($deletebulisql);
        header("Location:index.php?status=success&class=success&message=payment%20Successfully%20Your%20Payment%20Id%20:$paymentid");
      }
    } else {
      header("Location:index.php?status=success&class=danger&message=Paymnet%20Fail");
    }
  }
?>