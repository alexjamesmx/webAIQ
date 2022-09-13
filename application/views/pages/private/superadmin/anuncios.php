<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AIQ- Aeropuerto Internacional de Querétaro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url()?>static/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?=base_url()?>static/css/main.css" />
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
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                   
                </div>

                

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
            
                    <span class="name">Sarah Kortney</span>
                    <span>
                        <img alt="Profile Picture" src="<?=base_url()?>static/img/profile-pic-l.jpg" />
                    </span>
             

            </div>
        </div>
    </nav>

    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    
                    <li class="home">
                        <a href="<?=base_url()?>home">
                            <i class="iconsminds-bucket"></i> Inicio
                        </a>
                    </li>
                    <li class="#restaurantes">
                        <a href="<?=base_url()?>restaurantes">
                            <i class="iconsminds-bucket"></i> Restaurantes
                        </a>
                    </li>
                    <li class="#mesas">
                    <a href="<?=base_url()?>mesas">
                            <i class="iconsminds-bucket"></i> Mesas
                        </a>
                    </li>
                    <li class="#repartidores">
                    <a href="<?=base_url()?>repartidores">
                            <i class="iconsminds-bucket"></i> Repartidores
                        </a>
                    </li>
                    <li class="active">
                    <a href="#">
                            <i class="iconsminds-bucket"></i> Anuncios
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

    </div>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Blank Page</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                    <div class="separator mb-5"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?=base_url()?>static/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/mousetrap.min.js"></script>
    <script src="<?=base_url()?>static/js/dore.script.js"></script>
    <script src="<?=base_url()?>static/js/scripts.js"></script>
</body>

</html>
