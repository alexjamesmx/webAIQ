<div class="container-fluid">

    <?php include('restaurantes_modal.php') ?>

    <div class="row">
        <div class="col-12">
            <h1>Restaurantes</h1>
            <div class="text-zero top-right-button-container">
                <button name='reload_restaurantes' type="button" class="btn btn-outline-dark btn-sm top-right-button mr-1 iconos-size-sm" onclick="return reload_restaurantes()">
                    <i class='simple-icon-refresh iconos-size-sm'></i>
                    Recargar
                </button>
                <button id='btn-modal' type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-target="#modal-actions-restaurantes" data-whatever="Agregar restaurante" data-action="Agregar" onclick="return handleModal_restaurantes(this)">
                    <i class='simple-icon-plus mr-2'></i>
                    AGREGAR</button>
            </div>
            <div class="separator mb-2"></div>
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
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-12 data-tables-hide-filter">
            <div class="card">
                <div class="card-body">
                    <table class="data-table data-tables-pagination responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Logo</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Zona</th>
                                <th>Teléfono</th> 
                                <th>Estado</th>
                                <th class='justify-content-end'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="results_tabla_restaurantes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>