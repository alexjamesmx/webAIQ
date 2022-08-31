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
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                        data-toggle="tooltip" data-placement="left" title="Dark Mode">
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
                            AGREGAR NUEVO</button>
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
                                        <th>Name</th>
                                        <th>Sales</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Marble Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1452</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">62</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Hummingbird</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1414</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">85</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Mantecada</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1401</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">21</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Batik Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1387</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">114</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Kransekake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1356</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">27</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Aranygaluska</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1323</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">57</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Lamington</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1301</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">11</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Kremówka</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1287</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">94</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Kladdkaka</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1261</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">37</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Fruitcake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1245</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">65</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Blondie</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1218</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">19</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Chocolate Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1200</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">45</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Banoffee Pie</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1192</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">22</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Croquembouche</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1176</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">48</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Basbousa</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1154</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">13</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Bebinca</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1150</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Punschkrapfen</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1108</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">87</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Crystal Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1068</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">43</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Napoleonshat</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1050</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">41</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Bibingka</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">1024</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">12</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Magdalena</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">998</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">24</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Butterkuchen</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">981</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">17</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Charlotte</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">976</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">26</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Avocado Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">961</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">106</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Fig Cake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">948</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">37</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Šakotis</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">931</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">54</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Chenna Poda</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">930</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">7</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Salzburger Nockerl</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">924</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">20</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Pavlova</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">918</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">14</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Soufflé</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">905</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">64</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Cremeschnitte</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">845</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">12</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Kolaczki</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">838</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">21</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Cheesecake</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">830</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">36</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Gingerbread</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">807</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">21</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Goose Breast</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">795</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">9</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Baumkuchen</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">792</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">18</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Faworki</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">783</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">38</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Kabuni</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">749</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">148</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Cupcakes</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Buccellato</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">738</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">51</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">Vínarterta</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">711</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">49</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Desserts</p>
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