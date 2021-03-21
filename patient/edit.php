<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Patient</h1>
    <h4>
        <small>Edit Patient Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_patient = mysqli_query($con, "SELECT * FROM tb_patient WHERE id_patient ='$id'") or die (mysqli_error($con));
            $data = mysqli_fetch_array($sql_patient);
            ?>
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="identity">ID Number Patient</label>
                    <input type="hidden" name="id" value="<?=$data['id_patient']?>">
                    <input type="number" name="identity" id="identity" class="form-control" value="<?=$data['numid_patient']?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="name">Patient Name</label>
                    <input type="text" name="name" class="form-control" value="<?=$data['name_patient']?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="gender" value="M" <?=$data['gender_patient'] == "M" ? "checked" : null ?> required> Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="F" <?=$data['gender_patient'] == "F" ? "checked" : null ?> required> Female
                    </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="info">Address</label>
                    <textarea name="address" id="address" class="form-control" required><?=$data['address_patient']?> </textarea>
                </div>
                <div class="form-group">
                    <label for="phonenum">Phone Number</label>
                    <input type="text" name="phonenum" id="phonenum" class="form-control" value="<?=$data['phonenum_patient']?>" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>