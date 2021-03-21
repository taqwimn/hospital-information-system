<?php 
require_once "../_config/config.php";
$chk = $_POST['checked'];
if(!isset($chk)){
    echo "<script>alert('No Data Selected'); window.location='data.php';</script>";
} else {
  foreach($chk as $id){
      $sql = mysqli_query($con, "DELETE FROM tb_poly WHERE id_poly = '$id'") or die (mysqli_query($con));
  }
    if($sql){
        echo"<script>alert('".count($chk)." Data Succesfully Deleted'); window.location='data.php';</script>";
    } else {
        echo"<script>alert('Failed to Delete Data, Please Try Again');</script>";    
    } 
}
?>