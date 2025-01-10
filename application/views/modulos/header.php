<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTALCA</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/dist/img/logo-utalca.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- <link href="<?php echo base_url()?>assets/select2/select2.min.css" rel="stylesheet" /> -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/route.js"></script>
    <!-- <script src="<?php // base_url()?>assets/select2/es.js"></script> 
    <script src="<?php //echo base_url()?>assets/select2/select2.min.js"></script> -->

    <link href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/select2/dist/js/select2.min.js"></script>

    <script src="<?=base_url()?>assets/chosen/chosen.jquery.js"></script>
    <script src="<?=base_url()?>assets/chosen/init.js"></script>
    <!-- datepicker -->
    <script src="<?=base_url()?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>/assets/datepicker/css/bootstrap-datepicker3.min.css">
    <script src="<?=base_url()?>/assets/datepicker/locales/bootstrap-datepicker.es.min.js"></script>


    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->

    <style type="text/css">
    .fa-check {
        color: green;
    }

    .fa-times {
        color: red;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user-circle fa-lg"></i>
                        <span class="username"> <?="Bienvenido ".$this->session->userdata('nombre_apellido')?> </span>
                        <i class="fas fa-angle-down fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="https://google.cl" target="_blank" class="dropdown-item">
                            <i class="fa fa-file mr-1" aria-hidden="true"></i> Descargar archivo RAML
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->