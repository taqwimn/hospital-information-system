<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $info = trim(mysqli_real_escape_string($con, $_POST['info']));
    mysqli_query($con, "INSERT INTO tb_medicine (id_medicine, name_medicine, info_medicine) VALUES ('$uuid','$name','$info')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $info = trim(mysqli_real_escape_string($con, $_POST['info']));
    mysqli_query($con, "UPDATE tb_medicine SET name_medicine = '$name', info_medicine = '$info' WHERE id_medicine = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>