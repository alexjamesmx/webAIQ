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

    <link rel="stylesheet" href="<?= base_url() ?>static/fontawesome/css/all.min.css" />
</head>

<body id="app-container" class="menu-default show-spinner">
    <!-- NAV SUPERIOR -->
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
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" data-toggle="tooltip" data-placement="left" title="Dark Mode">
                        <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                        <label class="custom-switch-btn" for="switchDark"></label>
                    </div>
                </div>



                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">

                <span class="name">Sarah Kortney</span>
                <span>
                    <img alt="Profile Picture" src="<?= base_url() ?>static/img/profile-pic-l.jpg" />
                </span>


            </div>
        </div>
    </nav>
    <!-- NAV SUPERIOR -->
    <!-- NAVIGATION DRAWER -->
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">

                    <li class="#home">
                        <a href="<?= base_url() ?>home">
                            <i class="iconsminds-bucket"></i> Inicio
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url() ?>restaurantes">
                            <i class="iconsminds-bucket"></i> Restaurantes
                        </a>
                    </li>
                    <li class="#mesas">
                        <a href="<?= base_url() ?>mesas">
                            <i class="iconsminds-bucket"></i> Mesas
                        </a>
                    </li>
                    <li class="#repartidores">
                        <a href="<?= base_url() ?>repartidores">
                            <i class="iconsminds-bucket"></i> Repartidores
                        </a>
                    </li>
                    <li class="#anuncios">
                        <a href="<?= base_url() ?>anuncios">
                            <i class="iconsminds-bucket"></i> Anuncios
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- NAVIGATION DRAWER -->

    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Tus restaurantes</h1>
                        <div class="text-zero top-right-button-container">
                            <button type="button" class="btn btn-primary btn-lg top-right-button mr-1"
                            data-toggle="modal" data-target="#exampleModalContent" data-whatever="Agregar">
                            <i class='fas fa-plus mr-2'></i>    
                            AGREGAR NUEVO</button>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="collapse dont-collapse-sm" id="displayOptions">
                        
                            <div class="float-md-right">
                                <span class="text-muted text-small">Mostrando 1-10 of 30 items </span>
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    20
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item active" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 list" data-check-all="checkAll">
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <p class="list-item-heading mb-0 truncate w-xs-100" href="#">
                                    Red wings
                                </p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">redwings@gmail.com</p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">4422069322</p>
                            </div>
                            <!-- EDITAR -->
                            <a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Editar">
                                <i class="iconos-size simple-icon-pencil"></i>
                            </a>
                            <!-- EDITAR -->
                            <!-- ELIMINAR -->
                            <a class="align-self-center mr-4" href="#"data-toggle="modal"
                                data-target=".bd-example-modal-sm">
                                <i class="iconos-size fa-solid fa-trash-can"></i>
                            </a>
                            <!-- ELIMINAR -->
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL -->
                            <div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-4">
                        <div class="cardform">
                           
                            <form class="needs-validation tooltip-label-right" novalidate>
                                <div class="form-group position-relative error-l-50">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Name is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Correo electrónico</label>
                                    <input type="number" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Age is required!
                                    </div>
                                </div>
                                <div class="form-group position-relative error-l-50">
                                    <label>Teléfono</label>
                                    <textarea class="form-control" rows="2" required></textarea>
                                    <div class="invalid-tooltip">
                                        Details are required!
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL -->

                        </div>
                    </div>


                    <nav class="mt-4 mb-3">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item ">
                                <a class="page-link first" href="#">
                                    <i class="simple-icon-control-start"></i>
                                </a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link prev" href="#">
                                    <i class="simple-icon-arrow-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link next" href="#" aria-label="Next">
                                    <i class="simple-icon-arrow-right"></i>
                                </a>
                            </li>
                            <li class="page-item ">
                                <a class="page-link last" href="#">
                                    <i class="simple-icon-control-end"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>


    <script src="<?= base_url() ?>static/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>static/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>static/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>static/js/vendor/mousetrap.min.js"></script>
    <script src="<?= base_url() ?>static/js/dore.script.js"></script>
    <script src="<?= base_url() ?>static/js/scripts.js"></script>
</body>

</html>

