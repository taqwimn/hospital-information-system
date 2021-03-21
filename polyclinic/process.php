<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i=1; $i<=$total; $i++){
        $uuid = Uuid::uuid4()->toString();
        $name = trim(mysqli_real_escape_string($con, $_POST['name-'.$i]));
        $building = trim(mysqli_real_escape_string($con, $_POST['building-'.$i]));
        $sql = mysqli_query($con, "INSERT INTO tb_poly (id_poly, name_poly, dpfloor_poly) VALUES ('$uuid','$name','$building')") or die (mysqli_error($con));
    }
    if($sql){
        echo"<script>alert('".$total." Data Succesfully Added'); window.location='data.php';</script>";
    } else {
        echo"<script>alert('Failed to Add Data, Please Try Again'); window.location='generate.php';</script>";    
    } 
    
} else if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['id']); $i++){
        $id = $_POST['id'][$i];
        $name = $_POST['name'][$i];
        $building = $_POST['building'][$i];
        mysqli_query($con, "UPDATE tb_poly SET name_poly = '$name', dpfloor_poly = '$building' WHERE id_poly = '$id'") or die (mysqli_error($con));
    }
    echo"<script>alert('Data Successfully Updated!'); window.location='data.php';</script>";
}
?>