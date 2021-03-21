<?php include_once('../_header.php'); ?>
<div class="box">
    <h1>Medicine</h1>
        <h4>
            <small>Medicine Data</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs">Add Medicine <i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </h4>
        <div style="margin-bottom: 20px;">
        <form class="form-inline" method="post">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search"></input>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Medicine Name</th>
                        <th>Information</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $limit = 5;
                $hal = @$_GET['hal'];
                if(empty($hal)) {
                    $position = 0;
                    $hal = 1;
                } else {
                    $position = ($hal - 1) * $limit;
                }
                $no = 1;
                if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $search = trim(mysqli_real_escape_string($con, $_POST['search']));
                    if($search != '') {
                        $sql = "SELECT * FROM tb_medicine WHERE name_medicine LIKE '%$search%'";
                        $query = $sql;
                        $queryTotal = $sql;
                    } else {
                        $query = "SELECT * FROM tb_medicine LIMIT $position, $limit";
                        $queryTotal = "SELECT * FROM tb_medicine";
                        $no = $position + 1;
                    }
                } else {
                    $query = "SELECT * FROM tb_medicine LIMIT $position, $limit";
                    $queryTotal = "SELECT * FROM tb_medicine";
                    $no = $position + 1;
                }
    
                $sql_medicine = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_medicine) > 0) {
                    while($data = mysqli_fetch_array($sql_medicine)) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['name_medicine']?></td>
                            <td><?=$data['info_medicine']?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?=$data['id_medicine']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?=$data['id_medicine']?>" onclick="return confirm('You sure want to delete?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan=\"4\" align=\"center\">Data Not Found!</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        if(@$_POST['search'] == '') { ?>
            <div style="float:left;">
                <?php
                $total = mysqli_num_rows(mysqli_query($con, $queryTotal));
                echo "Total Data : <b>$total</b>";
                ?>
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin=0">
                    <?php
                    $total_hal = ceil($total / $limit);
                    for ($i=1; $i <= $total_hal; $i++){
                        if($i != $hal) {
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";
                        } else {
                            echo "<li class=\"active\"><a>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php   
        } else { 
            echo "<div style=\"float:left;\">";
            $total = mysqli_num_rows(mysqli_query($con, $queryTotal));
            echo "Search Data Result : <b>$total</b>";
            echo "</div>";
        }
        ?>  
</div>
<?php include_once('../_footer.php'); ?>