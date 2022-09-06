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

    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/vendor/datatables.responsive.bootstrap4.min.css" />
 
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
                


                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">

                <span class="name">Alex Santiago</span>
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
                        <a href="#restaurantes">
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
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-12">
                    <h1>Tus restaurantes</h1>
                    <div class="text-zero top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal"
                            data-target="#exampleModalContent" data-whatever="Agregar">
                            <i class='simple-icon-plus mr-2'></i>
                            AGREGAR</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="mb-2">
                        <div class="collapse dont-collapse-sm" id="displayOptions">

                            <div class="float-md-right">
                                <span class="text-muted text-small">Mostrando 1-10 of 30 items </span>
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12 data-tables-hide-filter">
                    <div class="card">
                        <div class="card-body">
                    

                            <table class="data-table data-tables-pagination responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo electrónico</th>
                                        <th>Teléfono</th>
                                        <th class='justify-content-end'>
                                        <p>

                                            Acciones
                                        </p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <p class="list-item-heading">Red</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">redwings@gmail.com</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4423452492</p>
                                        </td>
                                        <td>
                                            <!-- EDITAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
                                            <!-- EDITAR -->
                                            <!-- ELIMINAR -->
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target=".bd-example-modal-sm">
                                                <i class="iconos-size simple-icon-trash trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <!-- MODAL -->
    <div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <a class="navbar-logo" href="#">
                        <span class="logo d-none d-xs-block"></span>
                        <span class="logo-mobile d-block d-xs-none"></span>
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-4 modal-title">ACCION</h5>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label for="phone" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-home"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Correo electrónico</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Teléfono</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 d-flex flex-row-reverse mt-4">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- MODAL -->






        <script src="<?= base_url() ?>static/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url() ?>static/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>static/js/vendor/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>static/js/vendor/mousetrap.min.js"></script>
        <script src="<?= base_url() ?>static/js/dore.script.js"></script>
        <script src="<?= base_url() ?>static/js/scripts.js"></script>
        <script src="<?= base_url() ?>static/js/vendor/datatables.min.js"></script>


</body>

</html>