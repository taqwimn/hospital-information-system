<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Doctor</h1>
    <h4>
        <small>Edit Doctor Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_doctor = mysqli_query($con, "SELECT * FROM tb_doctor WHERE id_doctor = '$id'") or die (mysqli_error($con));
            $data = mysqli_fetch_array($sql_doctor);
            ?>
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="hidden" name="id" value="<?=$data['id_doctor']?>">
                    <input type="text" name="name" id="name" value="<?=$data['name_doctor']?>" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="info">Specialist</label>
                    <input type="text" name="specialist" id="specialist" value="<?=$data['specialist_doctor']?>" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="info">Address</label>
                    <textarea name="address" id="address" class="form-control" required><?=$data['address_doctor']?></textarea>
                </div>
                <div class="form-group">
                    <label for="phonenum">Phone Number</label>
                    <input type="text" name="phonenum" id="phonenum" value="<?=$data['phonenum_doctor']?>" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>