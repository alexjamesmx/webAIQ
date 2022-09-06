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
    <!-- MODAL -->
    <div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACCION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate onsubmit="return handleModalSubmit(e)">
                        <div class="col-12">
                            <label for="restaurant" class="form-label">Restaurante</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-home"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required name='restaurant' id='restaurant'>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required name='email' id='email'>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Teléfono</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                                <input type="tel" class="form-control" aria-describedby="inputGroupPrepend" required name="phone" id='phone'>
                                <div class="invalid-feedback">
                                    Este campo es requerido.
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 d-flex flex-row-reverse mt-4">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1>Tus restaurantes</h1>
            <div class="text-zero top-right-button-container">
                <button id='btn-modal' type="button" class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Agregar restaurante" data-action="agregar" onclick="return handleModal(this)">
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
                                    <a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Editar">
                                        <i class="iconos-size simple-icon-pencil pencil"></i>
                                    </a>
                                    <!-- ELIMINAR -->
                                    <a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">
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