<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $specialist = trim(mysqli_real_escape_string($con, $_POST['specialist']));
    $address = trim(mysqli_real_escape_string($con, $_POST['address']));
    $phonenum = trim(mysqli_real_escape_string($con, $_POST['phonenum']));
    mysqli_query($con, "INSERT INTO tb_doctor (id_doctor, name_doctor, specialist_doctor, address_doctor, phonenum_doctor) VALUES ('$uuid','$name','$specialist', '$address', '$phonenum')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $specialist = trim(mysqli_real_escape_string($con, $_POST['specialist']));
    $address = trim(mysqli_real_escape_string($con, $_POST['address']));
    $phonenum = trim(mysqli_real_escape_string($con, $_POST['phonenum']));
    mysqli_query($con, "UPDATE tb_doctor SET name_doctor = '$name', specialist_doctor = '$specialist', address_doctor = '$address', phonenum_doctor = '$phonenum' WHERE id_doctor = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>