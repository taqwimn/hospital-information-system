<?php 
require_once "../_config/config.php";

    $sql = mysqli_query($con, "DELETE FROM tb_medicrecord WHERE id_mr = '$_GET[id]'") or die (mysqli_query($con));
  
    if($sql){
        echo"<script>alert('Data Succesfully Deleted'); window.location='data.php';</script>";
    } else {
        echo"<script>alert('Failed to Delete Data, Please Try Again');</script>";    
    } 
    
?>