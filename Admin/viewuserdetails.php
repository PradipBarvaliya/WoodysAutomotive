<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Customer Details</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Id</th>
            <th>User Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Car Number</th>
            <th>Car Model</th>
            <th>Car Type</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["id"]; ?>
                    </td>
                    <td>
                        <?php echo $row["username"]; ?>
                    </td>
                    <td>
                        <?php echo $row["phone"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>
                    <td>
                        <?php echo $row["address"]; ?>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>