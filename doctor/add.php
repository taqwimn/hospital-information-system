<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Doctor</h1>
    <h4>
        <small>Add Doctor Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="text" name="name" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="info">Specialist</label>
                    <input type="text" name="specialist" id="specialist" class="form-control" required autofocus>
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