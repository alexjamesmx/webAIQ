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
                    <div class="col-12">

                        <label for="descripcion_mesas" class="form-label">Descripción</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-home"></i></span>
                            <input type="text" class="form-control" required name='descripcion_mesas' id='descripcion_mesas'>
                            <div class="descripcion_mesas invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="password_mesas" class="form-label">Contraseña</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                            <input type="password" class="form-control" required name="password_mesas" id='password_mesas'>
                            <div class="password_mesas invalid-feedback">
                            </div>
                        </div>

                    </div>

                    <label hidden for="id_mesa"></label>
                    <input hidden name="id_mesa" id='id_mesa'>
            </div>
            <div class=" col-12 d-flex flex-row-reverse mb-2">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>