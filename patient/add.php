<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Patient</h1>
    <h4>
        <small>Add Patient Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="identity">ID Number Patient</label>
                    <input type="number" name="identity" id="identity" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="name">Patient Name</label>
                    <input type="text" name="name" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="gender" value="M" required> Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="F" required> Female
                    </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="info">Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="phonenum">Phone Number</label>
                    <input type="text" name="phonenum" id="phonenum" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>