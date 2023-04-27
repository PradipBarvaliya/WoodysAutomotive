<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Decline Appointment Details</h2>
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
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT *,appointment.appointmentid as Bookid,appointment.location as selectlocation,appointment.id as appointment_id FROM appointment INNER JOIN user ON appointment.userid = user.id INNER JOIN carservices ON appointment.servicesid = carservices.id WHERE appointment.status ='Decline' ";
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
                        <?php echo $row["status"]; ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 'Pending') {?>
                            <a href="query.php?appointment=<?= $row['appointment_id'] ?>&status=Accept">Accept</a><br>
                            <a href="query.php?appointment=<?= $row['appointment_id'] ?>&status=Decline">decline</a>
                        <?php } 
                        if ($row['status'] == 'Decline') {?>
                            <a href="query.php?appointment=<?= $row['appointment_id'] ?>&status=Accept">Accept</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>