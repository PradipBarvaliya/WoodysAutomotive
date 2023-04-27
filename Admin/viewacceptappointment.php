<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Accept/Complete Appointment Details</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Appointment Id</th>
            <th>Date</th>
            <th>Time</th>
            <th>User Name</th>
            <th>User phone</th>
            <th>Location</th>
            <th>Car Number</th>
            <th>Car Type</th>
            <th>Car Model</th>
            <th>Service</th>
            <th>Payment Status</th>
            <th>Status</th>
            <th>In Garage</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT *,appointment.appointmentid as Bookid,appointment.location as selectlocation,
            appointment.id as appointment_id FROM appointment INNER JOIN user ON appointment.userid = user.id INNER JOIN carservices ON appointment.servicesid = carservices.id WHERE appointment.status ='Accept' or appointment.status = 'Complete' ";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["Bookid"]; ?>
                    </td>
                    <td>
                        <?php echo $row["date"]; ?>
                    </td>
                    <td>
                        <?php echo $row["time"]; ?>
                    </td>
                    <td>
                        <?php echo $row["username"]; ?>
                    </td>
                    <td>
                        <?php echo $row["phone"]; ?>
                    </td>
                    <td>
                        <?php echo $row["selectlocation"]; ?>
                    </td>
                    <td>
                        <?php echo $row["carno"]; ?>
                    </td>
                    <td>
                        <?php echo $row["carmodel"]; ?>
                    </td>
                    <td>
                        <?php echo $row["cartype"]; ?>
                    </td>
                    <td>
                        <?php echo $row["servicesname"]; ?>
                    </td>
                    <td>
                        <?php if ($row["paymentstatus"]==0) {
                            echo "Payment Pending";
                        }elseif($row["paymentstatus"]==1){
                            echo "Payment Complete";
                        }?>
                    </td>
                    <td>
                        <?php echo $row["status"]; ?>
                    </td>
                    <td>
                        <?php 
                            if ($row["status"]=="Accept") {
                                ?>
                            <a href="ingarage.php?user=.<?php echo urlencode(base64_encode($row["userid"])) ?>">In Garage</a>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>