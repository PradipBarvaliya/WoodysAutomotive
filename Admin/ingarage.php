<?php include 'navbar.php'; ?>
<?php 
    if (isset($_GET['user'])) {
        $id =  base64_decode(urldecode($_GET['user']));
        $sql = "SELECT *,appointment.appointmentid as AId, appointment.location as selectlocation,appointment.id as appointment_id FROM appointment INNER JOIN user ON user.id = appointment.userid INNER JOIN carservices ON carservices.id = appointment.servicesid  WHERE user.id = $id";
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_assoc();
?>
<div class="container">
    
    <div class="d-flex justify-content-around my-5">
        
        <div class="right w-100 ">
            <div class="d-flex" style="grid-column-gap: 11px;">
                
                <table class="w-50">

                    <tr class="border">
                        <th colspan="2" class="w-50 text-center">User Details</th>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Name :</th>
                        <td class="border"><?php echo $row['username']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Phone :</th>
                        <td class="border"><?php echo $row['phone']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Email :</th>
                        <td class="border"><?php echo $row['email']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Date :</th>
                        <td class="border"><?php echo $row['date']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Time :</th>
                        <td class="border"><?php echo $row['time']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-25">Card Details :</th>
                        <td class="border"><?php echo $row['cardnumber']; ?></td>
                    </tr>
                </table>
                <table class="w-50">
                    <tr class="border">
                        <th colspan="2" class="w-50 text-center">Car Details</th>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Appointment Id :</th>
                        <td class="border"><?php echo $row['AId']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Car Number :</th>
                        <td class="border"><?php echo $row['carno']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Car Model :</th>
                        <td class="border"><?php echo $row['carmodel']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Car Type :</th>
                        <td class="border"><?php echo $row['cartype']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Selected City</th>
                        <td class="border"><?php echo $row['selectlocation']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Services Name :</th>
                        <td class="border"><?php echo $row['servicesname']; ?></td>
                    </tr>
                    <tr class="border">
                        <th class="w-50">Services Price :</th>
                        <td class="border">$<?php echo $row['serviceprice']; ?>/-</td>
                    </tr>
                </table>
            </div>


            <div class="d-flex w-75 my-3" style=" grid-column-gap: 22px;">
                <button type="button" class="btn btn-secondary buildcar" data-carno="<?php echo $row['carno']; ?>" data-userid="<?php echo $row['userid']; ?>">Build</button>
                <button type="button" class="btn btn-secondary viewcarbulidetais" data-carno="<?php echo $row['carno']; ?>" data-userid="<?php echo $row['id']; ?>" >View Details</button>
                <button type="button" class="btn btn-secondary" id="inviocemodelopen" data-carno="<?php echo $row['carno']; ?>">Invoice</button>
                <a class="btn btn-secondary" href="query.php?appointment=<?php echo $row['appointment_id']; ?>&status=Complete">Complete Bulid</a>
            </div>
        </div>
    </div>
</div>

<!-- Bulid Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style=" max-width: 60%!important; ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Add Spare Parts <sapn style=" font-size: 14px; font-weight: 700;"> CarNo: <span class="carNumber"></span></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="query.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="userid" id="userid">
                    <input type="hidden" name="totalquantity" id="totalquantity">
                    <div class="row col-md-12">
                        <label style=" padding: 5px 56px; "><strong>Select Spare Parts</strong></label>
                        <select class="sp" name="selectsp" required>
                            <option value="">select Spare Parts </option>
                            <?php 
                                $sql = "select * from sparepartsdetails";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['id'];?>" quantity="<?php echo $row['quantity'];?>"><?php echo $row['name'];?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="row col-md-12">
                            <label style=" padding: 5px 56px; "><strong>Quantity</strong></label>
                            <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" min="1" required>
                    </div>
                    <div class="row col-md-12">
                        <label style=" padding: 5px 56px; "><strong>Select Employee</strong></label>
                        <select  name="selectemp" required>
                            <option value="">Select Employee</option>
                            <?php 
                                $sql = "select * from emp where role='Worker'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="bulid" value="Apply">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Bulid Model -->

<div class="modal fade" id="viewcarbulidetaisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style=" max-width: 60%!important; ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >View Car Bulid Details <sapn style=" font-size: 14px; font-weight: 700;"> CarNo: <span class="carNumber"></span></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <table  class="table table-striped" style="width: 100%;">
                <thead>
                    <th>Employee Name</th>
                    <th>Spare Parts Name</th>
                    <th>Spare Parts Quantity</th>
                    <th>Spare Parts Price</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT emp.name as emp_name ,sparepartsdetails.name,carbulid.sparepartsquantity,sparepartsdetails.price FROM ((carbulid INNER JOIN emp ON carbulid.empid = emp.id) INNER JOIN sparepartsdetails ON carbulid.sparepartsid = sparepartsdetails.id INNER JOIN user ON carbulid.userid = user.id) WHERE carbulid.userid = $id ;";
                    $result = $conn->query($sql);

                    while ($buliddata = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $buliddata["emp_name"]; ?></td>
                            <td><?php echo $buliddata["name"]; ?></td>
                            <td><?php echo $buliddata["sparepartsquantity"]; ?></td>
                            <td>$<?php echo $buliddata["price"]; ?>/-</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Model -->

<div class="modal fade" id="InvioceModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style=" max-width: 60%!important; ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Invoice <sapn style=" font-size: 14px; font-weight: 700;"> CarNo: <span class="carNumber"></span></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <style>
            #mytablecss,
            td,
            th {
            border: 1px solid black;
            border-collapse: collapse;
            }

            #mytablecss {
            width: 700px;
            margin-left: auto;
            margin-right: auto;
            }

            #mytablecss td,
            caption {
            padding: 16px;
            }

            #mytablecss th {
            padding: 16px;
            background-color: #a9b8bd;
            text-align: left;
            }
            </style>
            <?php  
            $sql = "SELECT * FROM appointment INNER JOIN user ON appointment.userid = user.id INNER JOIN carservices ON appointment.servicesid = carservices.id WHERE user.id = $id;";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
        <table id="mytablecss">
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
                <strong class="text-center">Thank You</strong>
                </td>
            </tr>
        </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('.buildcar').on("click", function () {
        $('#exampleModal').modal('show');
        $('#userid').val($(this).attr('data-userid'));
        $('.carNumber').html($(this).attr('data-carno'));
    });
    
    $('.viewcarbulidetais').on("click", function () {
        $('#viewcarbulidetaisModal').modal('show');
        $('#userid').val($(this).attr('data-userid'));
        $('.carNumber').html($(this).attr('data-carno'));
    });
    $('#inviocemodelopen').on("click", function () {
        $('#InvioceModel').modal('show');
        $('.carNumber').html($(this).attr('data-carno'));
    });
    
    $('.sp').on('change', function () {
        $('#quantity').attr("max", $('option:selected', this).attr('quantity'));
        $('#quantity').attr("placeholder","Enter beetween Quantity("+$('option:selected', this).attr('quantity')+")" );
        $('#totalquantity').val($('option:selected', this).attr('quantity'));

    });
</script>
<?php   
}else{
    header("Location:viewacceptappointment.php?status=danger&class=danger&message=Customer%20Dose%20Not%20Exists");
}
}else{
    header("Location:viewacceptappointment.php?status=danger&class=danger&message=Select%20Customer%20");
} ?>

<?php include 'footer.php'; ?>
