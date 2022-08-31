<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AIQ- Aeropuerto Internacional de Querétaro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url()?>static/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/datatables.responsive.bootstrap4.min.css" />
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
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                        data-toggle="k" data-placement="rigth" title="k">
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

                    <li class="active">
                        <a href="#">
                            <i class="iconsminds-shop-4"></i> Inicio
                        </a>
                    </li>
                    <li class="#menu">
                        <a href="<?=base_url()?>menu">
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
                <!--pendiente-->
                <div class="col-xl-6 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="card-title"> Pendientes </h2>
                                <button type="button" class="btn btn-primary restaricon">
                                    <i class="simple-icon-bell"></i>&nbsp;
                                    <span class="badge badge-light">2</span>
                                </button>
                            </div>

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Detalle</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778347</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Osvaldo</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$80</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">18 Nov 2022 - 13:29</p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo sencilla (sin cebolla)
                                            </p>
                                            <p class="list-item-heading ml-3">Cocacola</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="simple-icon-check"></i> Acceptar </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778796</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Oscar</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$120</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">18 Nov 2022 - 14:01</p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo suprema</p>
                                            <p class="list-item-heading ml-3">Munded</p>
                                            <p class="list-item-heading ml-3">Papas (grandes)</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="simple-icon-check"></i> Acceptar </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Aceptados (Preparando)-->
                <div class="col-xl-6 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="card-title"> Aceptados (Preparando) </h2>
                                <button type="button" class="btn btn-primary restaricon">
                                    <i class="simple-icon-bell"></i>&nbsp;
                                    <span class="badge badge-light">2</span>
                                </button>
                            </div>

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Tiempo de preparacion</th>
                                        <th>Detalle</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778347</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Osvaldo</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$80</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3 timeres">
                                                <span class="badge badge-pill badge-outline-success mb-1">05:23</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo sencilla (sin cebolla)
                                            </p>
                                            <p class="list-item-heading ml-3">Cocacola</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-chef-hat"></i> Listos </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778796</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Oscar</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$120</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3 timeres">
                                                <span class="badge badge-pill badge-outline-danger mb-1">15:10</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo suprema</p>
                                            <p class="list-item-heading ml-3">Munded</p>
                                            <p class="list-item-heading ml-3">Papas (grandes)</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-chef-hat"></i> Listos </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Listo para envio-->
                <div class="col-xl-6 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="card-title"> Listo para envio </h2>
                                <button type="button" class="btn btn-primary restaricon">
                                    <i class="simple-icon-bell"></i>&nbsp;
                                    <span class="badge badge-light">2</span>
                                </button>
                            </div>

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Repartidor</th>
                                        <th>Total</th>
                                        <th>Cliente</th>
                                        <th>Tipo de Pago</th>
                                        <th>Detalle</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778347</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Jorge</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$80</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Osvaldo</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Tarjeta</p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo sencilla (sin cebolla)
                                            </p>
                                            <p class="list-item-heading ml-3">Cocacola</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-mail-send"></i> Enviar </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading ml-3">1637263778796</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Raul</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">$120</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Oscar</p>
                                        </td>
                                        <td>
                                            <p class="text-muted ml-3">Efectivo</p>
                                        </td>
                                        <td>
                                            <p class="list-item-heading ml-3">Hamburgesa de pollo suprema</p>
                                            <p class="list-item-heading ml-3">Munded</p>
                                            <p class="list-item-heading ml-3">Papas (grandes)</p>
                                        </td>
                                        <td>
                                            <p>
                                                &nbsp; <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-mail-send"></i> Enviar </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a> &nbsp;
                                            </p>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Enviado-->
                <div class="col-xl-6 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="card-title"> Enviado </h2>
                                <button type="button" class="btn btn-primary restaricon">
                                    <i class="simple-icon-bell"></i>&nbsp;
                                    <span class="badge badge-light">2</span>
                                </button>
                            </div>

                            <table class="data-table table-striped data-table-scrollable responsive nowrap"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading">1637263778347</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">$80</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-financial"></i> Pagado </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a>
                                            </p>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="list-item-heading">1637263778796</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">$120</p>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="#acepta" class="btn btn-outline-success restaricon"><i
                                                        class="iconsminds-financial"></i> Pagado </a>
                                                &nbsp;

                                                &nbsp; <a href="#delet" class="btn btn-outline-danger restaricon"><i
                                                        class="simple-icon-trash"></i> Cancelar </a>
                                            </p>

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

    <script src="<?=base_url()?>static/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/datatables.min.js"></script>
    <script src="<?=base_url()?>static/js/dore.script.js"></script>
    <script src="<?=base_url()?>static/js/scripts.js"></script>
</body>

</html>