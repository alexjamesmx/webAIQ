<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Iniciar sesión</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="<?= base_url('favicon.png') ?>" type="image/x-icon" sizes="144x144">
    <link rel="icon" href="<?= base_url('favicon.png') ?>" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="<?= base_url('static/loginrecover/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="<?= base_url('static/loginrecover/css/materialdesignicons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Main Css -->
    <link href="<?= base_url('static/loginrecover/css/style.css') ?>" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="<?= base_url('static/loginrecover/css/colors/red.css') ?>" rel="stylesheet" id="color-opt">

    <script>
        var appData = {
            base_url: "<?= base_url() ?>",
            email: "<?= $this->session->email ?>",
            nombre: "<?= $this->session->nombre ?>",
        };
    </script>
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
    <section class="cover-user bg-white">
        <div class="container-fluid px-0">
            <div class="row g-0 position-relative">
                <div class="col-lg-4 cover-my-30 order-2">
                    <div class="cover-user-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="card login-page border-0" style="z-index: 1">
                                    <div class="card-body p-0">
                                        <h4 class="card-title text-center">Iniciar sesión</h4>
                                        <form class="login-form mt-4 p-3" onsubmit="return hanldeLogin(event)">
                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <img class="img-fluid mx-auto d-block" style="max-height: 300px;" src="<?= base_url('static/loginrecover/images/AIQ.png') ?>" />
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for='email'>Correo electrónico<span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="email" class="form-control ps-5" placeholder="Ingresa tu e-mail" name="email" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password">Contraseña <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                                            <input type="password" class="form-control ps-5" placeholder="Ingresa tu contraseña" required name='password'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Recordarme</label>
                                                            </div>
                                                        </div>
                                                        <p class="forgot-pass mb-0"><a href="<?= base_url('recover') ?>" class="text-dark fw-bold">¿Olvidaste tu contraseña?</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="col-lg-12 mb-0">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type='submit'>Ingresar</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="message mt-3"></div>
                                               

                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('<?= base_url("static/loginrecover/images/img2.jpg") ?>')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
            </div>
            <!--end row-->
        </div>
        <!--end container fluid-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <script src="<?= base_url('static/jquery-3.6.1.min.js') ?>"></script>
    <script src="<?= base_url('static/js/message.js') ?>"></script>
    <script src="<?= base_url('static/loginrecover/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('static/js/webAiq.js') ?>"></script>
    <!-- Icons -->
    <script src="<?= base_url('static/loginrecover/js/feather.min.js') ?>"></script>
    <!-- Main Js -->
    <script src="<?= base_url('static/loginrecover/js/plugins.init.js') ?>"></script>
    <!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="<?= base_url('static/loginrecover/js/app.js') ?>"></script>
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>

</html>