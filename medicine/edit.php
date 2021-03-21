<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Medicine</h1>
    <h4>
        <small>Edit Medicine Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_medicine = mysqli_query($con, "SELECT * FROM tb_medicine WHERE id_medicine = '$id'") or die (mysqli_error($con));
            $data = mysqli_fetch_array($sql_medicine);
            ?>
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="name">Medicine Name</label>
                    <input type="hidden" name="id" value="<?=$data['id_medicine']?>">
                    <input type="text" name="name" id="name" value="<?=$data['name_medicine']?>" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="info">Information</label>
                    <textarea name="info" id="info" class="form-control" required><?=$data['info_medicine']?></textarea>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>