<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Services Details</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>Service</th>
            <th>Location</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM carservices";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["servicesname"]; ?>
                    </td>
                    <td>
                        <?php echo $row["location"]; ?>
                    </td>
                    <td>
                        $<?php echo $row["serviceprice"]; ?>/-
                    </td>
                    <td><a class="text-decoration-none text-dark font-weight-bold updatservices" 
                            data-id="<?php echo $row["id"]; ?>" data-servicesname="<?php echo $row["servicesname"]; ?>" data-serviceprice="<?php echo $row["serviceprice"]; ?>"
                            data-location="<?php echo $row["location"]; ?>" ><i
                                class="fa fa-pencil " aria-hidden="true"></i></a></td>
                    <td><a class="text-decoration-none text-dark font-weight-bold"
                            href="query.php?servicedelete=<?= $row['id'] ?>"><i class="fa fa-trash-o " aria-hidden="true"></i></a>
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
                    <input type="hidden" name="serviceid" id="serviceid">
                <div class="row">
                    <label style=" padding: 5px 56px; "><strong >Name</strong></label>
                    <input type="text" name="uservicesname" id="uservicesname" placeholder="Enter Name" required>
                </div>
                <div class="row">
                    <label style=" padding: 5px 56px; "><strong >Price</strong></label>
                    <input type="number" name="uservicesprice" id="uservicesprice" placeholder="Enter price" required>
                </div>
                <div class="row justify-content-start">
                    <label style=" padding: 5px 56px; "><strong >Location</strong></label>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 56px;" >
                        <input type="checkbox" name="ulocationcity[]" value="Florence" id="Florence" >
                        <span>Florence</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 56px;" >
                        <input type="checkbox" name="ulocationcity[]" value="California" id="California" >
                        <span>California</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 56px;" >
                        <input type="checkbox" name="ulocationcity[]" value="Hawaii" id="Hawaii" >
                        <span>Hawaii</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 56px;" >
                        <input type="checkbox" name="ulocationcity[]" value="Kansas" id="Kansas" >
                        <span>Kansas</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 56px;" >
                        <input type="checkbox" name="ulocationcity[]" value="Washington" id="Washington" >
                        <span>Washington</span>
                    </div>
                </div>
                    <div class="modal-footer">
                        <input type="submit" name="serviceupdate" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.updatservices').on("click", function () {
        $('#exampleModal').modal('show');
        var array = $(this).attr('data-location').split(",")
        for (let index = 0; index < array.length; index++) {
            const element = array[index];
            $('#'+element+'').attr("checked","true")
        }
        $('#serviceid').val($(this).attr('data-id'));
        $('#uservicesname').val($(this).attr('data-servicesname'));
        $('#uservicesprice').val($(this).attr('data-serviceprice'));
    });
</script>
<?php include 'footer.php'; ?>