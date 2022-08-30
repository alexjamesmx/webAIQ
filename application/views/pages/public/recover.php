<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recuperar conteseña</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="<?=base_url('favicon.png')?>" type="image/x-icon" sizes="144x144">
    <link rel="icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
    
    <!-- Bootstrap -->
    <link href="<?=base_url('static/loginrecover/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="<?=base_url('static/loginrecover/css/materialdesignicons.min.css')?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Main Css -->
    <link href="<?=base_url('static/loginrecover/css/style.css')?>" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="<?=base_url('static/loginrecover/css/colors/red.css')?>" rel="stylesheet" id="color-opt">
</head>
<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

    <!-- Hero Start -->
    <section class="bg-home d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <img class="img-fluid mx-auto d-block" style="max-height: 300px;" src="<?=base_url('static/loginrecover/images/AIQ.png')?>" />
                </div>
                <div class="col-lg-7 col-md-6 d-none d-md-block">
                    <div class="me-lg-5">   
                        <img src="<?=base_url('static/loginrecover/images/recover.png')?>" class="img-fluid d-block mx-auto" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 hidden-xs">
                    <div class="card shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center">Recuperar contraseña</h4>  

                            <form class="login-form mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="text-muted">Por favor ingresa tu correo electrónico. Recibirás un enlace en tu correo electrónico para generar una nueva contraseña.</p>
                                        <div class="mb-3">
                                            <label class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control ps-5" placeholder="Ingresa tu e-mail" name="email" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div><!--end col-->
                                    <div class="mx-auto">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">¿Recuerdas tu contraseña?</small> <a href="<?=base_url()?>" class="text-dark fw-bold">Inicia sesión</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <script src="<?=base_url('static/loginrecover/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Icons -->
    <script src="<?=base_url('static/loginrecover/js/feather.min.js')?>"></script>
    <!-- Main Js -->
    <script src="<?=base_url('static/loginrecover/js/plugins.init.js')?>"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="<?=base_url('static/loginrecover/js/app.js')?>"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

</body>
</html>