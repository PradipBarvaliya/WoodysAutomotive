<?php include 'navbar.php'; ?>
<div class="card-form" style=" margin: 50px auto; " >
        <form action="query.php" method="POST">
            <div class="form-title">Add Service</div>
            <div class="form-body">
                <div class="row">
                    <label style=" padding: 5px 49px; "><strong >Name</strong></label>
                    <input type="text" name="servicesname" placeholder="Enter Name" required>
                </div>
                <div class="row">
                    <label style=" padding: 5px 49px; "><strong >Price</strong></label>
                    <input type="number" name="servicesprice" placeholder="Enter price" required>
                </div>
                <div class="row justify-content-start">
                    <label style=" padding: 5px 49px; "><strong >Location</strong></label>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 49px;" >
                        <input type="checkbox" name="locationcity[]" value="Trenton" checked>
                        <span>Trenton</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 49px;" >
                        <input type="checkbox" name="locationcity[]" value="Jersey City" >
                        <span>Jersey City</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 49px;" >
                        <input type="checkbox" name="locationcity[]" value="Atlantic City" >
                        <span>Atlantic City</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 49px;" >
                        <input type="checkbox" name="locationcity[]" value="Princeton" >
                        <span>Princeton</span>
                    </div>
                    <div class="d-flex " style=" grid-column-gap: 11px; padding: 5px 49px;" >
                        <input type="checkbox" name="locationcity[]" value="Newark" >
                        <span>Newark</span>
                    </div>
                </div>
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="addservice" value="Add">
                </div>
            </div>
        </form>
    </div>
<?php include 'footer.php'; ?>
