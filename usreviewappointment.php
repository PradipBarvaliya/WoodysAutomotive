<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Appointment Details</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Appointment Id</th>
            <th>Date</th>
            <th>Time</th>
            <th>City</th>
            <th>Status</th>
            <th>View Bulid</th>
        </thead>
        <tbody>
        <?php 
            $userid = $row['id'];
            $sql = "SELECT * FROM `appointment` WHERE userid=$userid";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

        ?>
        <tr>
            <td><?php echo $row["appointmentid"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
            <td><?php echo $row["time"]; ?></td>
            <td><?php echo $row["location"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><?php 
                if ($row["status"] == "Accept") {
                    ?>
                    
                    <a href="viewbuliddetails.php?mydetails=.<?php echo urlencode(base64_encode($userid)) ?>">View Bulid Deatils</a>
                    <?php } ?>
            </td>
        </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>
