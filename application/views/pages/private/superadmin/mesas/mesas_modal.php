<div class="modal fade" id="modal-actions-mesas" tabindex="-1" role="dialog" aria-hidden="true" data-action="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id='modal-actions-title-mesas'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id='modal-form-mesas' novalidate>
                    <div class="col-12 m-2">
                        <label for="nombre_mesa" class="form-label">Mesa</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-tablet-3"></i></span>
                            <input type="text" class=" form-control" required name="nombre_mesa" id='nombre_mesa'>
                            <div class="nombre_mesa invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-2">
                        <label for="descripcion_mesas" class="form-label">Descripción</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-tag"></i></span>
                            <input type="text" class="form-control" required name='descripcion_mesas' id='descripcion_mesas'>
                            <div class="descripcion_mesas invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-2">
                        <label for="password_mesas" class="form-label">Contraseña</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                            <input type="password" class="form-control" required name="password_mesas" id='password_mesas' autocomplete="on">
                            <div class="password_mesas invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 m-2">
                        <label for="zona_mesas" class="form-label">Zona</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-shop"></i></span>
                            <select class="form-control" required name="zona_mesas" id='zona_mesas'>
                                <option selected disabled value="">¿En qué zona estás?</option>
                                <option value="1">Zona A</option>
                                <option value="2">Zona B</option>
                            </select>
                            <div class="zona_mesas invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" class=" form-control" required name="id_mesa" id='id_mesa'>
                    <input id="old_name" type="hidden" name="old_name" />
                    <div class=" col-12 d-flex flex-row-reverse mb-2 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id='modal-delete-mesas' class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm brad bradb">
        <div class="modal-content brad bradb">
            <div class="modal-header brad bg-primary">
                <h5 id='modal-delete-title_mesas'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bradb">
                <p class="mb-4" id='modal-delete-text-mesas'></p>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" name='delete' data-id="">Eliminar</button>
            </div>
        </div>
    </div>
</div>