<?php include_once('../_header.php'); ?>
<div class="box">
    <h1>Doctor</h1>
        <h4>
            <small>Doctor Data</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> Add Doctor  <i class="glyphicon glyphicon-plus"></i></a> 
            </div>
        </h4>
        <form method="post" name="process">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="doks">
                <thead>
                    <tr>
                        <th>
                            <center>
                                <input type="checkbox" name="select_all" id="select_all" value="">
                            </center>
                        </th>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Specialist</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql_doctor = mysqli_query($con, "SELECT * FROM tb_doctor") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_doctor)) { ?>
                        <tr>
                            <td align="center"><input type="checkbox" name="checked[]" id="checked" class="check" value="<?=$data['id_doctor']?>"></td>
                            <td><?= $no++ ?>.</td>
                            <td><?=$data['name_doctor']?></td>
                            <td><?=$data['specialist_doctor']?></td>
                            <td><?=$data['address_doctor']?></td>
                            <td><?=$data['phonenum_doctor']?></td>
                            <td align="center">
                                <a href="edit.php?id=<?=$data['id_doctor']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
    </form>
    <div class="box pull-right">
        <button class="btn btn-danger btn-sm" onclick="del()"><i class="glyphicon glyphicon-trash"></i> Delete</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        
        $('#doks').DataTable({
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
                }
            ],
            "order": [1, "asc"]
        });
        
        $('#select_all').on('click', function() {
            if(this.checked) {
                $('.check').each(function() {
                    this.checked = true;   
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;                   
                })
            }
        })
        
        $('.check').on('click', function() {
            if($('.check:checked').length == $('.check').length){
                $('#select_all').prop('checked', true);
            }  else {
                $('#select_all').prop('checked', false);
            }
        })
    });
    function del() {
        var conf = confirm('You sure want to delete this data?');
        if(conf) {
            document.process.action = 'del.php';
            document.process.submit();
        }
    }
</script>
<?php include_once('../_footer.php'); ?>    