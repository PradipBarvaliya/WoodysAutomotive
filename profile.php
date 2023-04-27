<?php include 'navbar.php'; ?>

<div class="container">
<h2 class="text-center">Profile Details</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Car Number</th>
      <th scope="col">Address</th>
      <th scope="col">Card Number</th>
      <th scope="col">Card Model</th>
      <th scope="col">Card Type</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo  $row['username'];?></td>
      <td><?php echo  $row['phone'];?></td>
      <td><?php echo  $row['email'];?></td>
      <td><?php echo  $row['carno'];?></td>
      <td><?php echo  $row['address'];?></td>
      <td><?php echo  $row['cardnumber'];?></td>
      <td><?php echo  $row['carmodel'];?></td>
      <td><?php echo  $row['cartype'];?></td>
      <td><a class="text-decoration-none text-dark font-weight-bold updateprofile" data-id="<?php echo $row["id"]; ?>" data-phone="<?php echo $row["phone"]; ?>" data-name="<?php echo $row["username"]; ?>" data-email="<?php echo $row["email"]; ?>" data-uucardeatils="<?php echo $row["cardnumber"]; ?>" data-carno="<?php echo $row["carno"]; ?>"data-address="<?php echo $row["address"]; ?>"data-uucarmodel="<?php echo $row["carmodel"]; ?>"data-uucartype="<?php echo $row["cartype"]; ?>">
      <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    </tr> 
  </tbody>
</table>

<h2 class="text-center">Payment History</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Payment Id</th>
      <th scope="col">CardNumber</th>
      <th scope="col">PaymentAmount</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $userid=$row["id"];
        $sql = "SELECT * from paymentdetails where userid= $userid";
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?= $row['paymetid']; ?></td>
      <td><?= $row['cardnumber']; ?></td>
      <td>$<?= $row['amount']; ?>/-</td>
    </tr> 
    <?php } ?>
  </tbody>
</table>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style=" max-width: 60%!important; ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Spare Parts Details Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="query.php" method="POST" >
                    <div class="row col-md-12">
                        <input type="hidden" name="uid" id="uid">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Name</strong></label>
                            <input type="text" name="uuname" placeholder="Enter Name" id="uuname" required>
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Phone</strong></label>
                            <input type="number" name="uuphone" placeholder="Enter phone" id="uuphone">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Email</strong></label>
                            <input type="email" name="uuemail" placeholder="Enter Email"  required id="uuemail">
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Car Number</strong></label>
                            <input type="text" name="uucarno" placeholder="Enter Car Number"       id="uucarno" title="Enter Proper Formate" pattern="[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}" required>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Address</strong></label>
                            <input type="text" name="uuaddress" placeholder="Enter Address"       id="uuaddress">
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong >Card Details</strong></label>
                            <input type="number" name="uucardeatils" id="uucardeatils" placeholder="Enter Card Details" title="Enter Proper Formate" pattern="[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}" min="12"  required>
                        </div>
                    </div>
                    <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Car Model</strong></label>
                        <input type="text" name="uucarmodel" id="uucarmodel" placeholder="Enter Model" required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px;"  required><strong >Car Type</strong></label>
                        <select name="uucartype" id="uucartype" >
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
                    <div class="modal-footer">
                        <input type="submit" name="uupdate" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.updateprofile').on("click", function () {
        $('#exampleModal').modal('show');
        $('#uid').val($(this).attr('data-id'));
        $('#uuname').val($(this).attr('data-name'));
        $('#uuphone').val($(this).attr('data-phone'));
        $('#uuemail').val($(this).attr('data-email'));
        $('#uucarno').val($(this).attr('data-carno'));
        $('#uuaddress').val($(this).attr('data-address'));
        $('#uucardeatils').val($(this).attr('data-uucardeatils'));
        $('#uucarmodel').val($(this).attr('data-uucarmodel'));
        $('#uucartype').val($(this).attr('data-uucartype'));
    });
</script>