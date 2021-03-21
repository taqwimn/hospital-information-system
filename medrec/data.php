<?php include_once('../_header.php'); ?>
<div class="box">
    <h1>Medical Record</h1>
        <h4>
            <small>Medical Record Data</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> Add Record  <i class="glyphicon glyphicon-plus"></i></a> 
            </div>
        </h4>
        <form method="post" name="process">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="rekams">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Check Date</th>
                        <th>Patient Name</th>
                        <th>Complaint</th>
                        <th>Doctor Name</th>
                        <th>Diagnose</th>
                        <th>Polyclinic</th>
                        <th>Data Medicine</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM tb_medicrecord
                                INNER JOIN tb_patient ON tb_medicrecord.id_patient = tb_patient.id_patient
                                INNER JOIN tb_doctor ON tb_medicrecord.id_doctor = tb_doctor.id_doctor
                                INNER JOIN tb_poly ON tb_medicrecord.id_poly = tb_poly.id_poly
                    ";
                    $sql_rm = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_rm)) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= indo_date($data['check_date_mr'])?></td>
                            <td><?= $data['name_patient']?></td>
                            <td><?= $data['complaint_mr']?></td>
                            <td><?= $data['name_doctor']?></td>
                            <td><?= $data['diagnose_mr']?></td>
                            <td><?= $data['name_poly']?></td>
                            <td>
                            <?php
                            $sql_medicine = mysqli_query($con, "SELECT * FROM tb_rm_medicine JOIN tb_medicine ON tb_rm_medicine.id_medicine = tb_medicine.id_medicine WHERE id_mr = '$data[id_mr]'") or die (mysqli_error($con));
                            while ($data_medicine = mysqli_fetch_array($sql_medicine)) {
                                echo $data_medicine['name_medicine']."<br>";
                            }
                            ?>
                            </td>
                            <td>
                                <a href="del.php?id=<?=$data['id_mr']?>" class="btn btn-danger btn-xs" onclick="return confirm('You sure want to delete this data?')"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#rekams').DataTable({
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 8
                }
            ],
            "order": [1, "asc"]
        });
    });
</script>
<?php include_once('../_footer.php'); ?>    