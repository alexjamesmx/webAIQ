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
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/smart_wizard.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap-tagsinput.css" />

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
            <span class="d-none d-xs-block">
                <img class="logores" alt="Restaurante" src="<?=base_url()?>static/img/starbucks.png" />
                <img class="logores" alt="Logo AIQ" src="<?=base_url()?>static/img/logoch1.png" />
            </span>

            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="user d-inline-block">
                <span class="name">En Linea</span>
            </div>
            <div class="header-icons d-inline-block align-middle">
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" data-toggle="k"
                        data-placement="rigth" title="k">
                        <input class="custom-switch-input" id="k" type="checkbox" checked>
                        <label class="custom-switch-btn" for="k"></label>
                    </div>
                </div>



                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">

                <span class="name">Starbucks</span>
            </div>
        </div>
    </nav>

    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">


                    <li class="#homeRestaurante">
                        <a href="<?=base_url()?>homeRestaurante">
                            <i class="iconsminds-shop-4"></i> Inicio
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="iconsminds-receipt-4"></i> Menu
                        </a>
                    </li>
                    <li class="#reportes">
                        <a href="<?=base_url()?>reportes">
                            <i class="iconsminds-monitor-analytics"></i> Reportes
                        </a>
                    </li>
                    <li class="#cuenta">
                        <a href="<?=base_url()?>cuenta">
                            <i class="iconsminds-id-card"></i> Cuenta
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Menu</h1>
                        <button type="button" class="btn btn-outline-success m-1 textabla" data-toggle="modal"
                        data-target="#agregar"> Agregar <i
                                class="simple-icon-plus"></i></button>
                    </div>
                    

                    <div class="separator mb-5"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card mb-4">
                        <div id="smartWizardClickable">
                            <ul class="card-header">
                                <li class="m-2"><a href="#clickable1">
                                        <h3> Combos <i class="iconsminds-cookies"></i> </h3>
                                    </a></li>
                                <li class="done m-2"><a href="#clickable2">
                                        <h3> Platillos <i class="iconsminds-hamburger"></i> </h3>
                                    </a></li>
                                <li class="done m-2"><a href="#clickable3">
                                        <h3> Bebidas <i class="iconsminds-coffee-to-go"></i> </h3>
                                    </a></li>
                            </ul>

                            <div class="card-body">
                                <div id="clickable1">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <h4>Imagen</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Nombre</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Precio</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Tipo de preparacion</h4>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Sandwich1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Sandwich y Coca de 355ml</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$45.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Bagel1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Bagel y Coca de 355ml</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$85.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Baguette1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Baguette y Coca de 355ml</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$150.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 20:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div id="clickable2">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <h4>Imagen</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Nombre</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Precio</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Tipo de preparacion</h4>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Sandwich1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle">
                                                    <p class="textabla text-center">Sandwich</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="textabla text-center">$25.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Bagel1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Bagel</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$65.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 15:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/Baguette1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Baguette</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$130.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 20:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div id="clickable3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <h4>Imagen</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Nombre</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Precio</h4>
                                                </th>
                                                <th scope="col" class="text-center">
                                                    <h4>Tipo de preparacion</h4>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/chai1.png" alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle">
                                                    <p class="textabla text-center">Chai1</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="textabla text-center">$30.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/frappuccino1.png"
                                                        alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Chip Frappuccino</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$50.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <img src="<?=base_url()?>static/img/frappuccino2.png"
                                                        alt="Fat Rascal"
                                                        class="list-thumbnail responsive border-0 card-img-left" />
                                                </th>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">Berry Yogurt Frappuccino</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla">$55.00</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="textabla"><i class="iconsminds-stopwatch"></i> 10:00 min
                                                    </p>
                                                </td>
                                                <td class="align-middle text-right">
                                                    <button type="button" class="btn btn-outline-primary m-1"><i
                                                            class="simple-icon-pencil textabla"></i></button>
                                                    <button type="button" class="btn btn-outline-danger m-1"><i
                                                            class="simple-icon-trash textabla"></i></button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    <script src="<?=base_url()?>static/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/select2.full.js"></script>
    <script src="<?=base_url()?>static/js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/jquery.smartWizard.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/mousetrap.min.js"></script>
    <script src="<?=base_url()?>static/js/dore.script.js"></script>
    <script src="<?=base_url()?>static/js/scripts.js"></script>
</body>

</html>