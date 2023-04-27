<?php include 'navbar.php'; ?>
<div class="card-form" style=" margin: 50px auto; " >
        <form action="query.php" method="POST">
            <div class="form-title">Add Employee</div>
            <div class="form-body">
                <div class="row">
                    <label style=" padding: 5px 49px; "><strong >Name</strong></label>
                    <input type="text" name="empname" placeholder="Enter Name" required>
                </div>
                <div class="row">
                    <label style=" padding: 5px 49px; "><strong >Email</strong></label>
                    <input type="email" name="empemail" placeholder="Enter Email"  required>
                </div>
                <div class="row">
                    <label style=" padding: 5px 49px; " ><strong >Worker Role</strong></label>
                    <select name="workerrole"  required>
                        <option value="">Select Role</option>
                        <option value="Manager">Manager</option>
                        <option value="Worker">Worker</option>
                    </select>
                </div>
                <div class="row w-25 text-center m-4">
                    <input type="submit" name="AddEmp" value="Add">
                </div>
            </div>
        </form>
    </div>
<?php include 'footer.php'; ?>
