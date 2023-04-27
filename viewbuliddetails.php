<?php include 'navbar.php'; ?>
<?php 
    if (isset($_GET['mydetails'])) {
        $id =  base64_decode(urldecode($_GET['mydetails']));

?>
<style>
table,
td,
th {
  border: 1px solid black;
  border-collapse: collapse;
}

table {
  width: 700px;
  margin-left: auto;
  margin-right: auto;
}

td,
caption {
  padding: 16px;
}

th {
  padding: 16px;
  background-color: #a9b8bd;
  text-align: left;
}
</style>
<div class="container">
    
    <div class="d-flex justify-content-around my-5">
        
        <div class="right w-100 ">
        <?php 
            $userid = $row['id'];
            $sql = "SELECT *,appointment.id as appointmentid FROM appointment INNER JOIN user ON appointment.userid = user.id INNER JOIN carservices ON appointment.servicesid = carservices.id WHERE user.id = $userid and paymentstatus = 0";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>
            <table>
                <tr>
                    <th colspan="2" class="text-center">Invoice</th>
                    <th colspan="2" class="text-center">Appointment Id : <?= $row['appointmentid'];?></th>
                </tr>
                <tr>
                    <td colspan="2">
                    <strong>Bill By:</strong> 
                    <br> <?php echo $row['username'];?> ,<br>
                    <?php echo $row['address'];?> ,<br>
                    <?php echo $row['phone'];?> , <br>
                    <?php echo $row['email'];?>
                    </td>
                    <td colspan="2">
                    <strong>Bill To:</strong> <br>
                    Car Garage, 
                    <?php 
                        $sql = "SELECT * from admin";
                        $result = $conn->query($sql);
                        $adminrow = $result->fetch_assoc();
                    ?>
                    <?php  foreach (explode(",", $adminrow['address'] ) as $address) {
                        echo "$address <br>";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Qty.</th>
                    <th>MRP</th>
                    <th>Amount</th>
                </tr>
                <?php
                    $sql = "SELECT SUM(sparepartsquantity)*price as Total_price,SUM(sparepartsquantity) as total_quantity,sparepartsid,price,name FROM carbulid INNER JOIN sparepartsdetails ON carbulid.sparepartsid = sparepartsdetails.id WHERE carbulid.userid = $id GROUP BY sparepartsid;";
                    $result = $conn->query($sql);
                    $totalpriceofbulid = 0;
                    while ($buliddata = $result->fetch_assoc()) {                        
                        $totalpriceofbulid+=$buliddata["Total_price"];
                        ?>
                <tr>
                    <td><?php echo $buliddata["name"]; ?></td>
                    <td><?php echo $buliddata["total_quantity"]; ?></td>
                    <td>$<?php echo $buliddata["price"]; ?>/-</td>
                    <td>$<?php echo $buliddata["Total_price"]; ?>/-</td>
                </tr>
                <?php }  ?>
                <tr>
                    <th colspan="3">Service Name (<?= $row['servicesname']; ?>):</th>
                    <td>$<?= $row['serviceprice']; ?>/-</td>
                </tr>
                <tr>
                    <th colspan="3">Total:</th>
                    <td>$<?php echo $totalpriceofbulid + $row['serviceprice'] ; ?>/-</td>
                </tr>
                <tr>
                <td colspan="2">
                    <strong>Bank Details:</strong> 
                    <br> Card Number : <?php echo $row['cardnumber'];?>
                    </td>
                    <td colspan="2">
                    <strong class="text-center">Thank You : </strong>
                    <?php
                        if ($row['status'] == "Complete") {
                            ?>
                        <a href="detailsofpayment.php?paypal=.<?php echo urlencode(base64_encode($userid))?>&paytotal=.<?php echo urlencode(base64_encode($totalpriceofbulid + $row['serviceprice'])) ?>" type="button" class="btn btn-success">Payment $<?php echo $totalpriceofbulid + $row['serviceprice'] ; ?>/-</a>
                            <?php
                        }
                    ?>
                    </td>
                </tr>
            </table>
        <?php   
            }else{
                header("Location:index.php?status=danger&class=danger&message=Appointment%20Dose%20Not%20Exists");
            }
        ?>
        </div>
    </div>
</div>


<script>
    $('#inviocemodelopen').on("click", function () {
        $('#InvioceModel').modal('show');
        $('.carNumber').html($(this).attr('data-carno'));
    });
</script>
<?php   
}  ?>
