<div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog brad bradb" role="document">
            <div class="modal-content brad bradb">
                <div class="modal-header brad">

                    <a class="navbar-logo" href="#">
                        <span class="logo d-none d-xs-block"></span>
                        <span class="logo-mobile d-block d-xs-none"></span>
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bradb">
                    <h5 class="mb-4 modal-title">ACCION</h5>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for=""> Nombre </label>
                                <input type="text" class="form-control" placeholder="Ej. Torta" required>
                                <span class="invalid-feedback">Precio Requerido</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="k"> Precio </label>
                                <input type="text" class="form-control" placeholder="Ej. 13.00" required>
                                <span class="invalid-feedback">Precio Requerido</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="k"> Tiempo de preparación</label>
                                <input type="text" class="form-control" placeholder="Ej. 15:00 (min)" required>
                                <span class="invalid-feedback">Precio Requerido</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="v"> Tipo de producto </label>
                                <select class="custom-select" id="validationTooltip04" required>
                                    <option selected disabled value="">Tipo ... </option>
                                    <option>Combo</option>
                                    <option>Platillo</option>
                                    <option>Bebida</option>
                                </select>
                                <span class="invalid-feedback"> Selecciona una opcion </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLangHTML">
                                    <label class="custom-file-label" for="customFileLangHTML"
                                        data-browse="Seleccionar">Imagen del Producto</label>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>