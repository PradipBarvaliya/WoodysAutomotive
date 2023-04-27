<?php include 'navbar.php'; ?>

<div class="card-form">
        <form action="query.php" method="POST">
            <div class="form-title">Appointment</div>
            <div class="form-body">
                <div class="row col-md-12">
                    <div class="row col-md-12">
                        <label style=" padding: 5px 50px; "><strong >Date</strong></label>
                        <input type="date" name="date" required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-12">
                        <label style=" padding: 5px 50px; "><strong >Time</strong></label>
                        <input type="time" name="time" required>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; " ><strong >Service Type</strong></label>
                        <select name="servicetype" id="servicetypeselect" required>
                            <option value="">Select Service Type</option>
                            <?php 
                            $sql = "SELECT * FROM carservices";
                            $result = $conn->query($sql);
                            while ($servicesrow = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $servicesrow['id'];?>"><?php echo $servicesrow['servicesname']; ?>($ <?php echo $servicesrow['serviceprice']; ?>/-)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row col-md-6">
                        <label style=" padding: 5px 22px; " ><strong >Select City (First Select Services)</strong></label>
                        <select name="selectcity" class="selectcity" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
                
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="appointment" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <script>
    $('#servicetypeselect').on("change", function () {
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "query.php",
            data: {servicecitygetid:id},
            success: function(data){
                var array = data.split(",")
               let  options ='<option value="">Select City</option>'
                for (let index = 0; index < array.length; index++) {
                    const element = array[index];
                    options +=`<option value = ${element} >${element}</option>`
                }
                $('.selectcity').html(options);
            }
        })


    });
</script>