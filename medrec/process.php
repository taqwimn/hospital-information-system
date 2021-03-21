<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $patient = trim(mysqli_real_escape_string($con, $_POST['patient']));
    $complaint = trim(mysqli_real_escape_string($con, $_POST['complaint']));
    $doctor = trim(mysqli_real_escape_string($con, $_POST['doctor']));
    $diagnose = trim(mysqli_real_escape_string($con, $_POST['diagnose']));
    $poly = trim(mysqli_real_escape_string($con, $_POST['poly']));
    $cdate = trim(mysqli_real_escape_string($con, $_POST['cdate']));
    
    mysqli_query($con, "INSERT INTO tb_medicrecord (id_mr, id_patient, complaint_mr, id_doctor, diagnose_mr, id_poly, check_date_mr) VALUES ('$uuid','$patient','$complaint', '$doctor', '$diagnose', '$poly', '$cdate')") or die (mysqli_error($con));
    
    $medicine = $_POST['medicine'];
    foreach($medicine as $md) {
        mysqli_query($con, "INSERT INTO tb_rm_medicine (id_mr, id_medicine) VALUES ('$uuid','$md')") or die (mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    /*$id = $_POST['id'];
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $specialist = trim(mysqli_real_escape_string($con, $_POST['specialist']));
    $address = trim(mysqli_real_escape_string($con, $_POST['address']));
    $phonenum = trim(mysqli_real_escape_string($con, $_POST['phonenum']));
    mysqli_query($con, "UPDATE tb_doctor SET name_doctor = '$name', specialist_doctor = '$specialist', address_doctor = '$address', phonenum_doctor = '$phonenum' WHERE id_doctor = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";*/
}
?>