<?php
//setting timezone
date_default_timezone_set('Asia/Jakarta');
session_start();

//setting connection
include_once "conn.php";

$con = mysqli_connect($con['host'],$con['user'],$con['pass'],$con['db']);
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

//base_url function
function base_url($url = null) {
    $base_url = "http://localhost/medicalrecord";
    if($url != null) {
        return $base_url."/".$url;
    }
    else {
        return $base_url;
    }
}

function indo_date($date) {
    $tanggal = substr($date, 8, 2);
    $bulan = substr($date, 5, 2);
    $tahun = substr($date, 0, 4);
    return $tanggal."/".$bulan."/".$tahun;
}

?>