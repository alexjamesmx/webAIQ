<div class="container-fluid">
    <div class="row  ">
        <div class="col-12">
            <div class="message mt-3"></div>
            <h1>Métricas y reportes</h1>

            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row">

        <div class="col-12 col-sm-12 mb-4">

            <select id="selected-category">
                <option value="0" disabled>Categoría:</option>
                <option value="1">Por Año</option>
                <option value="2" selected="selected">Por Mes</option>
                <option value="2">Por Día</option>
            </select>



            <select id="selected-category-month">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <input id='selected-category-year' type='number'>
            <input id='datePicker' type="date">
            <div id="container"> </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Categoría de Productos</h5>
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
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="mb-2">Portfolio
                            <span class="float-right text-muted">1/8</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="mb-2">Billing Details
                            <span class="float-right text-muted">2/6</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="mb-2">Interests
                            <span class="float-right text-muted">0/8</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="mb-2">Legal Documents
                            <span class="float-right text-muted">1/2</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
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
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="64" data-show-percent="true">
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
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="75" data-show-percent="true">
                    </div>
                </div> if(!$("#alerta").length){
                $('.message').append(`
                <div id="alerta" class="alert alert-${type} alert-dismissible fade show mt-3" role="alert">
                    <strong>${boldText}</strong>${text}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="32" data-show-percent="true">
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