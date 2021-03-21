<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";
if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Application - Medical Record</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/simple-sidebar.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/med_logo.png')?>" rel="icon">
</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard/index.php')?>"><span class="text-primary"><b>Database Medical Center</b></span></a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard/index.php')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('patient/data.php')?>">Patient Data</a>
                </li>
                <li>
                    <a href="<?=base_url('doctor/data.php')?>">Doctor Data</a>
                </li>
                <li>
                    <a href="<?=base_url('polyclinic/data.php')?>">Polyclinic Data</a>
                </li>
                <li>
                    <a href="<?=base_url('medicine/data.php')?>">Medicine Data</a>
                </li>
                <li>
                    <a href="<?=base_url('medrec/data.php')?>">Medical Record</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
        <div class="container-fluid">    