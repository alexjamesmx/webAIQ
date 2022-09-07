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
                    <form class="needs-validation" id="agregar_platillo" novalidate>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$_SESSION['id_user']?>">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for=""> Nombre </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                                <span class="invalid-feedback">Nombre Requerido</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="k"> Precio </label>
                                <input type="text" class="form-control" id="precio" name="precio" required>
                                <span class="invalid-feedback">Precio Requerido</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="k"> Tiempo de preparación</label>
                                <input type="text" class="form-control" id="tiempo" name="tiempo" required>
                                <span class="invalid-feedback">Tiempo Requerido</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="v"> Tipo de producto </label>
                                <select class="custom-select" id="tipo" name="tipo" required>
                                    <option selected disabled value="">Tipo ... </option>
                                    <option value="1">Combo</option>
                                    <option value="2">Platillo</option>
                                    <option value="3">Bebida</option>
                                </select>
                                <span class="invalid-feedback"> Selecciona una opcion </span>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for=""> Descripcion </label>
                                <textarea name="descripcion" class="form-control" id="descripcion" cols="5" rows="5"></textarea>
                                <span class="invalid-feedback">Descripcion Requerido</span>
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