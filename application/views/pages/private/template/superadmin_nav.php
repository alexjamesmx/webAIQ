<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AIQ - Aeropuerto Internacional de Querétaro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() ?>static/img/aiq.jpeg" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url() ?>static/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/main.css" />


</head>

<body id="app-container" class="menu-default show-spinner">

    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>



        </div>
        <a class="navbar-logo" href="#">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-bl
            ock d-xs-none"></span>
        </a>
        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>
            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="name"><?= $_SESSION['correo'] ?></span>
                    <span>
                        <!-- <?php if (isset($_SESSION['avatar'])) : ?>
                        <img id='outimage'alt="Profile Picture" src="<?= $_SESSION['avatar'] ?>" />
                    <?php endif; ?> -->
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <!-- <a class="dropdown-item" href="#" onclick="return handleAvatar()">Actualizar foto</a> -->
                    <a class="dropdown-item" href="#" onclick="return handleSignout()">Cerrar sesión</a>
                    <!-- <input type="file" id="avatar" name='avatar' onchange="return handleAvatarValue()"> -->
                </div>
            </div>
        </div>
    </nav>
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">

                    <li id='home_nav' class="navigation" data-page='home' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-monitor-analytics"></i> Inicio
                        </a>
                    </li>
                    <li id='restaurantes_nav' class="navigation" data-page='restaurantes' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-shop-4"></i> Restaurantes
                        </a>
                    </li>
                    <li id='mesas_nav' class="navigation" data-page='mesas' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-on-off-2"></i>Mesas
                        </a>
                    </li>
                    <li id='repartidores_nav' class="navigation" data-page='repartidores' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-business-man"></i>Repartidores
                        </a>
                    </li>
                    <li id='anuncios_nav' class="navigation" data-page='anuncios' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-money-bag"></i>Repartidores
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>