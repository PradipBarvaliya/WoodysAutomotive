<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Worker Details</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Employee Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM emp";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["empid"]; ?>
                    </td>
                    <td>
                        <?php echo $row["name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>
                    <td>
                        <?php echo $row["role"]; ?>
                    </td>
                    <td><a class="text-decoration-none text-dark font-weight-bold updatemployee" 
                            data-id="<?php echo $row["id"]; ?>" data-name="<?php echo $row["name"]; ?>"
                            data-email="<?php echo $row["email"]; ?>" data-role="<?php echo $row["role"]; ?>" ><i
                                class="fa fa-pencil " aria-hidden="true"></i></a></td>
                    <td><a class="text-decoration-none text-dark font-weight-bold"
                            href="query.php?empdelete=<?= $row['id'] ?>"><i class="fa fa-trash-o " aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style=" max-width: 60%!important; ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Details Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="query.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="emppid" id="emppid">
                    <div class="row col-md-12">
                            <label style=" padding: 5px 56px; "><strong>Name</strong></label>
                            <input type="text" name="uempname" placeholder="Enter email" id="uempname" required>
                    </div>
                    <div class="row col-md-12">
                        <label style=" padding: 5px 56px; "><strong>Email</strong></label>
                        <input type="text" name="uempemail" placeholder="Enter email" id="uempemail" required>
                    </div>
                    <div class="row col-md-12">
                        <label style=" padding: 5px 56px; " ><strong >Worker Role</strong></label>
                        <select name="uworkerrole" id="uworkerrole" required>
                            <option value="">Select Role</option>
                            <option value="Manager">Manager</option>
                            <option value="Worker">Worker</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="empupdate" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.updatemployee').on("click", function () {
        $('#exampleModal').modal('show');
        $('#emppid').val($(this).attr('data-id'));
        $('#uempname').val($(this).attr('data-name'));
        $('#uempemail').val($(this).attr('data-email'));
        $('#uworkerrole').val($(this).attr('data-role'));
    });
</script>
<?php include 'footer.php'; ?>