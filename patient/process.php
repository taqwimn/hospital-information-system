<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identity = trim(mysqli_real_escape_string($con, $_POST['identity']));
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $gender = trim(mysqli_real_escape_string($con, $_POST['gender']));
    $address = trim(mysqli_real_escape_string($con, $_POST['address']));
    $phonenum = trim(mysqli_real_escape_string($con, $_POST['phonenum']));
    $sql_check_identity = mysqli_query($con, "SELECT * FROM tb_patient WHERE numid_patient = '$identity'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_check_identity) > 0){
        echo "<script>alert('Identity Number Already Used!'); window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_patient (id_patient, numid_patient, name_patient, gender_patient, address_patient, phonenum_patient) VALUES ('$uuid','$identity','$name','$gender','$address','$phonenum')") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";    
    }
}
    else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $identity = trim(mysqli_real_escape_string($con, $_POST['identity']));
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $gender = trim(mysqli_real_escape_string($con, $_POST['gender']));
    $address = trim(mysqli_real_escape_string($con, $_POST['address']));
    $phonenum = trim(mysqli_real_escape_string($con, $_POST['phonenum']));
    $sql_check_identity = mysqli_query($con, "SELECT * FROM tb_patient WHERE numid_patient = '$identity' AND id_patient != '$id'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_check_identity) > 0){
        echo "<script>alert('Identity Number Already Used!'); window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_patient SET numid_patient = '$identity', name_patient = '$name', gender_patient = '$gender', address_patient = '$address', phonenum_patient = '$phonenum' WHERE id_patient = '$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";
    }
}
?>