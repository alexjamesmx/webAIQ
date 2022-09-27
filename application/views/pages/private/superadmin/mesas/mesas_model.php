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
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title accion"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id='modal-form' novalidate>
                        <div class="col-12">
                            <label for="restaurant" class="form-label">Descripción</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-home"></i></span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required name='restaurant' id='restaurant'>
                                <div class="restaurant invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                                <input type="password" minlength="4" class=" form-control" aria-describedby="inputGroupPrepend" required name="password" id='password'>
                                <div class="password invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                                <input type="email" class="form-control" aria-describedby="inputGroupPrepend" required name='email' id='email'>
                                <div class="email invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Teléfono</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                                <input type="tel" pattern="[0-9]{0,20}" class=" form-control" aria-describedby="inputGroupPrepend" required name="phone" id='phone'>
                                <div class="phone invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <label for="id">Contra</label>
                        <input name="id" id='id'>
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