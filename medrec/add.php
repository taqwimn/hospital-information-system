<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Medical Record</h1>
    <h4>
        <small>Add Medical Record Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-default btn-xs">Back<i class="glyphicon glyphicon-chevron-left"></i></a>
            </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="patient">Patient Name</label>
                    <select name="patient" id="patient" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php
                        $sql_patient = mysqli_query($con, "SELECT * FROM tb_patient") or die (mysqli_error($con));
                        while($data_patient = mysqli_fetch_array($sql_patient)) {
                            echo '<option value="'.$data_patient['id_patient'].'">'.$data_patient['name_patient'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="complaint">Complaint</label>
                    <textarea name="complaint" id="complaint" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor Name</label>
                    <select name="doctor" id="doctor" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php
                        $sql_doctor = mysqli_query($con, "SELECT * FROM tb_doctor") or die (mysqli_error($con));
                        while($data_doctor = mysqli_fetch_array($sql_doctor)) {
                            echo '<option value="'.$data_doctor['id_doctor'].'">'.$data_doctor['name_doctor'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnose">Diagnose</label>
                    <textarea name="diagnose" id="diagnose" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="poly">Poly Name</label>
                    <select name="poly" id="poly" class="form-control" required>
                        <option value="">-Select-</option>
                        <?php
                        $sql_poly = mysqli_query($con, "SELECT * FROM tb_poly ORDER BY name_poly ASC") or die (mysqli_error($con));
                        while($data_poly = mysqli_fetch_array($sql_poly)) {
                            echo '<option value="'.$data_poly['id_poly'].'">'.$data_poly['name_poly'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medicine">Medicine</label>
                    <select multiple size="3" name="medicine[]" id="medicine" class="form-control" required>
<!--                    <option value="">-Select-</option>-->
                        <?php
                        $sql_medicine = mysqli_query($con, "SELECT * FROM tb_medicine") or die (mysqli_error($con));
                        while($data_medicine = mysqli_fetch_array($sql_medicine)) {
                            echo '<option value="'.$data_medicine['id_medicine'].'">'.$data_medicine['name_medicine'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cdate">Check Date</label>
                    <input type="date" name="cdate" id="cdate" value="<?=date('Y-m-d')?>" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Save" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                </div>
            </form>
            <script>
                CKEDITOR.replace('complaint', {
                    uiColor: '#808080'
                });
                CKEDITOR.replace('diagnose', {
                    uiColor: '#808080'
                });
            </script>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>