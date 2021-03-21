<?php include_once('../_header.php'); ?>
<div class="box">
    <h1>Polyclinic</h1>
        <h4>
            <small>Add Polyclinic Data</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-info btn-xs"> Data </a>
                <a href="generate.php" class="btn btn-primary btn-xs"> Add More Data </a>
            </div>
        </h4>
        <div class="box">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="process.php" method="post">
                    <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                    <table class="table">
                        <tr>
                        <th>#</th>
                        <th>Name Polyclinic</th>
                        <th>Building / Floor</th>
                        </tr>
                        <?php
                        for ($i=1; $i<=$_POST['count_add']; $i++) { ?>
                            <tr>
                                <td><?=$i?></td>
                                <td>
                                    <input type="text" name="name-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="building-<?=$i?>" class="form-control" required>
                                </td>
                            </tr>
                        
                        <?php
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Save All" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>


<?php include_once('../_footer.php'); ?>