<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Payment History</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Payment Id</th>
            <th>CardNumber</th>
            <th>PaymentAmount</th>
            <th>User Name</th>
            <th>Car Number</th>
            <th>Car Type</th>
            <th>Car Model</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT *,user.username as U_name,user.carno as car_no,user.carmodel as car_model , user.cartype as Car_type FROM paymentdetails INNER JOIN user ON paymentdetails.userid = user.id WHERE user.id = paymentdetails.userid; ";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["paymetid"]; ?>
                    </td>
                    <td>
                        <?php echo $row["cardnumber"]; ?>
                    </td>
                    <td>
                        $<?php echo $row["amount"]; ?>/-
                    </td>
                    <td>
                        <?php echo $row["U_name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["car_no"]; ?>
                    </td>
                    <td>
                        <?php echo $row["Car_type"]; ?>
                    </td>
                    <td>
                        <?php echo $row["car_model"]; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>