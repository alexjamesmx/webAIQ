<div id='home' class='pages' hidden>
    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-12">
                    <div class="message mt-3"></div>
                    <h1>Dashboard Analytics</h1>
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

            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card dashboard-filled-line-chart">
                        <div class="card-body ">
                            <div class="float-left float-none-xs">
                                <div class="d-inline-block">
                                    <h5 class="d-inline">Website Visits</h5>
                                    <span class="text-muted text-small d-block">Unique Visitors</span>
                                </div>
                            </div>
                            <div class="btn-group float-right float-none-xs mt-2">
                                <button class="btn btn-outline-primary btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    This Week
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">This Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="chart card-body pt-0">
                            <canvas id="visitChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card dashboard-filled-line-chart">
                        <div class="card-body ">
                            <div class="float-left float-none-xs">
                                <div class="d-inline-block">
                                    <h5 class="d-inline">Conversion Rates</h5>
                                    <span class="text-muted text-small d-block">Per Session</span>
                                </div>
                            </div>
                            <div class="btn-group float-right mt-2 float-none-xs">
                                <button class="btn btn-outline-secondary btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    This Week
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">This Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="chart card-body pt-0">
                            <canvas id="conversionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Product Categories</h5>
                            <div class="dashboard-donut-chart chart">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-4 mb-4">
                    <div class="card dashboard-progress">
                        <div class="position-absolute card-top-buttons">
                            <button class="btn btn-header-light icon-button">
                                <i class="simple-icon-refresh"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Profile Status</h5>
                            <div class="mb-4">
                                <p class="mb-2">Basic Information
                                    <span class="float-right text-muted">12/18</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Portfolio
                                    <span class="float-right text-muted">1/8</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Billing Details
                                    <span class="float-right text-muted">2/6</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Interests
                                    <span class="float-right text-muted">0/8</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Legal Documents
                                    <span class="float-right text-muted">1/2</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart2"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="row sortable">
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Profile Status</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="40"
                                data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Work Progress</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="64"
                                data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Tasks Completed</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="75"
                                data-show-percent="true">
                            </div>
                        </div> if(!$("#alerta").length){
                        $('.message').append(`
                        <div id="alerta" class="alert alert-${type} alert-dismissible fade show mt-3" role="alert">
                            <strong>${boldText}</strong>${text}<button type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>`
                        );
                        setTimeout(() => {
                        $('#alerta').alert('close')
                        }, 3000);
                        }
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Payments Done</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="32"
                                data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order - Stock</h5>
                            <div class="chart-container chart">
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <div class="chart-container chart">
                                <canvas id="polarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sales</h5>
                            <div class="dashboard-line-chart chart">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<div id='restaurantes' class='pages' hidden>
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
</div>

<div id='mesas' class='pages' hidden>
    <main>
        <div class="container-fluid">
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
                    <h1>Tus mesas</h1>
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
                                        <th>Id</th>
                                        <th>Descripción</th>
                                        <th>Contraseña</th>
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
                                            <p class="list-item-heading">1</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">la de la fuente</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">12345</p>
                                        </td>
                                        <td>
                                            <a class="align-self-center mr-4" href="#" data-toggle="modal"
                                                data-target="#exampleModalContent" data-whatever="Editar">
                                                <i class="iconos-size simple-icon-pencil pencil"></i>
                                            </a>
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
</div>

<div id='repartidores' class='pages' hidden>
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
                    <h1>Tus repartidor</h1>
                    <div class="text-zero top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal"
                            data-target="#exampleModalContent" data-whatever="Agregar">
                            <i class='simple-icon-plus mr-2'></i>
                            AGREGAR NUEVA</button>
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
                                        <th>Id_rep</th>
                                        <th>Telefono</th>
                                        <th>Activo</th>
                                        <th>Nombre</th>

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
                                            <p class="list-item-heading">100</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">4422069324</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">no</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">Abel Alejandro Santiago Garcia</p>
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
</div>


