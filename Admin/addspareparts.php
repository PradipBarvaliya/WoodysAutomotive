<?php include 'navbar.php'; ?>
<div class="card-form" style=" margin: 50px auto; " >
        <form action="query.php" method="POST" enctype="multipart/form-data">
            <div class="form-title">Add Spare Parts</div>
            <div class="form-body">
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Name</strong></label>
                        <input type="text" name="spname" placeholder="Enter Name" required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Descriptions</strong></label>
                        <input type="text" name="spdes" placeholder="Enter Descriptions"  required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Price</strong></label>
                        <input type="number" name="spprice" placeholder="Enter Price" title="Enter Proper Formate" min="1" required>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; "><strong >Quantity</strong></label>
                        <input type="number" name="spquantity" placeholder="Enter Quantity" min="1"  required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 26px; "><strong >Image</strong></label>
                        <input type="file" name="spimg" required>

                    </div>
                </div>
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="spAdd" value="Add">
                </div>
            </div>
        </form>
    </div>
<?php include 'footer.php'; ?>
