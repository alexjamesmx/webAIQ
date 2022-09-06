<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AIQ- Aeropuerto Internacional de Querétaro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url()?>static/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/font/simple-line-icons/css/simple-line-icons.css"/>
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/datatables.responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/component-custom-switch.min.css" />
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
                    
                    <li class="#home">
                    <a href="<?=base_url()?>home">
                            <i class="iconsminds-shop-4"></i> Inicio
                        </a>
                    </li>
                    <li class="#menu">
                        <a href="<?=base_url()?>menu">
                            <i class="iconsminds-receipt-4"></i> Menú
                        </a>
                    </li>
                    <li class="active">
                    <a href="#">
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
                    <h1>Reportes</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="data-table data-table-feature">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Duración (Min)</th>
                                    <th>Detalle Pedido</th>
                                    <th>Fecha/Hora Aceptado</th>
                                    <th>Fecha/Hora No Aceptado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>$549</td>
                                    <td>15:00(0)</td>
                                    <td>
                                        <p>Café MOKA</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>$128</td>
                                    <td>17:43(-2:43)</td>
                                    <td>
                                        <p>Café MUACK</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>$54</td>
                                    <td>18:15(-3:15)</td>
                                    <td>
                                        <p>Café LINDO</p>
                                        <p>Matcha</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>16:22</p>
                                    </td>
                                    <td>
                                        <p>2022/09/02</p>
                                        <p>12:09</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">PEDIDO VS TIEMPO</h6>
                        <div class="chart-container chart">
                            <canvas id="areaChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">TIMEPO ON VS OFF</h6>
                        <div class="chart-container chart">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">GANANCIAS</h6>
                        <div class="chart-container chart">
                            <canvas id="productChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">PEDIDOS</h6>
                        <h10 class="mb-4 d-flex justify-content-center">(RECHAZADO-DEVOLUCIÓN-PAGADOS)</h10>
                        <div class="chart-container chart">
                            <canvas id="pieChartNoShadow"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">MÉTODO DE PAGO</h6>
                        <div class="chart-container chart">
                            <canvas id="productChartNoShadow"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <h6 class="mb-4 d-flex justify-content-center">TOP 5 MEJORES ALIMENTOS</h6>
                        <div class="chart-container chart">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?=base_url()?>static/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/mousetrap.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/datatables.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>static/js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="<?=base_url()?>static/js/dore.script.js"></script>
    <script src="<?=base_url()?>static/js/scripts.js"></script>
</body>

</html>
