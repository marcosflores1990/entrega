<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTAL</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/dist/img/logo-chico.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/select2/dist/js/select2.js"></script>
    <!-- datepicker -->
    <script src="<?=base_url()?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>/assets/datepicker/css/bootstrap-datepicker3.min.css">
    <script src="<?=base_url()?>/assets/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
</head>
<section class="vh-50 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-1 pb-5">
                            <img src="<?php echo base_url()?>assets/dist/img/login-chico.jpg" class="img-thumbnail">
                            <h2 class="fw-bold mb-2 text-uppercase"></h2>
                            <p class="text-white-50 mb-5"></p>
                            <form id="idFormLogin">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="idCampoCorreoLogin" name="idCampoCorreoLogin"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="idCampoCorreoLogin">Correo</label>
                                </div>

                                <div class="form-outline form-white mb-5">
                                    <input type="password" id="idCampoPasswordLogin" name="idCampoPasswordLogin"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="idCampoPasswordLogin">Password</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit"
                                    id="btnLogin">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$("#btnLogin").click(function(e) {
    e.preventDefault();

    var error = '';
    var correo = $('#idCampoCorreoLogin').val().trim();
    var clave = $('#idCampoPasswordLogin').val();

    if (correo === '') {
        error += '- INGRESAR EL CORREO \n';
    }

    if (clave === '') {
        error += '- INGRESAR LA CLAVE DE ACCESO \n';
    }
    const url = '<?php echo base_url()?>'

    if (error === '') {
        $.ajax({
            url: url + "index.php/cLogin/login",
            type: "POST",
            data: $('#idFormLogin').serialize(),
            success: function(resp) {
                if (resp === "0") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Credenciales inválidas'
                    })

                    // $('#usuario').val('');
                    // $('#password').val('');
                    $('#idCampoCorreoLogin').focus();
                } else {
                    window.location.href = url + 'list';
                }
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Faltan campos' + error
        })
    }


});
</script>