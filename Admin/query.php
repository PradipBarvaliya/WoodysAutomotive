<?php include('..\dbconnection.php') ?>

<?php
  // admin Login
  if (isset($_POST['adminlogin'])) {

    $username = $_POST['username'];
    $md5password = md5($_POST['password']);
    $sql = "SELECT * FROM admin where username='$username' and password='$md5password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      session_start();
      $_SESSION["adminlogin"] = true;
      $_SESSION["adminame"] = $row['username'];
      header("Location: index.php?status=success&class=success&message=Login%20Successfully");
    } else {
      header("Location: login.php?status=danger&class=danger&message=UserName%20Password%20Check!");
    }
  }

  // Spare Parts Add
  if (isset($_POST['spAdd'])) {

    $spname = $_POST['spname'];
    $spdes = $_POST['spdes'];
    $spprice = $_POST['spprice'];
    $spquantity = $_POST['spquantity'];

    $spimg = $_FILES['spimg']['name'];
    $spimag_temp = $_FILES['spimg']['tmp_name'];
    $spimag_folder = '../assest/img/spareparts/' . $spimg;

    $sql = "insert into sparepartsdetails(name,description,img,price,quantity) values('$spname','$spdes','$spimag_folder',$spprice,$spquantity)";
    if ($conn->query($sql) === TRUE) {
      move_uploaded_file($spimag_temp, $spimag_folder);
      header("Location: addspareparts.php?status=success&class=success&message=Spare%20Parts%20Add%20Successfully");
    } else {
      header("Location: addspareparts.php?status=danger&class=danger&message=Spare%20Parts%20Add%20UnSuccessfully");
    }
  }

  // Spare Parts Update
  if (isset($_POST['spupdate'])) {
    $spid = $_POST['uspid'];
    $spname = $_POST['uspname'];
    $spdes = $_POST['uspdes'];
    $spprice = $_POST['uspprice'];
    $spquantity = $_POST['uspquantity'];

    $uspimg = $_FILES['uspimg']['name'];
    $spimag_temp = $_FILES['uspimg']['tmp_name'];
    $spimag_folder = '../assest/img/spareparts/' . $uspimg;

    if ($uspimg == "") {
      $sql = "update sparepartsdetails set name='$spname',description='$spdes',price='$spprice',quantity='$spquantity' where id= $spid";
    } else {
      $sql = "update sparepartsdetails set name='$spname',description='$spdes',price='$spprice',quantity='$spquantity',img='$spimag_folder' where id= $spid";
      ;
    }
    if ($conn->query($sql) === TRUE) {
      move_uploaded_file($spimag_temp, $spimag_folder);
      header("Location: viewspareparts.php?status=success&class=success&message=Spare%20Parts%20Update%20Successfully");
    } else {
      header("Location: viewspareparts.php?status=danger&class=danger&message=Spare%20Parts%20Update%20UnSuccessfully");
    }
  }

  // Spare Parts Delete
  if (isset($_GET['spdelete'])) {
    $id = $_GET['spdelete'];
    $sql = "delete from sparepartsdetails where id=$id ";
    if (mysqli_query($conn, $sql) === TRUE) {
      header("Location: viewspareparts.php?status=success&class=success&message=Spare%20Parts%20Delete%20Successfully");
    } else {
      header("Location: viewspareparts.php?status=danger&class=danger&message=Spare%20Parts%20Delete%20UnSuccessfully");
    }
  }

  // Employee Add
  if (isset($_POST['AddEmp'])) {

    $empname = $_POST['empname'];
    $empemail = $_POST['empemail'];
    $workerrole = $_POST['workerrole'];

    $empid = rand(pow(10, 4-1), pow(10, 4)-1);
    
    $sql = "insert into emp(name,email,empid,statue,role) values('$empname','$empemail',  $empid,1,'$workerrole')";
    
    if ($conn->query($sql) === TRUE) {
      header("Location: addemp.php?status=success&class=success&message=Employee%20Add%20Successfully");
    } else {
      header("Location: addemp.php?status=danger&class=danger&message=Employee%20Add%20UnSuccessfully");
    }
  }

  // Employee Update
  
  if (isset($_POST['empupdate'])) {

    $uempname = $_POST['uempname'];
    $uempemail = $_POST['uempemail'];
    $uempid = $_POST['emppid'];
    $uworkerrole = $_POST['uworkerrole'];

    
    $sql = "update emp set name='$uempname',email='$uempemail',role='$uworkerrole' where id=$uempid";
    if ($conn->query($sql) === TRUE) {
      header("Location: viewempdetails.php?status=success&class=success&message=Employee%20Update%20Successfully");
    } else {
      header("Location: viewempdetails.php?status=danger&class=danger&message=Employee%20Update%20UnSuccessfully");
    }
  }

  // Employee Delete
  if (isset($_GET['empdelete'])) {
    $id = $_GET['empdelete'];
    $sql = "delete from emp where id=$id";
    if (mysqli_query($conn, $sql) === TRUE) {
      header("Location: viewempdetails.php?status=success&class=success&message=Employee%20Delete%20Successfully");
    } else {
      header("Location: viewempdetails.php?status=danger&class=danger&message=Employee%20Delete%20UnSuccessfully");
    }
  }

  // Accept Appointment
  if (isset($_GET['appointment']) && isset($_GET['status']) && $_GET['status']=="Accept" ) {
    $id = $_GET['appointment'];
    $sql = "update appointment set status='Accept' where id=$id and paymentstatus = 0";
    if (mysqli_query($conn, $sql) === TRUE) {
      header("Location: viewappointment.php?status=success&class=success&message=Appointment%20Accept%20Successfully");
    } else {
      header("Location: viewappointment.php?status=danger&class=danger&message=Appointment%20Accept%20UnSuccessfully");
    }
  }

  // Decline Appointment
  if (isset($_GET['appointment']) && isset($_GET['status']) && $_GET['status']=="Decline" ) {
    $id = $_GET['appointment'];
    $sql = "update appointment set status='Decline' where id=$id and paymentstatus=0";
    
    if (mysqli_query($conn, $sql) === TRUE) {
      header("Location: viewappointment.php?status=success&class=success&message=Appointment%20Decline%20Successfully");
    } else {
      header("Location: viewappointment.php?status=danger&class=danger&message=Appointment%20Decline%20UnSuccessfully");
    }
  }

  // Complete Appointment
  if (isset($_GET['appointment']) && isset($_GET['status']) && $_GET['status']=="Complete" ) {
    $id = $_GET['appointment'];
    $sql = "update appointment set status='Complete' where id=$id and paymentstatus = 0";
    if ($conn->query($sql)) {        
      header("Location: viewacceptappointment.php?status=success&class=success&message=Appointment%20Complete%20Successfully");
    } else {
      header("Location: viewacceptappointment.php?status=danger&class=danger&message=Appointment%20Complete%20UnSuccessfully");
    }
  }

  // Bulid Car 
  if (isset($_POST['bulid'])) {

    $user_id = $_POST['userid'];
    $sp_id = $_POST['selectsp'];
    $emp_id = $_POST['selectemp'];
    $totalquantity = $_POST['totalquantity'];
    $sp_quantity = $_POST['quantity'];
    
    $newquantity = $totalquantity - $sp_quantity;
    $bulid_apply = "update sparepartsdetails set quantity=$newquantity where id=$sp_id";
    if ($conn->query($bulid_apply) === TRUE) {
      $sql = "insert into carbulid(empid,userid,sparepartsquantity,sparepartsid) values($emp_id,$user_id,$sp_quantity,$sp_id)";
      if ($conn->query($sql) === TRUE) {
        $userid = urlencode(base64_encode($user_id));
        header("Location: ingarage.php?user=.$userid&status=success&class=success&message=Bulid%20Apply");
      } else {
        header("Location: ingarage.php?status=danger&class=danger&message=Bulid%20Decline");
      }
    } else {
      header("Location: ingarage.php?status=danger&class=danger&message=Quantity%20Not%20Available");
    }
  }

  // Service Add
  if (isset($_POST['addservice'])) {

    $servicesname = $_POST['servicesname'];
    $servicesprice = $_POST['servicesprice'];
    $locationcity = implode(",",$_POST["locationcity"]);
    $sql = "insert into carservices(servicesname,location,serviceprice) values('$servicesname','$locationcity',$servicesprice)";
    // var_dump($sql);die();
    
    if ($conn->query($sql) === TRUE) {
      header("Location: addservice.php?status=success&class=success&message=Service%20Add%20Successfully");
    } else {
      header("Location: addservice.php?status=danger&class=danger&message=Service%20Add%20UnSuccessfully");
    }
  }

  // Service Update
  if (isset($_POST['serviceupdate'])) {

    $serviceid = $_POST['serviceid'];
    $uservicesname = $_POST['uservicesname'];
    $userviceprice = $_POST['uservicesprice'];
    $ulocationcity = implode(",",$_POST["ulocationcity"]);
    
    $sql = "update carservices set servicesname='$uservicesname',location='$ulocationcity',serviceprice=$userviceprice where id=$serviceid";
    if ($conn->query($sql) === TRUE) {
      header("Location: viewservices.php?status=success&class=success&message=Services%20Update%20Successfully");
    } else {
      header("Location: viewservices.php?status=danger&class=danger&message=Services%20Update%20UnSuccessfully");
    }
  }

  // Service Delete
  if (isset($_GET['servicedelete'])) {
    $id = $_GET['servicedelete'];
    $sql = "delete from carservices where id=$id";
    if (mysqli_query($conn, $sql) === TRUE) {
      header("Location: viewservices.php?status=success&class=success&message=Services%20Delete%20Successfully");
    } else {
      header("Location: viewservices.php?status=danger&class=danger&message=Services%20Delete%20UnSuccessfully");
    }
  }


?>