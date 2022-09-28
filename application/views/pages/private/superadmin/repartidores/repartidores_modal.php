<div class="modal fade" id="modal-actions-repartidores" tabindex="-1" role="dialog" aria-hidden="true" data-action="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id='modal-actions-title-repartidores'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id='modal-form-repartidores' novalidate>
                    <div class="col-12 m-2">
                        <label for="nombre_repartidor" class="form-label">Nombre</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-tablet-3"></i></span>
                            <input type="text" class=" form-control" required name="nombre_repartidor" id='nombre_repartidor'>
                            <div class="nombre_repartidor invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-2">
                        <label for="phone_repartidor" class="form-label">Teléfono</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                            <input type="tel" pattern="[0-9]{0,20}" class=" form-control" required name="phone_repartidor" id='phone_repartidor'>
                            <div class="phone_repartidor invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 m-2">
                        <label for="inputState" class="form-label">Zona</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-shop"></i></span>
                            <select class="form-control" required name="zona" id='zona'>
                                <option selected disabled value="">¿En qué zona está?</option>
                                <option value="1">Zona A</option>
                                <option value="2">Zona B</option>
                            </select>
                        </div>
                    </div>
                    <input id='id_rep' class=" form-control" type="hidden" required name="id_rep">
                    <input id="old_telefono" type="hidden" name="old_telefono" />
                    <div class=" col-12 d-flex flex-row-reverse mb-2 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id='modal-delete-repartidores' class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm brad bradb">
        <div class="modal-content brad bradb">
            <div class="modal-header brad bg-primary">
                <h5 id='modal-delete-title-repartidores'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bradb">
                <p class="mb-4" id='modal-delete-text-repartidores'></p>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" name='delete' data-id="">Eliminar</button>
            </div>
        </div>
    </div>
</div>