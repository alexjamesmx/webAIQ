<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AIQ- Aeropuerto Internacional de Querétaro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url() ?>static/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>static/css/main.css" />

    <script>
        var appData = {
            "base_url": '<?= base_url() ?>',
            "idRes": `<?= $this->session->id_user ?>`,
            "nom" : `<?= $this->session->nombre ?>`
        } 
    </script> 
 
</head>

<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top" id="navadmin">
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
            <span class="logo d-none d-xs-block">
            </span>

            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="user d-inline-block">
                <span id="estado-name" class="name"></span>
            </div>
            <div class="header-icons d-inline-block align-middle">
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                    <label class="switch">
                    <input type="checkbox" id="estado-icon" onclick="estado_res(appData.idRes)" > <span id="icon-estado" class="round">
                    </span> </label> 
                </div> 



                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>
            <div class="user d-inline-block">

                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="name"><?= $_SESSION['nombre'] ?></span>
                    <span>
                         <?php if (isset($_SESSION['avatar'])): ?>
                            <img id='outimage'alt="avatar" src=" <?= base_url() ?>static/img/<?= $_SESSION[
                                'avatar'
                            ] ?>" />
                        <?php endif; ?> 
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="#" onclick="return handleSignout()">Cerrar sesión</a>
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
                            <i class="iconsminds-shop-4"></i> Inicio
                        </a>
                    </li>
                    <li id='productos_nav' class="navigation" data-page='productos' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="simple-icon-handbag"></i> Productos
                        </a>
                    </li>
                    <li id='reportes_nav' class="navigation" data-page='reportes' onclick='return clickgeneral(this)'>
                        <a href="#">
                            <i class="iconsminds-monitor-analytics"></i> Reportes
                        </a>
                    </li>
                    <li id='cuenta_nav' class="navigation" data-page='cuenta' onclick='return clickgeneral(this)'>
                        <a href="#" id="cuenta-clic">
                            <i class="iconsminds-id-card"></i> Cuenta
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>