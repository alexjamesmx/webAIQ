<div class="modal fade" id="modal-actions-restaurantes" tabindex="-1" role="dialog" aria-hidden="true" data-action="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id='modal-actions-title-restaurantes'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" id='modal-form-restaurantes' novalidate>
                    <div class="col-12 m-2">
                        <label for="nombre" class="form-label">Restaurante</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-home"></i></span>
                            <input type="text" class="form-control" required name='nombre' id='nombre'>
                            <div class="nombre invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-lock"></i></span>
                            <input type="password" class=" form-control" required name="password" id='password' autocomplete="on">
                            <div class="password invalid-feedback">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 m-2">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="iconsminds-envelope"></i></span>
                            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" required name='email' id='email'>
                            <div class="email invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-2">
                        <label for="phone" class="form-label">Teléfono</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="simple-icon-phone"></i></span>
                            <input type="tel" pattern="[0-9]{0,20}" class=" form-control" required name="phone" id='phone'>
                            <div class="phone invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <label hidden for="id_user"></label>
                    <input hidden name="id_user" id='id_user'>
            </div>
            <div class=" col-12 d-flex flex-row-reverse mb-2 mt-2">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger mr-2" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div id='modal-delete-restaurantes' class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm brad bradb">
        <div class="modal-content brad bradb">
            <div class="modal-header brad bg-primary">
                <h5 id='modal-delete-title-restaurantes'></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bradb" id='delete_users'>
                <p class="mb-4" id='modal-delete-text-restaurantes'></p>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>

                <!-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal" name='delete'>Eliminar</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal ANUNCIOS -->
<div class="modal fade" id="restaurantes_imagen_modal" tabindex="-1" role="dialog" aria-hidden="true" data-id="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-imagen" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="alert alert-warning">
                                <h9>
                                    <i class="fas fa-exclamation-triangle"></i>
                                    El logo de la empresa debe ser un archivo en formato
                                    <h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
                                    <br>
                                    Con un peso máximo de <h9 class="text-success"> 512 kb.</h9>
                                </h9>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="actualizaImagen_restaurante" id="actualizaImagen_restaurante" class="form-control btn btn-primary required btn-block mt-3">
                    <button id="actualizaImagen_restaurante_btn" class="btn btn-primary btn-block mb-4 mt-2" style="font-size: 18px" data-dismiss="modal">
                        Subir imagen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>