<?php 
$chk = $_POST['checked'];
if(!isset($chk)){
    echo "<script>alert('No Data Selected'); window.location='data.php';</script>";
} else {
include_once('../_header.php'); ?>
<div class="box">
    <h1>Polyclinic</h1>
        <h4>
            <small>Add Polyclinic Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Back </i></a>
            </div>
        </h4>
        <div class="box">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="process.php" method="post">
                    <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Polyclinic Name</th>
                            <th>Building / Floor</th>
                        </tr>
                        <?php
                            $no = 1;
                            foreach($chk as $id) {
                            $sql_poly = mysqli_query($con, "SELECT * FROM tb_poly WHERE id_poly = '$id'") or die (mysqli_error());  
                            while ($data = mysqli_fetch_array($sql_poly)) {
                            ?>
                            <tr>
                                <td><?=$no++ ?></td>
                                <td>
                                    <input type="hidden" name="id[]" value="<?=$data['id_poly']?>">
                                    <input type="text" name="name[]" value="<?=$data['name_poly']?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="building[]" value="<?=$data['dpfloor_poly']?>" class="form-control" required>
                                </td>
                            </tr>
                        
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Save All" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>


<?php include_once('../_footer.php'); 
}
?>