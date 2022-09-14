<div class="container-fluid">

    <?php include('mesas_modal.php') ?>

    <div class="row">
        <div class="col-12">
            <h1>Mesas</h1>
            <div class="text-zero top-right-button-container">
                <button id='btn-modal' type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-target="#modal-actions-mesas" data-whatever="Agregar mesa" data-action="Agregar" onclick="return handleModal_mesas(this)">
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
                    <table id='table-results' class="data-table data-tables-pagination responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th class='justify-content-end'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="results_tabla_mesas">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>