<?php include 'navbar.php'; ?>
<br>
<h2 class="text-center">Spare Parts</h2>
<br>
<div class="container">
    <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
            <th>img</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM sparepartsdetails";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><img src="<?php echo $row["img"]; ?>" alt="now" width="50px" height="50px"></td>
                    <td>
                        <?php echo $row["name"]; ?>
                    </td>
                    <td>
                        <?php echo $row["description"]; ?>
                    </td>
                    <td>
                        $<?php echo $row["price"]; ?>/-
                    </td>
                    <td>
                        <?php echo $row["quantity"]; ?>
                    </td>
                    <td><a class="text-decoration-none text-dark font-weight-bold updatespareparts" id=""
                            data-id="<?php echo $row["id"]; ?>" data-name="<?php echo $row["name"]; ?>"
                            data-img="<?php echo $row["img"]; ?>" data-des="<?php echo $row["description"]; ?>"
                            data-price="<?php echo $row["price"]; ?>" data-quantity="<?php echo $row["quantity"]; ?>"><i
                                class="fa fa-pencil " aria-hidden="true"></i></a></td>
                    <td><a class="text-decoration-none text-dark font-weight-bold"
                            href="query.php?spdelete=<?= $row['id'] ?>"><i class="fa fa-trash-o " aria-hidden="true"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Spare Parts Details Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="query.php" method="POST" enctype="multipart/form-data">
                    <div class="row col-md-12">
                        <input type="hidden" name="uspid" id="uspid">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Name</strong></label>
                            <input type="text" name="uspname" placeholder="Enter Name" id="uspname" required>
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Descriptions(optional)</strong></label>
                            <input type="text" name="uspdes" placeholder="Enter Descriptions" id="uspdes">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Price</strong></label>
                            <input type="number" name="uspprice" placeholder="Enter Price" title="Enter Proper Formate"
                                min="1" required id="uspprice">
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Quantity</strong></label>
                            <input type="number" name="uspquantity" placeholder="Enter Quantity" min="1" required
                                id="uspquantity">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Current Image</strong></label>
                            <img style=" width: 60%; " id="uspimg" alt="choose file">
                        </div>
                        <div class="row col-md-6">
                            <label style=" padding: 5px 22px; "><strong>Image Upload</strong></label>
                            <input type="file" name="uspimg" >

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="spupdate" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.updatespareparts').on("click", function () {
        $('#exampleModal').modal('show');
        $('#uspid').val($(this).attr('data-id'));
        $('#uspname').val($(this).attr('data-name'));
        $('#uspdes').val($(this).attr('data-des'));
        $('#uspimg').attr("src", $(this).attr('data-img'));
        $('#uspprice').val($(this).attr('data-price'));
        $('#uspquantity').val($(this).attr('data-quantity'));
    });
</script>
<?php include 'footer.php'; ?>